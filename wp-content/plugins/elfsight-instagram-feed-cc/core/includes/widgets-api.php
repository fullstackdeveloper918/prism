<?php

if (!defined('ABSPATH')) exit;


if (!class_exists('ElfsightInstagramFeedWidgetsApi')) {
    class ElfsightInstagramFeedWidgetsApi {
        private $slug;
        private $file;
        private $textDomain;

        public function __construct($slug, $file, $text_domain) {
            $this->slug = $slug;
            $this->file = $file;
            $this->textDomain = $text_domain;

            register_activation_hook($this->file, array($this, 'upgrade'));
            add_action('wp_ajax_' . str_replace('-', '_', $this->slug) . '_widgets_api', array($this, 'ajax'));
        }

        public function upgrade() {
            if ($this->tableExists()) {
                return;
            }

            $this->createTable();
        }

        public function tableExists() {
            global $wpdb;

            $table_name = $this->getTableName();

            return !!$wpdb->get_var('SHOW TABLES LIKE "' . esc_sql($table_name) . '"');
        }

        public function createTable() {
            global $wpdb;

            $table_name = $this->getTableName();

            if (!function_exists('dbDelta')) {
                require (ABSPATH . 'wp-admin/includes/upgrade.php');
            }

            if (version_compare($wpdb->db_version(), '5.5.3', '>=')) {
                $collate = 'utf8mb4_general_ci';
            } else {
                $collate = 'utf8_general_ci';
            }

            dbDelta(
                'CREATE TABLE `' . esc_sql($table_name) . '` (
                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(255) NOT NULL,
                    `time_created` varchar(10) NOT NULL,
                    `time_updated` varchar(10) NOT NULL,
                    `active` int(1) NOT NULL DEFAULT "1",
                    `options` text COLLATE ' . $collate . ' NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;',
                true
            );
        }

        public function getTableName() {
            global $wpdb;

            return $wpdb->prefix . str_replace('-', '_', $this->slug) . '_widgets';
        }

        public function ajax() {
            $result = array();

            $method = strtolower($_SERVER['REQUEST_METHOD']);
            $endpoint = !empty($_REQUEST['endpoint']) ? $_REQUEST['endpoint'] : '';
            $endpoint_handler_name = $method . ucfirst($endpoint);

            if (method_exists($this, $endpoint_handler_name)) {
                call_user_func_array(array($this, $endpoint_handler_name), array(&$result));

            } else {
                $result['status'] = false;
                $result['error'] = sprintf('Unknown endpoint "%s/%s"', $method, $endpoint);
            }

            if (ob_get_length()) {
                ob_clean();
            }

            header('Content-type: application/json; charset=utf-8');
            echo json_encode($result);

            exit;
        }

        public function getList(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();

            $id = !empty($_GET['id']) ? intval($_GET['id']) : null;

            $select_sql = 'SELECT * FROM `' . esc_sql($table_name) . '` WHERE `active` = "1"';

            if ($id) {
                $select_sql .= ' AND `id` = "' . esc_sql($id) . '"';
            }

            $select_sql .= ' ORDER BY `id` DESC';

            $list = $wpdb->get_results($select_sql, ARRAY_A);

            $result['status'] = is_null($list) ? false : true;

            foreach ($list as &$widget) {
                $options_raw_json = $widget['options'];
                $widget['options'] = json_decode($options_raw_json);
            }

            $result['data'] = $list;
        }

        public function postAdd(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();

            $options_json = null;
            $invalid_fields = array();

            if (empty($_POST['name']) || strlen($_POST['name']) > 255) {
                $invalid_fields[] = 'name';
            }

            if (empty($_POST['options'])) {
                $invalid_fields[] = 'options';

            } else {
                $options_json = $this->formatInputOptions($_POST['options']);
                $options_json = apply_filters(str_replace('-', '_', $this->slug) . '_widget_options', $options_json);

                if (!json_decode($options_json)) {
                    $invalid_fields[] = 'options';
                }
            }

            if ($invalid_fields) {
                $result['status'] = false;
                $result['error'] = esc_html__('Incoming data is invalid.', $this->textDomain);
                $result['invalid_fields'] = $invalid_fields;
            } else {
                $status = !!$wpdb->insert($table_name, array(
                    'name' => $_POST['name'],
                    'time_created' => time(),
                    'time_updated' => time(),
                    'active' => 1,
                    'options' => $options_json
                ));

                $result['status'] = $status;
                $result['id'] = $wpdb->insert_id;

                if (!$status) {
                    $result['error'] = esc_html__('An MySQL error occurred while adding new widget.', $this->textDomain);

                } else if (get_option(str_replace('-', '_', $this->slug) . '_widgets_clogged') !== 'true') {
                    update_option(str_replace('-', '_', $this->slug) . '_widgets_clogged', 'true');
                }
            }
        }

        public function postRemove(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();

            $id = !empty($_POST['id']) ? intval($_POST['id']) : null;

            if (!$id) {
                $result['status'] = false;
                $result['error'] = esc_html__('Parameter "id" is required.', $this->textDomain);

                return;
            }

            $status = !!$wpdb->update($table_name, array('active' => 0, 'time_updated' => time()), array('id' => $id));
            $result['status'] = $status;

            if (!$status) {
                $result['error'] = esc_html__('Widget with the specified id doesnt exist.', $this->textDomain);
            }
        }

        public function postRestore(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();

            $id = !empty($_POST['id']) ? intval($_POST['id']) : null;

            if (!$id) {
                $result['status'] = false;
                $result['error'] = esc_html__('Parameter "id" is required.', $this->textDomain);

                return;
            }

            $status = !!$wpdb->update($table_name, array('active' => 1, 'time_updated' => time()), array('id' => $id));
            $result['status'] = $status;

            if (!$status) {
                $result['error'] = esc_html__('Widget with the specified id doesnt exist.', $this->textDomain);
            }
        }

        public function postUpdate(&$result) {
            global $wpdb;

            $table_name = $this->getTableName();
            $id = !empty($_POST['id']) ? intval($_POST['id']) : null;
            $name = !empty($_POST['name']) ? $_POST['name'] : null;
            $options_json = !empty($_POST['options']) ? $this->formatInputOptions($_POST['options']) : null;
            $options_json = apply_filters(str_replace('-', '_', $this->slug) . '_widget_options', $options_json);

            if (!$id) {
                $result['status'] = false;
                $result['error'] = esc_html__('Parameter "id" is required.', $this->textDomain);

                return;
            }

            $invalid_fields = array();
            $fields = array('time_updated' => time());

            if ($name) {
                if (strlen($name) > 255) {
                    $invalid_fields[] = 'name';

                } else {
                    $fields['name'] = $name;
                }
            }

            if ($options_json) {
                if (!json_decode($options_json)) {
                    $invalid_fields[] = 'options';

                } else {
                    $fields['options'] = $options_json;
                }
            }

            if ($invalid_fields) {
                $result['status'] = false;
                $result['error'] = esc_html__('Incoming data is invalid.', $this->textDomain);
                $result['invalid_fields'] = $invalid_fields;

            } else {
                $status = !!$wpdb->update($table_name, $fields, array('id' => $id));
                $result['status'] = $status;

                if (!$status) {
                    $result['error'] = esc_html__('Widget with the specified id doesnt exist.', $this->textDomain);
                }
            }
        }

        public function formatInputOptions($options) {
            $options = rawurldecode($options);
            $options = str_replace("\'", "\u0027", $options); // JSON_HEX_APOS

            return $options;
        }
    }
}