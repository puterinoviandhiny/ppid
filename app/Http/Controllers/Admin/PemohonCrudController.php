<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PemohonRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PemohonCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PemohonCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
   // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
   // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
   // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Pemohon::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pemohon');
        CRUD::setEntityNameStrings('Pemohon', 'Pemohon');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::column('id');
        CRUD::column('nama')->label('Nama');
        CRUD::column('nik')->label('NIK');
        CRUD::column('alamat');
        CRUD::column('email');
        CRUD::column('telepon');
        CRUD::column('kategori_pemohon');
        CRUD::addColumn([
            'name' => 'file_ktp',
            'type' => 'image',
            //'disk'   => 'public',
            'prefix' => 'storage/',
            'height' => '30px',
            'width'  => '30px',
        ]);
        //CRUD::column('file_ktp')->type('image');
        CRUD::column('file_akta');
        CRUD::column('pekerjaan');
       // CRUD::column('created_at');
       // CRUD::column('updated_at');
       // CRUD::column('deleted_at');

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
        CRUD::setValidation(PemohonRequest::class);

       // CRUD::field('id');
        CRUD::field('nama');
        CRUD::field('nik');
        CRUD::field('alamat');
        CRUD::field('email');
        CRUD::field('telepon');
        CRUD::field('kategori_pemohon');
        CRUD::field('file_ktp');
        CRUD::field('file_akta');
        CRUD::field('pekerjaan');
       // CRUD::field('created_at');
       // CRUD::field('updated_at');
       // CRUD::field('deleted_at');

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

    protected function setupShowOperation()
    {
        // by default the Show operation will try to show all columns in the db table,
        // but we can easily take over, and have full control of what columns are shown,
        // by changing this config for the Show operation
        $this->crud->set('show.setFromDb', false);

        // example logic
        $this->crud->addColumn([
            'name' => 'nama',
            'label' => 'Nama Pemohon',
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'file_ktp',
            'label' => 'KTP',
            'type' => 'image',
            //'disk'   => 'public',
            'prefix' => 'storage/',
            'height' => '500px',
            'width' => '500px',
        ]);
        $this->crud->addColumn([
            'name' => 'nik',
            'label' => 'NIK',
        ]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');

        // Note: if you HAVEN'T set show.setFromDb to false, the removeColumn() calls won't work
        // because setFromDb() is called AFTER setupShowOperation(); we know this is not intuitive at all
        // and we plan to change behaviour in the next version; see this Github issue for more details
        // https://github.com/Laravel-Backpack/CRUD/issues/3108
    }
}
