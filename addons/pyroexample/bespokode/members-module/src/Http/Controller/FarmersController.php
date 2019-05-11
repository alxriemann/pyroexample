<?php namespace Bespokode\MembersModule\Http\Controller;

use Anomaly\RelationshipFieldType\RelationshipFieldType;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\UserRepository;
use Bespokode\MembersModule\Association\AssociationRepository;
use Bespokode\MembersModule\Farmer\Form\FarmerFormBuilder;
use Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Bespokode\MembersModule\Crop\Form\CropFormBuilder;
use Bespokode\MembersModule\Crop\Table\CropTableBuilder;
use Bespokode\MembersModule\Crop\CropRepository;
use Bespokode\MembersModule\Consumer\ConsumerRepository;
use Bespokode\VarietiesModule\Product\ProductRepository;
use Bespokode\VarietiesModule\Variety\VarietyRepository;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class FarmersController
 *
 * @link
 * @author
 * @author        bespokode
 */
class FarmersController extends PublicController
{

    public function view_farmer_profile(FarmerTableBuilder $builder, AssociationRepository $repository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $myownassociations = $repository->getModel()->getOriginal('id', $myassociation)->count();

        if( !$myownassociations == NULL ) {
            return $this->redirect->to(route('bespokode.module.members::home'));
        };

        $builder ->setButtons(          [
            'edit' => [
                'href' => 'members/farmers/edit/{entry.id}'
            ],
        ]);
            return $builder->render();
    }

    public function edit_farmer_profile(FarmerFormBuilder $form, FarmerRepository $repository, Guard $auth, $id)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myfarmers = $repository->all()->where('user_id', $auth->id()) ;
        $myownfarmer = $repository->getModel()->getOriginal('id', $myfarmers)->find($id);


        if  ( $myownfarmer ==  NULL) {

            abort(403);
        }
        $fields = [
            'name' => [
                'type'   => 'anomaly.field_type.text',
            ],
            'slug'        => [
                'type'   => 'anomaly.field_type.slug',
                'config' => [
                    'type'    => '-',
                    'slugify' => 'name',

                ],

            ],
            'description' => 'anomaly.field_type.textarea',
            'association'                        => [
                'type'  => 'anomaly.field_type.relationship',
                'config'=> [
                    'related'        => 'Bespokode\MembersModule\Association\AssociationModel',
                    'mode'           => 'lookup',
                    'key_name'       => null,
                    'title_name'     => null,
                    'value_table'    => null,
                    'selected_table' => null,
                    'lookup_table'   => null,
                    'handler'        => function (RelationshipFieldType $fieldType, AssociationRepository $associationRepository, Guard $auth )
                    {
                        $myassociations = $associationRepository->all()->where('user_id', $auth->id());
                        $fieldType->setOptions(
                            $myassociations->pluck('name', 'id'

                            )->all()
                        );
                    },
                ],
            ],
            'user' => [
                'type'   => 'anomaly.field_type.relationship',
                'config' => [
                    'related'        => 'Anomaly\UsersModule\User\UserModel',
                    'mode'           => 'lookup',
                    'key_name'       => null,
                    'title_name'     => null,
                    'value_table'    => null,
                    'selected_table' => null,
                    'lookup_table'   => null,
                    'handler'        => '\Anomaly\RelationshipFieldType\Handler\Related@handle'
                ]
            ],
            'telephone_number'  => 'anomaly.field_type.integer',
            'cultivated_area'   => 'anomaly.field_type.integer',
            'sheltered_area'    => 'anomaly.field_type.integer'
        ];
        $form->setFields($fields);
        $form->skipField('user');

