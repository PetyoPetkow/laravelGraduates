<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GraduateThesisRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GraduateThesisCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GraduateThesisCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    private function getFieldsData() {
        return [
            [
                'name'=> 'topic',
                'label' => 'Topic',
                'type'=> 'text',
            ],
            [   
                'label'     => "Teacher",
                'name'      => 'teacher_id',
                'type'      => 'select',
                'entity'    => 'teacher',
                'model'     => "App\Models\Teacher", // related model
                'attribute' => 'name', // foreign key attribute that is shown to user
            ]
        ];
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\GraduateThesis::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/graduate-thesis');
        CRUD::setEntityNameStrings('graduate thesis', 'graduate theses');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns

        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData(TRUE));

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
        CRUD::setValidation(GraduateThesisRequest::class);
        // CRUD::setFromDb(); // fields

        $this->crud->set('show.setFromDb', false);
        $this->crud->addFields($this->getFieldsData(TRUE));
        
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

    // protected function setupShowOperation()
    // {
    //     // by default the Show operation will try to show all columns in the db table,
    //     // but we can easily take over, and have full control of what columns are shown,
    //     // by changing this config for the Show operation
    //     $this->crud->set('show.setFromDb', false);
    //     $this->crud->addColumns($this->getFieldsData(TRUE));
    // }
}
