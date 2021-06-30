<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermintaanRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Permintaan;
/**
 * Class PermintaanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PermintaanCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Permintaan::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/permintaan');
        CRUD::setEntityNameStrings('permintaan', 'permintaan');
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
        $this->crud->addColumn([
            'name'      => 'row_number',
            'type'      => 'row_number',
            'label'     => 'No',
            'orderable' => false,
        ])->makeFirstColumn();

        $this->crud->addColumn([
            'label'     => 'SKPD', // Table column heading
            'type'      => 'relationship',
            'name'      => 'id_skpd', // the column that contains the ID of that connected entity;
            'entity'    => 'skpd', // the method that defines the relationship in your Model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            'model'     => App\Models\Permintaan::class, // foreign key model
         ]); /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
        CRUD::addColumn(['name' => 'pemohon', 'type' => 'text']);
        CRUD::addColumn(['name' => 'informasi_diminta', 'type' => 'text']);
        CRUD::addColumn(['name' => 'alasan', 'type' => 'text']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PermintaanRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name'  => 'pemohon',
            'label' => 'Nama Pemohon',
            'type'  => 'text'
        ],
        );
        $this->crud->addField([
            // 1-n relationship
            'label'     => 'SKPD', // Table column heading
            'type'      => 'select',
            'name'      => 'id_skpd', // the column that contains the ID of that connected entity;
            'entity'    => 'skpd', // the method that defines the relationship in your Model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            'model'     => "App\Models\Skpd", // foreign key model
         ],
        );

        $this->crud->addField([
            // select_from_array
            'name'    => 'id_tindak_lanjut',
            'label'   => 'Tindak Lanjut',
            'type'    => 'select_from_array',
            'options' => ['fax' => 'Fax', 'telepon' => 'Telepon', 'email' => 'Email'],
        ],
        );
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
}
