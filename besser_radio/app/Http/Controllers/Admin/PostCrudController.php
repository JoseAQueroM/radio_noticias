<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    protected function setupListOperation()
    {
        CRUD::column('title_logo')
            ->label('Logo')
            ->type('image')
            ->prefix('storage/') // Asegura que las imágenes se carguen correctamente
            ->height('50px')
            ->width('50px');

        CRUD::column('title_home')
            ->label('Título Home');

        CRUD::column('subtitle_home')
            ->label('Subtítulo Home');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);
        
        CRUD::field('title_logo')
            ->label('Logo')
            ->type('upload')
            ->withFiles([
                'disk' => 'public',
                'path' => 'uploads/posts/logos',
                'prefix' => 'storage' // ¡Este es el ajuste clave que faltaba!
            ])
            ->hint('Formatos: SVG, PNG, JPG (max 5MB)');

        CRUD::field('title_home')
            ->label('Título Home')
            ->type('text');

        CRUD::field('subtitle_home')
            ->label('Subtítulo Home')
            ->type('textarea');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}