<?php
/**
 * @package CtPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseControler;

class SettingLinks extends BaseControler
{

    public function register(){
        add_filter("plugin_action_links_$this->plugin", array($this, 'setting_links'));
    }

    public function setting_links($link){
        $setting_links = '<a href="admin.php?page=ct_plugin">Setting</a>';
        array_push($link, $setting_links);
        return $link;
    }
}