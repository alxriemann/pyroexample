<?php namespace Bespokode\MembersModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\UsersModule\User\Form\UserFormBuilder;

class MembersModuleServiceProvider extends AddonServiceProvider
{

    protected $routes = [
        'members'                        => [
            'as'   => 'bespokode.module.members::home',
            'uses' => 'Bespokode\MembersModule\Http\Controller\MembersController@home',
        ],
        'members/profile'                        => [
            'as'   => 'bespokode.module.members::view',
            'uses' => 'Bespokode\MembersModule\Http\Controller\MembersController@view_profile',
        ],
        'members/profile/edit'                        => [
            'as'   => 'bespokode.module.members::edit',
            'uses' => 'Bespokode\MembersModule\Http\Controller\MembersController@edit_profile',
        ],
        'members/associations'                        => [
            'as'   => 'bespokode.module.members::associations.association_view',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@view_association',
        ],
        'members/associations/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::associations.association_edit',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@edit_association',
        ],
        'members/associations/create'                        => [
            'as'   => 'bespokode.module.members::associations.association_create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@create_association',
        ],
        'members/associations/farmers'                        => [
            'as'   => 'bespokode.module.members::associations.farmers',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@view_farmers',
        ],
        'members/associations/farmers/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::associations.editf',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@edit_farmers',
        ],
        'members/associations/farmers/create'                        => [
            'as'   => 'bespokode.module.members::associations.farmers_create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@create_farmers',
        ],
        'members/associations/crops'                        => [
            'as'   => 'bespokode.module.members::associations.crops',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@view_crops',
        ],
        'members/associations/crops/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::associations.editc',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@edit_crops',
        ],
        'members/associations/crops/create'                        => [
            'as'   => 'bespokode.module.members::associations.crops_create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@create_crops',
        ],
        'members/farmers'                        => [
            'as'   => 'bespokode.module.members::farmers.view',
            'uses' => 'Bespokode\MembersModule\Http\Controller\FarmersController@view_farmer_profile',
        ],
        'members/farmers/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::farmers.edit',
            'uses' => 'Bespokode\MembersModule\Http\Controller\FarmersController@edit_farmer_profile',
        ],
        'members/farmers/create'                        => [
            'as'   => 'bespokode.module.members::farmers.create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\FarmersController@create_farmer_profile',
        ],
        'members/farmers/crops'                        => [
            'as'   => 'bespokode.module.members::farmers.crops',
            'uses' => 'Bespokode\MembersModule\Http\Controller\FarmersController@view_crops',
        ],
        'members/farmers/crops/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::farmers.editc',
            'uses' => 'Bespokode\MembersModule\Http\Controller\FarmersController@edit_crops',
        ],
        'members/farmers/crops/create'                        => [
            'as'   => 'bespokode.module.members::farmers.crops_create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\FarmersController@create_crops',
        ],
        'members/consumers'                        => [
            'as'   => 'bespokode.module.members::consumers.view',
            'uses' => 'Bespokode\MembersModule\Http\Controller\ConsumersController@view_consumer_profile',
        ],
        'members/consumers/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::consumers.edit',
            'uses' => 'Bespokode\MembersModule\Http\Controller\ConsumersController@edit_consumer_profile',
        ],
        'members/consumers/create'                        => [
            'as'   => 'bespokode.module.members::consumers.create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\ConsumersController@create_consumer_profile',
        ],
        'admin/members' => 'Bespokode\MembersModule\Http\Controller\Admin\MembersController@index',
        'admin/members/create' => 'Bespokode\MembersModule\Http\Controller\Admin\MembersController@create',
        'admin/members/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\MembersController@edit',
        'admin/members/associations' => 'Bespokode\MembersModule\Http\Controller\Admin\AssociationsController@index',
        'admin/members/associations/create' => 'Bespokode\MembersModule\Http\Controller\Admin\AssociationsController@create',
        'admin/members/associations/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\AssociationsController@edit',
        'admin/members/farmers' => 'Bespokode\MembersModule\Http\Controller\Admin\FarmersController@index',
        'admin/members/farmers/create' => 'Bespokode\MembersModule\Http\Controller\Admin\FarmersController@create',
        'admin/members/farmers/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\FarmersController@edit',
        'admin/members/consumers' => 'Bespokode\MembersModule\Http\Controller\Admin\ConsumersController@index',
        'admin/members/consumers/create' => 'Bespokode\MembersModule\Http\Controller\Admin\ConsumersController@create',
        'admin/members/consumers/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\ConsumersController@edit',
        'admin/members/crops' => 'Bespokode\MembersModule\Http\Controller\Admin\CropsController@index',
        'admin/members/crops/create' => 'Bespokode\MembersModule\Http\Controller\Admin\CropsController@create',
        'admin/members/crops/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\CropsController@edit'

    ];

    protected $bindings = [
        'users' => UserFormBuilder::class,
        'Anomaly\UsersModule\User\Contract\UserInterface' => 'Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder',
        'Bespokode\MembersModule\Http\Controller\AssociationController@view_farmers' => 'Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder',
        'Bespokode\MembersModule\Crop\Form\CropFormBuilder' => 'Bespokode\MembersModule\Crop\Form\CropFormBuilder'
    ];

}
