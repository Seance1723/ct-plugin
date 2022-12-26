<?php
/**
 * @package CtPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseControler;

class Enqueue extends BaseControler
{
    public function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue() {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/mystyles.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/myscript.js');
        
    }

}