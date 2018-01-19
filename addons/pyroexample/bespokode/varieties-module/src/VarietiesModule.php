<?php namespace Bespokode\VarietiesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class VarietiesModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'glyphicons glyphicons-tent';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'varieties'   => [
            'buttons' => [
                'new_variety' 
            ],
        ],
        'crops' => [
            'buttons' => [
                'new_crop'
            ],
        ],
        'categories' => [
            'buttons' => [
                'new_category'
            ],
        ],
        'associations' => [
            'buttons' => [
                'new_association'
            ],
        ],
        'farmers' => [
            'buttons' => [
                'new_farmer'
            ],
        ],
    ];
}
