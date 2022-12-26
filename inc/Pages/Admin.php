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

    public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'ct_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'ctOptionsGroup' )
			),
			array(
				'option_group' => 'ct_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'ct_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'ctAdminSection' ),
				'page' => 'ct_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'ctTextExample' ),
				'page' => 'ct_plugin',
				'section' => 'ct_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'ctFirstName' ),
				'page' => 'ct_plugin',
				'section' => 'ct_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields( $args );
	}

}