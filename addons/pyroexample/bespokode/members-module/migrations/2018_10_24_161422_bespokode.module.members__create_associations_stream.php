<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class BespokodeModuleMembersCreateAssociationsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'associations',
        'title_column' => 'name',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'             => [
            'required'     => true,
            'translatable' => true,
        ],
        'slug'             => [
            'unique'     => true,
            'required'   => true,
        ],
        'description'      => [
            'required'       => true,
            'translatable'   => true,
        ],
        'user',
        'email'            => [
            'unique'     => true,
            'required'   => true,
        ],
        'telephone_number' => [
            'required'       => true,

        ],
        'website',
    ];

}
