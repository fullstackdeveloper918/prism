<?php


namespace BigCommerce\Pages;


abstract class Required_Page {
	/** @var string The option that will store this page's ID */
	const NAME = '';

	public function __construct() {
		if ( ! static::NAME ) {
			throw new \LogicException( __( 'NAME constant must be defined in extending class', 'bigcommerce' ) );
		}
	}

	public function get_option_name() {
		return static::NAME;
	}

	/**
	 * @return string The post type of the post that will be created
	 */
	protected function get_post_type() {
		return 'page';
	}

	/**
	 * @return string The title of the post
	 */
	abstract protected function get_title();

	/**
	 * @return string The slug of the post
	 */
	abstract protected function get_slug();

	/**
	 * @return string The content of the post
	 */
	public function get_content() {
		return '';
	}

	/**
	 * @return string The label to show on this post in list tables
	 */
	public function get_post_state_label() {
		return '';
	}

	/**
	 * Ensure that there is a page designated as this page
	 * at all times. Creates one if necessary.
	 *
	 * @return void
	 * @action admin_init
	 */
	public function ensure_page_exists() {
		$post_id = $this->get_post_id();
		if ( ! empty( $post_id ) ) {
			return; // already exists
		}
		$new_id = $this->match_existing_post();
		if ( empty( $new_id ) ) {
			$new_id = $this->create_post();
		}
		if ( ! empty( $new_id ) ) {
			$this->set_post_id( $new_id );
		}
	}

	/**
	 * @return int The ID of the post registered as this page
	 */
	private function get_post_id() {
		return (int) get_option( static::NAME, 0 );
	}

	/**
	 * Set the ID of the post registered as this page
	 *
	 * @param int $post_id
	 *
	 * @return void
	 */
	private function set_post_id( $post_id ) {
		update_option( static::NAME, (int) $post_id );
	}

	/**
	 * @param $post_id
	 *
	 * @return void
	 * @action trashed_post
	 * @action deleted_post
	 */
	public function clear_option_on_delete( $post_id ) {
		$existing = $this->get_post_id();
		if ( $existing === (int) $post_id ) {
			delete_option( static::NAME );
		}
	}

	/**
	 * Find an existing post that can be designated as the
	 * required page.
	 *
	 * @return int The ID of the matching post. 0 if none found.
	 */
	protected function match_existing_post() {
		$post_ids = $this->get_post_candidates();
		if ( empty( $post_ids ) ) {
			return 0;
		}

		return reset( $post_ids );
	}

	/**
	 * Find all the posts that meet the criteria (e.g., post type,
	 * content) to become this required page.
	 *
	 * @return int[] Post IDs of potential posts
	 */
	public function get_post_candidates() {
		/** @var \wpdb $wpdb */
		global $wpdb;
		$content      = $this->get_content();
		$content_like = '%' . $wpdb->esc_like( $content ) . '%';
		$post_ids     = $wpdb->get_col( $wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts} WHERE post_type=%s AND post_status='publish' AND post_content LIKE %s",
			$this->get_post_type(),
			$content_like
		) );

		$post_ids = array_map( 'intval', $post_ids );

		$post_ids = (array) apply_filters( 'bigcommerce/pages/matching_page_candidates', $post_ids, static::NAME );

		return $post_ids;
	}

	/**
	 * Create the post for this config
	 *
	 * @return int the ID of the created post
	 */
	protected function create_post() {
		$args = $this->get_post_args();
		$args = apply_filters( 'bigcommerce/pages/insert_post_args', $args, static::NAME );

		if ( empty( $args ) ) {
			return 0; // allow filters to prevent creation
		}
		$post_id = wp_insert_post( $args );

		return $post_id;
	}

	/**
	 * @return array The args for creating the post
	 */
	protected function get_post_args() {
		return [
			'post_type'      => $this->get_post_type(),
			'post_status'    => 'publish',
			'post_title'     => $this->get_title(),
			'post_name'      => $this->get_slug(),
			'post_content'   => $this->get_content(),
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		];
	}

	/**
	 * @param array    $post_states
	 * @param \WP_Post $post
	 *
	 * @return array
	 * @filter display_post_states
	 */
	public function add_post_state( $post_states, $post ) {
		if ( intval( get_option( static::NAME, 0 ) ) === $post->ID ) {
			$label = $this->get_post_state_label();
			if ( $label ) {
				$post_states[ static::NAME ] = $label;
			}
		}
		return $post_states;
	}
}