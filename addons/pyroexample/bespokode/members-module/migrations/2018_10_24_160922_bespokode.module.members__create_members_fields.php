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
        'country'           => 'anomaly.field_type.country',
        'region'            => 'anomaly.field_type.state',
        'county'            => 'anomaly.field_type.state',
        'email'             => 'anomaly.field_type.email',
        'website'           => 'anomaly.field_type.url',
        'telephone_number'  => 'anomaly.field_type.integer',
        'potential_area'    => 'anomaly.field_type.integer',
        'cultivated_area'   => 'anomaly.field_type.integer',
        'sheltered_area'    => 'anomaly.field_type.integer',
        'user'           => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> [
                'title_name' => 'username',
                'related'    => 'Anomaly\UsersModule\User\UserModel',
            ],
        ],
    ];

}
