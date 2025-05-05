<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings('categoría', 'categorías');
    }

    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'name', 'label' => 'Nombre']);
        CRUD::addColumn(['name' => 'slug', 'label' => 'Slug']);
        CRUD::addColumn(['name' => 'description', 'label' => 'Descripción']);
        CRUD::addColumn([   
            'name' => 'image',
            'label' => 'Imagen',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '50px',
            'width'  => 'auto',
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(CategoryRequest::class);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Nombre'
        ]);

        CRUD::addField([
            'name' => 'slug',
            'type' => 'hidden',
            'label' => ''
        ]);

        CRUD::addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => 'Descripción'
        ]);

        CRUD::addField([   // image
            'name' => 'image',
            'label' => 'Imagen de la Categoría',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public', 
            'prefix' => 'categories/' 
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}