<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Course::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course');
        CRUD::setEntityNameStrings('course', 'courses');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
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
        CRUD::setValidation(CourseRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
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
        // CRUD::setFromDb(); // fields
        CRUD::column('name');
        CRUD::column('code');
        $this->crud->addColumn([
        'name' => 'subjects',
        'label' => 'Subjects',
        'escaped' => false,
        'value' => function ($entry) {
            return $entry->subjects->map(function ($subject) {
                echo '<a href="' . route('subject.show', $subject->id) . '" class="btn btn-primary btn-sm me-2">' . $subject->name . '</a>';
            })->implode(' ');
        }]);
        $this->crud->addColumn([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'escaped' => false,
            'value' => function ($entry) {
                echo $entry->description;
            }
        ]);

        // $this->crud->addColumn([
        //     'name' => 'students',
        //     'label' => 'Students',
        //     'default' => 'No students', 
        //     'escaped' => false, // allow HTML rendering
        //     'value' => function ($data) {
        //         $students = $data->students->toArray();

        //         return collect($students)->map(function ($student) {
        //             return '<a href="' . route('student.show', $student['id']) . '" class="btn btn-primary btn-sm me-2">' . $student['name'] . '</a>';
        //         })->implode(' ');
        //     }
        // ]);
    }
}
