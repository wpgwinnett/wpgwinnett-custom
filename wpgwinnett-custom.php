<?php
/**
 * @wordpress-plugin
 * Plugin Name: WP Gwinnett Custom
 * Plugin URI: https://wpgwinnett.com
 * Description: Customizations for WPGwinnett.com
 * Version: 1.0.0
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
 * @version   1.0.0
 * @author    WordPress Gwinnett members <hello@wpgwinnett.com>
 * @license   GPL-2.0+
 * @link      https://wpgwinnett.com
 * @copyright 2019 WordPress Gwinnett
 *
 * last updated: May 13, 2019
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_filter( 'gform_confirmation_anchor_15', '__return_false' );