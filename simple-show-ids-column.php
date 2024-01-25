<?php
/*
 * Plugin Name: Simple Show IDs Column
 * Description: Show IDs Column on admin pages for posts, pages, categories, taxonomies and custom post types.
 * Version:     1.0.0
 * Author:      Michel Many
 * Author URI:  https://michelmany.com
 * License:     GNU General Public License v2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Simple Show IDs Column is distributed under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Simple Show IDs Column is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Simple Show IDs Column. If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined( 'ABSPATH' ) or die();

define( 'MMSSIC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MMSSIC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( file_exists( MMSSIC_PLUGIN_PATH . 'vendor/autoload.php' ) ) {
	require_once MMSSIC_PLUGIN_PATH . 'vendor/autoload.php';
}
/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( MMSSIC\Init::class ) ) {
	MMSSIC\Init::registerServices();
}