<?php
/**
 * @package CtPlugin
 * 
 * Plugin Name: CT Plugin
 * Plugin URI: http://ct-plugin.com
 * Descrition: Test plugin
 * Version: 1.0.0
 * Author: Rupak Biswas
 * Author URI: https://rupakbiswas.in
 * Licence: GPLv2 or later
 * Text Domain: ct-plugin
 */

 /*
 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

 Copyright 2022-2023 Automatic, Inc.
 */

// If the file is called firectly, abort!!
defined( 'ABSPATH' ) or die( 'Hey, What are you doing here? You still human!' );

//Require once the Composer Autoload
if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 * 
 */
function activate_ct_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_ct_plugin');

/**
 * The code that runs during plugin deactivation
 * 
 */
function deactivate_ct_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_ct_plugin');

/**
 * Initilize all the core classes of the plugin
 */
if (class_exists( 'Inc\\Init')){
    Inc\Init::register_services();
}