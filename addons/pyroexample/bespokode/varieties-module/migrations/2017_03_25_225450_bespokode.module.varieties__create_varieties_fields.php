<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class BespokodeModuleVarietiesCreateVarietiesFields extends Migration
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
        'varieties'        => [
            'type'  => 'anomaly.field_type.multiple',
            'config'=> array(
                'title_name' => 'title',
                'related'    => \Bespokode\VarietiesModule\Variety\VarietyModel::class,
            ),
        ],
        'crops'        => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> array(
                'title_name' => 'title',
                'related'    => \Bespokode\VarietiesModule\Crop\CropModel::class,
            ),
        ],
        'categories'        => [
            'type'  => 'anomaly.field_type.multiple',
            'config'=> [
                'title_name' => 'name',
                'related'    => \Bespokode\VarietiesModule\Category\CategoryModel::class,
            ],
        ],
        'user'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => 'Anomaly\UsersModule\User\UserModel',
            ],
        ],
        'country'           => 'anomaly.field_type.country',
        'region'            => 'anomaly.field_type.state',
        'county'            => 'anomaly.field_type.state',
        'email'             => 'anomaly.field_type.email',
        'website'           => 'anomaly.field_type.url',
        'telephone_number'  => 'anomaly.field_type.integer',
        'potential_area'    => 'anomaly.field_type.integer',
        'cultivated_area'   => 'anomaly.field_type.integer',
        'sheltered_area'    => 'anomaly.field_type.integer',
        'farmers'           => [
            'type'  => 'anomaly.field_type.multiple',
            'config'=> [
                'title_name' => 'name',
                'related'    => \Bespokode\VarietiesModule\Farmer\FarmerModel::class,
            ],
        ],


    ];

}
