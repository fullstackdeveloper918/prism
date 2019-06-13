<?php
	require_once('vendor/autoload.php');

	add_action( 'wp_ajax_pafe_ajax_form_builder', 'pafe_ajax_form_builder' );
	add_action( 'wp_ajax_nopriv_pafe_ajax_form_builder', 'pafe_ajax_form_builder' );

	function find_element_recursive( $elements, $form_id ) {
		foreach ( $elements as $element ) {
			if ( $form_id === $element['id'] ) {
				return $element;
			}

			if ( ! empty( $element['elements'] ) ) {
				$element = find_element_recursive( $element['elements'], $form_id );

				if ( $element ) {
					return $element;
				}
			}
		}

		return false;
	}

	function replace_email($content, $fields, $payment_status = 'succeeded', $payment_id = '', $succeeded = 'succeeded', $pending = 'pending', $failed = 'failed' ) {
		$message = '';

		if (trim($content) == '[all-fields]') {
			if (!empty($fields)) {
				foreach ($fields as $field) {
					$message .= $field['label'] . ': ' . $field['value'] . '<br />';
				}
			}
		} else {
			if (!empty($fields)) {
				$message = $content;
				foreach ($fields as $field) {
					$search = '[field id="' . $field['name'] . '"]';
					$message = str_replace($search, $field['value'], $message);
				}
			}
		}

		$message = str_replace( [ "\r\n", "\n", "\r" ], '<br />', $message );

		if ($payment_status == 'succeeded') {
			$message = str_replace( '[payment_status]', $succeeded, $message );
		}

		if ($payment_status == 'pending') {
			$message = str_replace( '[payment_status]', $pending, $message );
		}

		if ($payment_status == 'failed') {
			$message = str_replace( '[payment_status]', $failed, $message );
		}

		if (!empty($payment_id)) {
			$message = str_replace( '[payment_id]', $payment_id, $message );
		}

		return $message;
	}

	function pafe_ajax_form_builder() {
		global $wpdb;
			if ( !empty($_POST['post_id'] && !empty($_POST['form_id'] && !empty($_POST['fields'] ) ) ) ) {

				$post_id = $_POST['post_id'];
				$form_id = $_POST['form_id'];
				$fields = array_unique($_POST['fields'], SORT_REGULAR);

				$elementor = \Elementor\Plugin::$instance;

				$meta = $elementor->db->get_plain_editor( $post_id );

				$form = find_element_recursive( $meta, $form_id );

				$widget = $elementor->elements_manager->create_element_instance( $form );
				$form['settings'] = $widget->get_active_settings();

				$status = '';

				$payment_status = 'succeeded';
				$payment_id = '';

				if (!empty($_POST['stripeToken']) && !empty($_POST['amount'])) {

					\Stripe\Stripe::setApiKey(get_option('piotnet-addons-for-elementor-pro-stripe-secret-key'));

					$token = $_POST['stripeToken'];

					$customer_array = array( 
						"source" => $token,
					);

					if (!empty($_POST['description'])) {
						$customer_array['description'] = esc_sql( $_POST['description'] );
					}

					// Create Customer In Stripe
					$customer = \Stripe\Customer::create($customer_array);

					// Charge Customer
					$charge = \Stripe\Charge::create(array(
						"amount" => floatval($_POST['amount']) * 100,
						"currency" => strtolower($form['settings']['pafe_stripe_currency']),
						"description" => $form['settings']['form_id'],
						"customer" => $customer->id,
					));

					$payment_status = $charge->status;
					$payment_id = $charge->id;
				}

				// Add to Form Database

				$my_post = array(
					'post_title'    => wp_strip_all_tags( 'Piotnet Addons Form Database ' . $form_id ),
					'post_status'   => 'publish',
					'post_type'		=> 'pafe-form-database',
				);

				$form_database_post_id = wp_insert_post( $my_post );

				if (!empty($form_database_post_id)) {

					$my_post_update = array(
						'ID'           => $form_database_post_id,
						'post_title'   => '#' . $form_database_post_id,
					);
					wp_update_post( $my_post_update );

					update_post_meta( $form_database_post_id, 'form_id', $form['settings']['form_id'] );
					update_post_meta( $form_database_post_id, 'form_id_elementor', $form_id );
					update_post_meta( $form_database_post_id, 'post_id', $post_id );

					foreach ($fields as $field) {
						update_post_meta( $form_database_post_id, $field['name'], $field['value'] );
					}

					if (!empty($charge)) {
						update_post_meta( $form_database_post_id, 'payment_id', $charge->id );
						update_post_meta( $form_database_post_id, 'payment_customer_id', $charge->customer );
						update_post_meta( $form_database_post_id, 'payment_description', $charge->description );
						update_post_meta( $form_database_post_id, 'payment_amount', $charge->amount );
						update_post_meta( $form_database_post_id, 'payment_currency', $charge->currency );
						update_post_meta( $form_database_post_id, 'payment_status', $charge->status );
					}

				}

				// End add to Form Database

				if (in_array("email", $form['settings']['submit_actions'])) {

					$to = replace_email($form['settings']['email_to'], $fields);

					if ( ! empty( $form['settings']['pafe_stripe_status_succeeded'] ) && ! empty( $form['settings']['pafe_stripe_status_pending'] ) && ! empty( $form['settings']['pafe_stripe_status_failed'] ) ) {
						$to = replace_email( $form['settings']['email_to'], $fields, $payment_status, $payment_id, $form['settings']['pafe_stripe_status_succeeded'], $form['settings']['pafe_stripe_status_pending'], $form['settings']['pafe_stripe_status_failed'] );
					}

					$subject = replace_email($form['settings']['email_subject'], $fields);

					if ( ! empty( $form['settings']['pafe_stripe_status_succeeded'] ) && ! empty( $form['settings']['pafe_stripe_status_pending'] ) && ! empty( $form['settings']['pafe_stripe_status_failed'] ) ) {
						$subject = replace_email($form['settings']['email_subject'], $fields, $payment_status, $payment_id, $form['settings']['pafe_stripe_status_succeeded'], $form['settings']['pafe_stripe_status_pending'], $form['settings']['pafe_stripe_status_failed'] );
					}

					$message = replace_email($form['settings']['email_content'], $fields);

					if ( ! empty( $form['settings']['pafe_stripe_status_succeeded'] ) && ! empty( $form['settings']['pafe_stripe_status_pending'] ) && ! empty( $form['settings']['pafe_stripe_status_failed'] ) ) {
						$message = replace_email($form['settings']['email_content'], $fields, $payment_status, $payment_id, $form['settings']['pafe_stripe_status_succeeded'], $form['settings']['pafe_stripe_status_pending'], $form['settings']['pafe_stripe_status_failed'] );
					}

					$reply_to = $form['settings']['email_reply_to'];
					if (empty($reply_to)) {
						$reply_to = $form['settings']['email_from'];
					}
					$reply_to = replace_email($reply_to, $fields);

					if ( ! empty( $form['settings']['email_from'] ) ) {
						$headers[] = 'From: ' . $form['settings']['email_from_name'] . '<' . $form['settings']['email_from'] . '>';
						$headers[] = 'Reply-To: ' . $reply_to;
					}

					if ( ! empty( $form['settings']['email_to_cc'] ) ) {
						$headers[] = 'Cc: ' . $form['settings']['email_to_cc'];
					}

					if ( ! empty( $form['settings']['email_to_bcc'] ) ) {
						$headers[] = 'Bcc: ' . $form['settings']['email_to_bcc'];
					}

					$headers[] = 'Content-Type: text/html; charset=UTF-8';

					$status = wp_mail( $to, $subject, $message, $headers );

					if ( ! empty( $form['settings']['email_to_bcc'] ) ) {
						$bcc_emails = explode( ',', $form['settings']['email_to_bcc'] );
						foreach ( $bcc_emails as $bcc_email ) {
							wp_mail( trim( $bcc_email ), $subject, $message, $headers );
						}
					}

				}

				if (in_array("email2", $form['settings']['submit_actions'])) {

					// $to = replace_email($form['settings']['email_to_2'], $fields);

					// $subject = replace_email($form['settings']['email_subject_2'], $fields);

					// $message = replace_email($form['settings']['email_content_2'], $fields);

					$to = replace_email($form['settings']['email_to_2'], $fields);

					if ( ! empty( $form['settings']['pafe_stripe_status_succeeded'] ) && ! empty( $form['settings']['pafe_stripe_status_pending'] ) && ! empty( $form['settings']['pafe_stripe_status_failed'] ) ) {
						$to = replace_email( $form['settings']['email_to_2'], $fields, $payment_status, $payment_id, $form['settings']['pafe_stripe_status_succeeded'], $form['settings']['pafe_stripe_status_pending'], $form['settings']['pafe_stripe_status_failed'] );
					}

					$subject = replace_email($form['settings']['email_subject_2'], $fields);

					if ( ! empty( $form['settings']['pafe_stripe_status_succeeded'] ) && ! empty( $form['settings']['pafe_stripe_status_pending'] ) && ! empty( $form['settings']['pafe_stripe_status_failed'] ) ) {
						$subject = replace_email($form['settings']['email_subject_2'], $fields, $payment_status, $payment_id, $form['settings']['pafe_stripe_status_succeeded'], $form['settings']['pafe_stripe_status_pending'], $form['settings']['pafe_stripe_status_failed'] );
					}

					$message = replace_email($form['settings']['email_content_2'], $fields);

					if ( ! empty( $form['settings']['pafe_stripe_status_succeeded'] ) && ! empty( $form['settings']['pafe_stripe_status_pending'] ) && ! empty( $form['settings']['pafe_stripe_status_failed'] ) ) {
						$message = replace_email($form['settings']['email_content_2'], $fields, $payment_status, $payment_id, $form['settings']['pafe_stripe_status_succeeded'], $form['settings']['pafe_stripe_status_pending'], $form['settings']['pafe_stripe_status_failed'] );
					}

					$reply_to = $form['settings']['email_reply_to_2'];
					if (empty($reply_to)) {
						$reply_to = $form['settings']['email_from_2'];
					}
					$reply_to = replace_email($reply_to, $fields);

					if ( ! empty( $form['settings']['email_from_2'] ) ) {
						$headers[] = 'From: ' . $form['settings']['email_from_name_2'] . '<' . $form['settings']['email_from_2'] . '>';
						$headers[] = 'Reply-To: ' . $reply_to;
					}

					if ( ! empty( $form['settings']['email_to_cc_2'] ) ) {
						$headers[] = 'Cc: ' . $form['settings']['email_to_cc_2'];
					}

					if ( ! empty( $form['settings']['email_to_bcc_2'] ) ) {
						$headers[] = 'Bcc: ' . $form['settings']['email_to_bcc_2'];
					}

					$headers[] = 'Content-Type: text/html; charset=UTF-8';

					$status = wp_mail( $to, $subject, $message, $headers );

					if ( ! empty( $form['settings']['email_to_bcc_2'] ) ) {
						$bcc_emails = explode( ',', $form['settings']['email_to_bcc_2'] );
						foreach ( $bcc_emails as $bcc_email ) {
							wp_mail( trim( $bcc_email ), $subject, $message, $headers );
						}
					}

				}

				echo $payment_status . ',' . $status . ',' . $payment_id;
			}

		wp_die();
	}
?>