<?php namespace Bespokode\MembersModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class MembersModule extends Module
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

        'members' => [
            'buttons' => [
                'new_member'
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
        'consumers' => [
            'buttons' => [
                'new_consumer'
            ],
        ],
        'crops' => [
            'buttons' => [
                'new_crop'
            ],
        ],
    ];
}
