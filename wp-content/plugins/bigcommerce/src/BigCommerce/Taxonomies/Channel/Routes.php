<?php


namespace BigCommerce\Taxonomies\Channel;


use BigCommerce\Api\v3\Api\SitesApi;
use BigCommerce\Api\v3\ApiException;
use BigCommerce\Api\v3\Model\Route;
use BigCommerce\Api\v3\Model\Site;
use BigCommerce\Api\v3\Model\SiteCreateRequest;
use BigCommerce\Pages\Account_Page;
use BigCommerce\Pages\Cart_Page;
use BigCommerce\Pages\Login_Page;
use BigCommerce\Pages\Shipping_Returns_Page;
use BigCommerce\Post_Types\Product\Product;
use BigCommerce\Taxonomies\Brand\Brand;
use BigCommerce\Taxonomies\Product_Category\Product_Category;

/**
 * Class Routes
 *
 * Responsible for setting the routes for the site
 * connected to a channel
 */
class Routes {

	/**
	 * @var SitesApi
	 */
	private $sites;

	public function __construct( SitesApi $sites_api ) {
		$this->sites = $sites_api;
	}

	/**
	 * @param int $channel_id
	 *
	 * @return void
	 * @action bigcommerce/channel/updated_channel_id
	 */
	public function set_routes( $channel_id ) {
		$site_id = $this->get_site_id( $channel_id );
		if ( empty( $site_id ) ) {
			$site_id = $this->create_site( $channel_id );
		}
		if ( empty( $site_id ) ) {
			return;
		}

		$route_list = $this->get_route_list();
		foreach ( $route_list as $route ) {
			$this->update_route( $site_id, $route );
		}
	}

	/**
	 * @return void Set new routes whenever any of the route list element gets updated
	 */
	public function update_routes() {
		foreach ( $this->get_active_channel_ids() as $channel_id ) {
			$this->set_routes( $channel_id );
		}
	}

	/**
	 * Get the IDs of all active channels (primary or connected)
	 *
	 * @return int[]
	 */
	private function get_active_channel_ids() {
		/** @var \WP_Term[] $channels */
		$channels = get_terms( [
			'taxonomy'   => Channel::NAME,
			'hide_empty' => false,
			'meta_query' => [
				[
					'key'     => Channel::STATUS,
					'value'   => [ Channel::STATUS_PRIMARY, Channel::STATUS_CONNECTED ],
					'compare' => 'IN',
				],
			],
		] );

		return array_filter( array_map( function ( $term ) {
			return (int) get_term_meta( $term->term_id, Channel::CHANNEL_ID, true );
		}, $channels ) );
	}

	/**
	 * @return void
	 * @action update_option_home
	 */
	public function update_site_home() {
		foreach ( $this->get_active_channel_ids() as $channel_id ) {
			$body = new Site( [
				'url' => untrailingslashit( home_url() ),
			] );
			try {
				$site_id = $this->get_site_id( $channel_id );
				$this->sites->putSite( $site_id, $body );
			} catch ( ApiException $e ) {
				do_action( 'bigcommerce/update_site_home/error' );
			}
		}
	}

	/**
	 *
	 * @action post_updated
	 *
	 * @param int      $post_id  Post ID.
	 * @param \WP_Post $new_post The Post Object
	 * @param \WP_Post $old_post The Previous Post Object
	 */
	function update_route_permalink( $post_id, $new_post, $old_post ) {

		//check if post slug has changed
		if ( $new_post->post_name == $old_post->post_name ) {
			return;
		}

		$routes_posts   = [];
		$routes_posts[] = get_option( Cart_Page::NAME );
		$routes_posts[] = get_option( Login_Page::NAME );
		$routes_posts[] = get_option( Account_Page::NAME );
		$routes_posts[] = get_option( Shipping_Returns_Page::NAME );

		if ( in_array( $post_id, $routes_posts ) ) {
			$this->update_routes();
		}
	}

	/**
	 * @param int $channel_id The ID of a channel
	 *
	 * @return int The ID of the site associated with the channel. 0 if none found.
	 */
	private function get_site_id( $channel_id ) {
		try {
			$response = $this->sites->getChannelSite( $channel_id );
			$site     = $response->getData();

			return $site->getId();
		} catch ( ApiException $e ) {
			return 0;
		}
	}

	/**
	 * @param int $channel_id
	 *
	 * @return int The ID of the site created. 0 if an error occurs.
	 */
	private function create_site( $channel_id ) {
		$request = new SiteCreateRequest( [
			'url'        => untrailingslashit( home_url() ),
			'channel_id' => $channel_id,
		] );
		try {
			$response = $this->sites->postChannelSite( $channel_id, $request );
			$site     = $response->getData();

			return $site->getId();
		} catch ( ApiException $e ) {
			return 0;
		}
	}

