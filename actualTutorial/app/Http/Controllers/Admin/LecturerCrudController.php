<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LecturerRequest;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use Session;            

/**
 * Class LecturerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LecturerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Lecturer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/lecturer');
        $this->crud->setEntityNameStrings('lecturer', 'lecturers');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(LecturerRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    
    public function publicIndex(Request $request)
    {
        if (Session::get('lecturerid') == "") return Redirect::to(".");        
        $lecturers = Lecturer::all();   
        return view('lecturerlist', ['lecturers' => $lecturers]);
    }


    public function login(Request $request) {
            
        $lecturer = Lecturer::all()->where('lecturer_id', $request->input("lecturerid"))->where('name', $request->input("lecturername"));
        $count = $lecturer->count();
            
        if ($count == 0) {
            return Redirect::to(URL::previous())->with('message', 'Invalid Lecturer ID and or Name');
        } else {
                
            $request->session()->put('lecturerid', $request->input("lecturerid"));
            $request->session()->put('id', $lecturer->first()->id);
            
            return Redirect::to("lecturer");
            
            }
    }
    public function logout(Request $request) {
            
        $request->session()->forget('lecturerid');
        $request->session()->forget('id');
        return Redirect::to(".");
    }

    public function lectureradd()   
    {
        if (Session::get('lecturerid') == "") return Redirect::to(".");
        return view('lectureradd'); 
    }
        
    public function lectureraddsave(Request $request) {
            
        Lecturer::create($request->except('submit'));
        return Redirect::to("lecturer");
    }



}
