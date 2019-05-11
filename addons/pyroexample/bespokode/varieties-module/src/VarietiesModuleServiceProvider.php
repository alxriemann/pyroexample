<?php namespace Bespokode\VarietiesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class VarietiesModuleServiceProvider extends AddonServiceProvider
{

    protected $routes = [
        'admin/varieties' => 'Bespokode\VarietiesModule\Http\Controller\Admin\VarietiesController@index',
        'admin/varieties/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\VarietiesController@create',
        'admin/varieties/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\VarietiesController@edit',
        'admin/varieties/products' => 'Bespokode\VarietiesModule\Http\Controller\Admin\ProductsController@index',
        'admin/varieties/products/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\ProductsController@create',
        'admin/varieties/products/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\ProductsController@edit',
        'admin/varieties/categories' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CategoriesController@index',
        'admin/varieties/categories/create' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CategoriesController@create',
        'admin/varieties/categories/edit/{id}' => 'Bespokode\VarietiesModule\Http\Controller\Admin\CategoriesController@edit'
    ];


}
