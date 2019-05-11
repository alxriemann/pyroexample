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

        'products'        => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> array(
                'title_name' => 'title',
                'related'    => \Bespokode\VarietiesModule\Product\ProductModel::class,
            ),
        ],
        'categories'        => [
            'type'  => 'anomaly.field_type.relationship',
            'config'=> [
                'title_name' => 'name',
                'related'    => \Bespokode\VarietiesModule\Category\CategoryModel::class,
            ],
        ],
    ];

}
