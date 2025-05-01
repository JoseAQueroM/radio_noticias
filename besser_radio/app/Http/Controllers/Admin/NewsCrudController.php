<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class NewsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('noticia', 'noticias');
    }

    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'title', 'type' => 'text', 'label' => 'Título']);
        CRUD::addColumn([
            'name' => 'category_id',
            'type' => 'relationship',
            'label' => 'Categoría',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => 'App\Models\Category',
        ]);
        CRUD::addColumn(['name' => 'publish_date', 'type' => 'datetime', 'label' => 'Fecha de Publicación']);
        CRUD::addColumn(['name' => 'status', 'type' => 'enum', 'label' => 'Estado']);
        CRUD::addColumn(['name' => 'is_featured', 'type' => 'check', 'label' => 'Destacada']);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);

        CRUD::addField([
            'name' => 'category_id',
            'type' => 'select',
            'label' => 'Categoría',
            'entity' => 'category',
            'model' => 'App\Models\Category',
            'attribute' => 'name',
            'options' => (fn ($query) => $query->orderBy('name')->get()),
            'wrapper' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Título',
            'wrapper' => ['class' => 'form-group col-md-6'],
            'attributes' => ['id' => 'title'],
        ]);

        CRUD::addField([
            'name' => 'slug',
            'type' => 'hidden',
            'label' => '',
        ]);

        CRUD::addField([
            'name' => 'content',
            'type' => 'textarea',
            'label' => 'Contenido',
        ]);

        CRUD::addField([
            'name' => 'image',
            'type' => 'upload',
            'label' => 'Imagen',
            'upload' => true,
            'disk' => 'public',
            'path' => 'uploads/',
        ]);

        CRUD::addField([
            'name' => 'publish_date',
            'type' => 'datetime',
            'label' => 'Fecha de Publicación',
            'allows_null' => true,
            'format' => 'YYYY-MM-DD HH:mm:ss',
        ]);

        CRUD::addField([
            'name' => 'is_featured',
            'type' => 'checkbox',
            'label' => 'Destacada',
        ]);

        CRUD::addField([
            'name' => 'status',
            'type' => 'enum',
            'label' => 'Estado',
            'options' => ['draft' => 'Borrador', 'published' => 'Publicada', 'archived' => 'Archivada'],
        ]);

        CRUD::addField([
            'name' => 'author_id',
            'type' => 'hidden',
            'default' => backpack_auth()->id(),
        ]);

        CRUD::setOperationSetting('saveAllInputsExcept', ['_token', '_method', 'http_referrer', 'current_tab', 'save_action']);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}