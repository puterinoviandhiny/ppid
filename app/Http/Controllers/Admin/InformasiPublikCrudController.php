<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InformasiPublikRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InformasiPublikCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InformasiPublikCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\InformasiPublik::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/informasi-publik');
        CRUD::setEntityNameStrings('Informasi Publik', 'Informasi Publik');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns
        CRUD::column('judul')->label('Judul');
        CRUD::column('jangka_waktu')->label('Jangka Waktu');
        CRUD::column('format')->label('Format');
        CRUD::column('tempat')->label('Tempat');
        CRUD::column('file')->label('File');
        CRUD::column('id_skpd')->label('SKPD');
        CRUD::column('id_jenis_informasi')->label('Jenis Informasi');
        CRUD::column('kategori')->label('Kategori');
        CRUD::column('pj_terbit')->label('Penanggung Jawab Terbit');
        CRUD::column('pj_pejabat')->label('Pejabat Penanggung Jawab');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(InformasiPublikRequest::class);

        //CRUD::setFromDb(); // fields
        CRUD::field('judul')->label('Judul');
        $this->crud->addField([
            'label' => 'Jangka Waktu Penyimpanan',
            'type' => "relationship",
            'name' => 'jangka', // the method on your model that defines the relationship
            'ajax' => true,
            'inline_create' => true
        ]);
        CRUD::field('format')->label('Format')->type('enum');
        CRUD::field('tempat')->label('Tempat');
        CRUD::field('file')->label('File')->type('upload');
        CRUD::field('id_skpd')
        ->label('SKPD')
        ->type('select')
        ->entity('skpd')
        ->model('App\Models\Skpd')
        ->attribute('nama');
        CRUD::field('id_jenis_informasi')
        ->label('Jenis Informasi')
        ->type('select')
        ->entity('jenis')
        ->model('App\Models\Jenis_informasi')
        ->attribute('nama');;
        CRUD::field('kategori')->label('Kategori')->type('enum');
        CRUD::field('pj_terbit')->label('Penanggung Jawab Terbit');
        CRUD::field('pj_pejabat')->label('Pejabat Penanggung Jawab');
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function fetchJangka()
    {
        return $this->fetch(\App\Models\JangkaWaktu::class);
    }

}
