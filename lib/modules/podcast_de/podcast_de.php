<?php
namespace Podlove\Modules\PodcastDe;
use \Podlove\Model;

class Podcast_De extends \Podlove\Modules\Base {

		protected $module_name = 'podcast.de Integration';
		protected $module_description = 'Adds .';

		public function load() {
			add_action( 'wp', array( $this, 'register_hooks' ) );
		}

		/**
		 * Register hooks on episode pages only.
		 */
		public function register_hooks() {
			
			if ( ! is_single() )
				return;

			if ( 'podcast' !== get_post_type() )
				return;

			add_filter( 'language_attributes', function ( $output = '' ) {
				return $output . ' prefix="og: http://ogp.me/ns#"';
			} );

			add_action( 'wp_head', array( $this, 'insert_' ) );
		}

		/**
		 * Insert HTML meta tags into site head.
		 *
		 */
		public function insert_() {


			$podcast = Model\Podcast::get_instance();

		}		
}