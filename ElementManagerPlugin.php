<?php

/**
 * @file
 * ElementManager plugin main file.
 */

/**
 * ElementManager plugin main class.
 */
class ElementManagerPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'initialize',
    );

    protected $_filters = array(
        'admin_navigation_main',
    );

    public function hookInitialize()
    {
        add_translation_source(dirname(__FILE__) . '/languages');
    }

    public function filterAdminNavigationMain($nav)
    {
        $nav[] = array(
            'label' => __('Manage elements'),
            'uri' => url('element-manager'),
        );
        return $nav;
    }
}
