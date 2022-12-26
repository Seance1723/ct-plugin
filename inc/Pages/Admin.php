<?php
/**
 * @package CtPlugin
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseControler;
use \Inc\Api\Callbacks\AdminCallbacks;


class Admin extends BaseControler
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();

    }

    public function setPages()
    {

        $this->pages = array(
            array(
                'page_title' => 'CT Plugin',
                'menu_title' => 'CT Dashboard',
                'capability' => 'manage_options',
                'menu_slug' => 'ct_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-format-status',
                'position' => 110
            )
        );

    }

    public function setSubpages()
    {

        $this->subpages = array(
            array(
                'parent_slug' => 'ct_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'ct_cpt',
                'callback' => array( $this->callbacks, 'adminCpt' )
            ),
            array(
                'parent_slug' => 'ct_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'ct_taxonomies',
                'callback' => array( $this->callbacks, 'adminTaxonomy' )
            ),
            array(
                'parent_slug' => 'ct_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'ct_widgets',
                'callback' => array( $this->callbacks, 'adminWidget' )
            )
        );

    }
}