        return $form->render($id);
    }

    public function create_farmer_profile(FarmerFormBuilder $form, AssociationRepository $repository, FarmerRepository $farmerRepository, ConsumerRepository $consumerRepository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $countmyfarmers = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();
        $myconsumers = $consumerRepository->all()->where('user_id', $auth->id()) ;
        $countmyconsumers = $consumerRepository->getModel()->getOriginal('id', $myconsumers)->count();

        if (!$countmyassociation == NULL)
        {
            abort(403);
        };
        if (!$countmyfarmers == NULL)
        {
            abort(403);
        };
        if (!$countmyconsumers == NULL)
        {
            abort(403);
        };
        $fields = [
            'name' => [
                'type'   => 'anomaly.field_type.text',
            ],
            'slug'        => [
                'type'   => 'anomaly.field_type.slug',
                'config' => [
                    'type'    => '-',
                    'slugify' => 'name',

                ],

            ],
            'description' => 'anomaly.field_type.textarea',
            'association'                        => [
                'type'  => 'anomaly.field_type.relationship',
                'config'=> [
                    'related'        => 'Bespokode\MembersModule\Association\AssociationModel',
                    'mode'           => 'lookup',
                    'key_name'       => null,
                    'title_name'     => null,
                    'value_table'    => null,
                    'selected_table' => null,
                    'lookup_table'   => null,
                    'handler'        => function (RelationshipFieldType $fieldType, AssociationRepository $associationRepository, Guard $auth )
                    {
                        $myassociations = $associationRepository->all()->where('user_id', $auth->id());
                        $fieldType->setOptions(
                            $myassociations->pluck('name', 'id'

                            )->all()
                        );
                    },
                ],
            ],
            'user' => [
                'type'   => 'anomaly.field_type.relationship',
                'config' => [
                    'related'        => 'Anomaly\UsersModule\User\UserModel',
                    'mode'           => 'lookup',
                    'key_name'       => null,
                    'title_name'     => null,
                    'value_table'    => null,
                    'selected_table' => null,
                    'lookup_table'   => null,
                    'handler'        => '\Anomaly\RelationshipFieldType\Handler\Related@handle'
                ]
            ],
            'telephone_number'  => 'anomaly.field_type.integer',
            'cultivated_area'   => 'anomaly.field_type.integer',
            'sheltered_area'    => 'anomaly.field_type.integer'
        ];
        $form->setFields($fields);

        $form->skipField('user');

        return $form->render();

    }
    public function view_crops(CropTableBuilder $builder, CropRepository $repository, Guard $auth)

    {

        if (!$user = $auth->user()) {
            abort(403);
        }

        $mycropsids = $repository->all()->where('user_id', $auth->id());
        $countmycrops = $repository->getModel()->getOriginal('id', $mycropsids)->count();

        if( $countmycrops == NULL ) {
            return $this->redirect->to(route('bespokode.module.members::farmers.crops_create'));
        };

        $builder->setButtons(          [

            'edit' => [
                'href' => 'members/farmers/crops/edit/{entry.id}'
            ],
        ]);

        return $builder->render();

    }
    public function edit_crops(CropFormBuilder $form, FarmerRepository $farmerRepository, CropRepository $repository, Guard $auth, $id)

    {

        if (!$user = $auth->user()) {
            abort(403);
        }

        $farmer = $farmerRepository->findBy('user_id', $auth->id())->getId();
        $mycropsids = $repository->all()->where('farmer_id', $farmer);
        $currentcropid = $repository->getModel()->getOriginal('id', $mycropsids)->find($id);


        if  ( $currentcropid ==  NULL ) {

            abort(403);
        }

        $fields = [
            'code' => 'anomaly.field_type.text',
            'products'                     => [
                'type'  => 'anomaly.field_type.relationship',
                'config'=> [
                    'related'    => 'Bespokode\VarietiesModule\Product\ProductModel',
                    'mode'           => 'dropdown',
                    'key_name'       => null,
                    'title_name'     => 'title',
                    'value_table'    => null,
                    'selected_table' => null,
                    'lookup_table'   => null,
                    'handler'        => function (RelationshipFieldType $fieldType, ProductRepository $productRepository)
                    {
                        $myproducts = $productRepository->all();
                        $fieldType->setOptions(
                            $myproducts->pluck('title', 'id'

                            )->all()
                        );
                    },

                ],
            ],
            'varieties'                     => [
                'type'  => 'anomaly.field_type.relationship',
                'config'=> [
                    'related'    => 'Bespokode\VarietiesModule\Variety\VarietyModel',
                    'mode'           => 'dropdown',
                    'key_name'       => null,
                    'title_name'     => 'title',
                    'value_table'    => null,
                    'selected_table' => null,
                    'lookup_table'   => null,
                    'handler'        => function (RelationshipFieldType $fieldType, VarietyRepository $varietyRepository)
                    {
                        $myvarieties = $varietyRepository->all();
                        $fieldType->setOptions(
                            $myvarieties->pluck('title', 'id'

                            )->all()
                        );
                    },

                ],
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
        $form->setFields($fields);

        return $form->render($id);
    }
    public function create_crops(CropFormBuilder $builder, AssociationRepository $repository, FarmerRepository $farmerRepository, ConsumerRepository $consumerRepository, Guard $auth)

    {

        if (!$user = $auth->user()) {
            abort(403);
        }
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $countmyfarmers = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();
        $myconsumers = $consumerRepository->all()->where('user_id', $auth->id()) ;
        $countmyconsumers = $consumerRepository->getModel()->getOriginal('id', $myconsumers)->count();

        if ($countmyfarmers == NULL)
        {
            abort(403);
        };
        if (!$countmyassociation == NULL)
        {
            abort(403);
        };

        if (!$countmyconsumers == NULL)
        {
            abort(403);
        };

        $builder->skipField('user')
                ->skipField('farmer');
        return $builder->render();

    }
}


/**
 * Created by Bespokode

 */