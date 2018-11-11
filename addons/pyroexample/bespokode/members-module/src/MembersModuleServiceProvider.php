<?php namespace Bespokode\MembersModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Bespokode\MembersModule\Association\Form\AssociationFormBuilder;
use Bespokode\MembersModule\Http\Controller\Admin\AssociationsController;

class MembersModuleServiceProvider extends AddonServiceProvider
{

    protected $routes = [
        'members/associations/profile'                        => [
            'as'   => 'bespokode.module.members::associations.view',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@view_profile',
        ],
        'members/associations/profile/edit'                        => [
            'as'   => 'bespokode.module.members::associations.edit',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@edit_profile',
        ],
        'members/associations/profile/farmers'                        => [
            'as'   => 'bespokode.module.members::associations.farmers',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@view_farmers',
        ],
        'members/associations/profile/farmers/edit/{id}'                        => [
            'as'   => 'bespokode.module.members::associations.editf',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@edit_farmers',
        ],
        'members/associations/profile/farmers/create'                        => [
            'as'   => 'bespokode.module.members::associations.farmers_create',
            'uses' => 'Bespokode\MembersModule\Http\Controller\AssociationsController@create_farmers',
        ],
        'admin/members' => 'Bespokode\MembersModule\Http\Controller\Admin\MembersController@index',
        'admin/members/create' => 'Bespokode\MembersModule\Http\Controller\Admin\MembersController@create',
        'admin/members/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\MembersController@edit',
        'admin/members/associations' => 'Bespokode\MembersModule\Http\Controller\Admin\AssociationsController@index',
        'admin/members/associations/create' => 'Bespokode\MembersModule\Http\Controller\Admin\AssociationsController@create',
        'admin/members/associations/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\AssociationsController@edit',
        'admin/members/farmers' => 'Bespokode\MembersModule\Http\Controller\Admin\FarmersController@index',
        'admin/members/farmers/create' => 'Bespokode\MembersModule\Http\Controller\Admin\FarmersController@create',
        'admin/members/farmers/edit/{id}' => 'Bespokode\MembersModule\Http\Controller\Admin\FarmersController@edit'
    ];

    protected $bindings = [
        'users' => UserFormBuilder::class,
        'Anomaly\UsersModule\User\Contract\UserInterface' => 'Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder',
        'Bespokode\MembersModule\Http\Controller\AssociationController@view_farmers' => 'Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder',
    ];

}
