<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class BespokodeModuleVarietiesCreateFarmersStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'farmers',
        'title_column' => 'name',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'        => [
            'required'     => true,
            'translatable' => true,
        ],
        'slug'        => [
            'unique'     => true,
            'required'   => true,
        ],
        'description' => [
            'required'       => true,
            'translatable'   => true,
        ],
        'country',
        'region',
        'county',
        'telephone_number',
        'potential_area',
        'cultivated_area',
        'sheltered_area',
        'varieties',


    ];

}
