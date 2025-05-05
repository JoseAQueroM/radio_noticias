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
        CRUD::column('title')->label('Título');
        CRUD::column('category_id')->label('Categoría');
        CRUD::column('publish_date')->label('Fecha de publicación');
        CRUD::column('status')->label('Estado');
        CRUD::column('is_featured')->label('Destacada')->type('boolean');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'title' => 'required|min:2|max:255',
            'content' => 'required',
            'image' => 'required|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:users,id',
            'publish_date' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        CRUD::field('title')->label('Título');
        
        CRUD::field('category_id')
            ->label('Categoría')
            ->type('select')
            ->entity('category')
            ->model('App\Models\Category')
            ->attribute('name');
        
        CRUD::field('author_id')
            ->label('Autor')
            ->type('select')
            ->entity('author')
            ->model('App\Models\User')
            ->attribute('name');
        
        CRUD::field('content')
            ->label('Contenido')
            ->type('textarea');
        
        // Campo de imagen usando upload (alternativa gratuita)
        CRUD::field('image')
            ->label('Imagen')
            ->type('upload')
            ->withFiles([
                'disk' => 'public',
                'path' => 'uploads',
            ]);
        
        CRUD::field('publish_date')
            ->label('Fecha de publicación')
            ->type('datetime');
        
        CRUD::field('is_featured')
            ->label('Destacada')
            ->type('checkbox');
        
        CRUD::field('status')
            ->label('Estado')
            ->type('select_from_array')
            ->options([
                'draft' => 'Borrador',
                'published' => 'Publicado'
            ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        
        CRUD::setValidation([
            'title' => 'required|min:2|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:users,id',
            'publish_date' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        
        CRUD::column('content')->label('Contenido')->type('textarea');
        CRUD::column('slug')->label('Slug');
        CRUD::column('created_at')->label('Creado');
        CRUD::column('updated_at')->label('Actualizado');
        
        // Mostrar imagen en el show operation
        CRUD::column('image')
            ->label('Imagen')
            ->type('image')
            ->prefix('storage/');
    }
}