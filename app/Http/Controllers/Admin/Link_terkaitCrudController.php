<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Link_terkaitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Link_terkaitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Link_terkaitCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Link_terkait::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/link_terkait');
        CRUD::setEntityNameStrings('Link Terkait', 'Link Terkait');
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
        $this->crud->addField([
            'name'  => 'nama',
            'label' => 'Nama',
            'type'  => 'text'
        ],
        );
        $this->crud->addField([
            'name'  => 'gambar',
            'label' => 'Gambar',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;

        ],
        );
        $this->crud->addField([
            'name'  => 'link',
            'label' => 'Link',
            'type'  => 'text'
        ],
        );
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
        CRUD::setValidation(Link_terkaitRequest::class);

       // CRUD::setFromDb(); // fields
       $this->crud->addField([
        'name'  => 'nama',
        'label' => 'Nama',
        'type'  => 'text'
    ],
    );
    $this->crud->addField([
        'name'  => 'gambar',
        'label' => 'Gambar',
        'type'      => 'upload',
        'upload'    => true,
        'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;

    ],
    );
    $this->crud->addField([
        'name'  => 'link',
        'label' => 'Link',
        'type'  => 'text'
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
