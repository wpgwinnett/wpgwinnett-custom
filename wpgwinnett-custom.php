<?php
/**
 * @wordpress-plugin
 * Plugin Name: WP Gwinnett Custom
 * Plugin URI: https://wpgwinnett.com
 * Description: Customizations for WPGwinnett.com
 * Version: 1.1.0
 * Author: WordPress Gwinnett members
 * Author URI: https://wpgwinnett.com
 * Text Domain: wpgwinnett-custom
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package   WPGwinnett_Custom
 * @version   1.1.0
 * @author    WordPress Gwinnett members <hello@wpgwinnett.com>
 * @license   GPL-2.0+
 * @link      https://wpgwinnett.com
 * @copyright 2019 WordPress Gwinnett
 *
 * last updated: May 22, 2019
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_filter( 'gform_confirmation_anchor_15', '__return_false' );

add_filter( 'two_factor_providers', 'wpgwinnett_two_factor_providers' );

function wpgwinnett_two_factor_providers ($providers) {

	$providers = array('Two_Factor_Totp'         => TWO_FACTOR_DIR . 'providers/class.two-factor-totp.php');


	return $providers;
}

function wpgwinnett_no_dashboard_access() {

	if ( ! current_user_can( 'administrator' ) &&
		     ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {

		wp_redirect( home_url() );

		exit;

	}

}

add_action( 'admin_init', 'wpgwinnett_no_dashboard_access' );


function wpgwinnett_require_2fa( $wp_obj ) {

	if ( is_user_logged_in() && ! is_admin() && 'authenticate' !== $wp_obj->request && method_exists( 'Two_Factor_Core', 'get_available_providers_for_user' ) ) {

		$user = get_userdata( get_current_user_id() );

		$twofa_enabled = Two_Factor_Core::get_available_providers_for_user( $user );

		if ( empty( $twofa_enabled ) ) {

			wp_redirect( '/authenticate' );

			exit;
		}
	}

}

add_action( 'parse_request', 'wpgwinnett_require_2fa' );