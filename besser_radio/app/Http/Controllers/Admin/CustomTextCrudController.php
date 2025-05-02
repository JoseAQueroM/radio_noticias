<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomTextRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CustomTextCrudController extends CrudController
{
    public function setup()
    {
        CRUD::setModel(\App\Models\CustomText::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customTexts');
        CRUD::setEntityNameStrings('texto personalizado', 'textos personalizados');
    }

    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'title_logo',
            'type' => 'text',
            'label' => 'Título Logo'
        ]);
        CRUD::addColumn([
            'name' => 'title_home',
            'type' => 'text',
            'label' => 'Título Home'
        ]);
        CRUD::addColumn([
            'name' => 'subtitle_home',
            'type' => 'text',
            'label' => 'Subtítulo Home'
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::addField([
            'name' => 'title_logo',
            'type' => 'text',
            'label' => 'Título Logo'
        ]);
        CRUD::addField([
            'name' => 'title_home',
            'type' => 'text',
            'label' => 'Título Home'
        ]);
        CRUD::addField([
            'name' => 'subtitle_home',
            'type' => 'textarea',
            'label' => 'Subtítulo Home'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
