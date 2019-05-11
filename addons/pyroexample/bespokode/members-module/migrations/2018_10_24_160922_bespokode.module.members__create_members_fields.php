<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class BespokodeModuleMembersCreateMembersFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'title'       => 'anomaly.field_type.text',
        'name'        => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
        'slug'        => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'type'    => '-',
                'slugify' => 'title',

            ],

        ],
        'consumer_type' => [
            'type'  =>  'anomaly.field_type.select',
            'config' => [
                'options'       => ['person' => 'Person','catering' => 'Catering','distribution' => 'Distribution','retailer' => 'Retailer'],
                'separator'     => ':',
                'default_value' => 'catering' ,
                'button_type'   => 'info',
                'mode'          => 'dropdown',
            ],
        ],

        'email'             => 'anomaly.field_type.email',
        'website'           => 'anomaly.field_type.url',
        'telephone_number'  => 'anomaly.field_type.integer',
        'cultivated_area'   => 'anomaly.field_type.integer',
        'sheltered_area'    => 'anomaly.field_type.integer',
        'user'           => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> [
                'title_name' => 'username',
                'related'    => 'Anomaly\UsersModule\User\UserModel',
            ],
        ],
         'farmer'                        => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> [
                'title_name' => 'name',
                'related'    => 'Bespokode\MembersModule\Farmer\FarmerModel',
            ],
        ],
        'association'                        => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> [
                'title_name' => 'name',
                'related'    => 'Bespokode\MembersModule\Association\AssociationModel',
            ],
        ],
        'code' => 'anomaly.field_type.text',
        'products'                     => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> array(
                'title_name' => 'title',
                'related'    => 'Bespokode\VarietiesModule\Product\ProductModel',
            ),
        ],
        'varieties'                     => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> array(
                'title_name' => 'title',
                'related'    => 'Bespokode\VarietiesModule\Variety\VarietyModel',
            ),
        ],
        'growing_area'                  => 'anomaly.field_type.integer',
        'sowing_date'                   => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'default_value' => null,
                'mode'          => 'date',
                "date_format"   => "j F, Y",
                "year_range"    => "-50:+50",
                "time_format"   => "g:i A",
                "timezone"      => null,
                "picker"        => true,
                "step"          => 15,
                "min"           => null,
                "max"           => null
            ]
        ],
        'estimated_harvest_starts_at'   => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'default_value' => null,
                'mode'          => 'date',
                "date_format"   => "j F, Y",
                "year_range"    => "-50:+50",
                "time_format"   => "g:i A",
                "timezone"      => null,
                "picker"        => true,
                "step"          => 15,
                "min"           => null,
                "max"           => null
            ]
        ],
        'estimated_harvest_ends_at'     => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'default_value' => null,
                'mode'          => 'date',
                "date_format"   => "j F, Y",
                "year_range"    => "-50:+50",
                "time_format"   => "g:i A",
                "timezone"      => null,
                "picker"        => true,
                "step"          => 15,
                "min"           => null,
                "max"           => null
            ]
        ],
        'estimated_yield'               => 'anomaly.field_type.integer',
        'harvest_started_at'            => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'default_value' => null,
                'mode'          => 'date',
                "date_format"   => "j F, Y",
                "year_range"    => "-50:+50",
                "time_format"   => "g:i A",
                "timezone"      => null,
                "picker"        => true,
                "step"          => 15,
                "min"           => null,
                "max"           => null
            ]
        ],
        'harvest_ended_at'              => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'default_value' => null,
                'mode'          => 'date',
                "date_format"   => "j F, Y",
                "year_range"    => "-50:+50",
                "time_format"   => "g:i A",
                "timezone"      => null,
                "picker"        => true,
                "step"          => 15,
                "min"           => null,
                "max"           => null
            ]
        ],
        'yield'                         => 'anomaly.field_type.integer'

    ];

}
