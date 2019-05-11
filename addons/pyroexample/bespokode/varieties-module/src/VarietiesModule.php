<?php namespace Bespokode\VarietiesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class VarietiesModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-puzzle-piece';

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
        'products' => [
            'buttons' => [
                'new_product'
            ],
        ],
        'categories' => [
            'buttons' => [
                'new_category'
            ],
        ],
    ];
}
