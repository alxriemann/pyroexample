<?php namespace Bespokode\VarietiesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class VarietiesModuleServiceProvider extends AddonServiceProvider
{

    protected $routes = [

        'admin/varieties' => 'Bespokode\VarietiesModule\Http\Controller\Admin\VarietiesController@index',
        'admin/varieties/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\VarietiesController@create',
        'admin/varieties/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\VarietiesController@edit',
        'admin/varieties/crops' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CropsController@index',
        'admin/varieties/crops/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CropsController@create',
        'admin/varieties/crops/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CropsController@edit',
        'admin/varieties/categories' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CategoriesController@index',
        'admin/varieties/categories/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CategoriesController@create',
        'admin/varieties/categories/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/varieties/associations' => 'Bespokode\VarietiesModule\Http\Controller\Admin\AssociationsController@index',
        'admin/varieties/associations/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\AssociationsController@create',
        'admin/varieties/associations/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\AssociationsController@edit',
        'admin/varieties/farmers' => 'Bespokode\VarietiesModule\Http\Controller\Admin\FarmersController@index',
        'admin/varieties/farmers/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\FarmersController@create',
        'admin/varieties/farmers/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\FarmersController@edit',
    ];

    protected $bindings = [
        

    ];


}