	/**
	 * @return Route[] A list of routes for pages on this site
	 */
	protected function get_route_list() {
		$home_url = untrailingslashit( home_url() );
		$routes   = [
			new Route( [
				'type'     => 'home',
				'matching' => '',
				'route'    => str_replace( $home_url, '', home_url( '/' ) ),
			] ),
			new Route( [
				'type'     => 'cart',
				'matching' => '',
				'route'    => str_replace( $home_url, '', get_permalink( get_option( Cart_Page::NAME, 0 ) ) ),
			] ),
			new Route( [
				'type'     => 'login',
				'matching' => '',
				'route'    => str_replace( $home_url, '', wp_login_url() ),
			] ),
			new Route( [
				'type'     => 'account',
				'matching' => '',
				'route'    => str_replace( $home_url, '', get_permalink( get_option( Account_Page::NAME, 0 ) ) ),
			] ),
			new Route( [
				'type'     => 'returns',
				'matching' => '',
				'route'    => str_replace( $home_url, '', get_permalink( get_option( Shipping_Returns_Page::NAME, 0 ) ) ),
			] ),
			new Route( [
				'type'     => 'product',
				'matching' => '*',
				'route'    => str_replace( $home_url, '', $this->get_post_type_route( Product::NAME ) ),
			] ),
			new Route( [
				'type'     => 'brand',
				'matching' => '*',
				'route'    => str_replace( $home_url, '', $this->get_taxonomy_route( Brand::NAME ) ),
			] ),
			new Route( [
				'type'     => 'category',
				'matching' => '*',
				'route'    => str_replace( $home_url, '', $this->get_taxonomy_route( Product_Category::NAME ) ),
			] ),
		];

		/**
		 * Filter the routes that will be set for the site
		 *
		 * @param Route[] $routes
		 */
		return apply_filters( 'bigcommerce/channel/routes', $routes );
	}

	/**
	 * A simplified version of the logic in get_post_permalink()
	 * to get a sample URL for a post type for use in a route
	 *
	 * @param string $post_type
	 *
	 * @return string
	 */
	private function get_post_type_route( $post_type ) {
		global $wp_rewrite;
		$post_link = $wp_rewrite->get_extra_permastruct( $post_type );
		$post_link = str_replace( "%$post_type%", '{slug}', $post_link );
		$post_link = home_url( user_trailingslashit( $post_link, 'post_type_archive' ) );

		return $post_link;
	}


	/**
	 * A simplified version of the logic in get_term_link()
	 * to get a sample URL for a taxonomy for use in a route
	 *
	 * @param string $taxonomy
	 *
	 * @return string
	 */
	private function get_taxonomy_route( $taxonomy ) {
		global $wp_rewrite;
		$tax_link = $wp_rewrite->get_extra_permastruct( $taxonomy );
		$tax_link = str_replace( "%$taxonomy%", '{slug}', $tax_link );
		$tax_link = home_url( user_trailingslashit( $tax_link, 'category' ) );

		return $tax_link;
	}

	/**
	 * @param int   $site_id
	 * @param Route $route
	 *
	 * @return void
	 */
	private function update_route( $site_id, Route $route ) {
		$match = $this->find_matching_route( $site_id, $route );
		try {
			if ( $match ) {
				if ( $match->getRoute() == $route->getRoute() ) {
					return; // already up to date
				}
				$route->setId( $match->getId() );
				$this->sites->putSiteRoute( $site_id, $route->getId(), $route );
			} else {
				$this->sites->postSiteRoute( $site_id, $route );
			}
		} catch ( ApiException $e ) {
			do_action( 'bigcommerce/channel/error/could_not_update_route', $route, $site_id );
		}
	}

	/**
	 * Find a route that matches the Type and Matching properties of the given route
	 *
	 * @param int   $site_id
	 * @param Route $route
	 *
	 * @return Route|null
	 */
	private function find_matching_route( $site_id, Route $route ) {
		try {
			$matching = $route->getMatching();
			$matches  = $this->sites->indexSiteRoutes( $site_id, [ 'type' => $route->getType() ] )->getData();
			$matches  = array_filter( $matches, function ( Route $route ) use ( $matching ) {
				return $route->getMatching() == $matching;
			} );
			if ( empty( $matches ) ) {
				return null;
			}

			return reset( $matches );
		} catch ( ApiException $e ) {
			return null;
		}
	}
}
