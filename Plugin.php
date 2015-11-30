<?php namespace Genius\Forms;

use System\Classes\PluginBase;

/**
 * Forms Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'genius.forms::lang.plugin.name',
            'description' => 'genius.forms::lang.plugin.description',
            'author'      => 'Genius',
            'icon'        => 'icon-leaf'
        ];
    }


    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'form' => [Forms::class, 'form'],
                'input' => [Forms::class, 'input'],
                'textarea' => [Forms::class, 'textarea'],
            ]
        ];
    }

}
