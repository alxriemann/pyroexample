<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class BespokodeModuleVarietiesCreateVarietiesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'varieties',
        'title_column' => 'title',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'title'        => [
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
        'crops',
        
    ];

}
