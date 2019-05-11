<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class BespokodeModuleMembersCreateCropsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'crops',
        'title_column' => 'code',


    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'code',
        'farmer',
        'products' => [
            'required'     => true,
        ],
        'varieties' => [
            'required'     => true,
        ],
        'user',
        'growing_area',
        'sowing_date',
        'estimated_harvest_starts_at',
        'estimated_harvest_ends_at',
        'estimated_yield',
        'harvest_started_at',
        'harvest_ended_at',
        'yield'

    ];

}
