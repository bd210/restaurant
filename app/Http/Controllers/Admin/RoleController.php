<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Exception;

class RoleController extends AdminController
{

    protected $role;

    public function __construct()
    {

        parent::__construct();
          $this->role = new Role();
  }

    public function index()
    {

        $this->data['roles'] = $this->role->getAll();

        return  view('pages.admin.roles.role', $this->data);
    }


    public function create()
    {
        return view('pages.admin.roles.role_form_insert', $this->data);
    }


    public function store(RoleRequest $request)
    {
        try {

            $this->role->name = $request->input('name');
           $rez =  $this->role->create();

           if($rez) return redirect(route('SelectRole'))->with('uspesno', 'YOU HAVE SUCCESSFULLY ADDED ROLE');

           else return redirect(route('SelectRole'))->with('neuspesno' ,'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error('GRESKA : ' . $e->getMessage());
            return redirect(route('SelectRole'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function edit($id)
    {
        if($id){
            $this->role->id = $id;
           $this->data['showRole'] = $this->role->getOne();

           return view('pages.admin.roles.role_form_edit', $this->data);
        }else{
            return redirect(route('SelectRole'))->with('neuspesno','AN ERROR HAS OCCURRED!');
        }
    }


    public function update(RoleRequest $request, $id)
    {
        try {

            if($id){
                $this->role->id = $id;
                $this->role->name = $request->input('name');
               $rez =  $this->role->edit();
              if($rez)
                  return redirect(route('SelectRole'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED ROLE');
            else
                return redirect(route('SelectRole'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

            }else

            return redirect(route('SelectRole'))->with('neuspesno','AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error('GRESKA : ' . $e->getMessage());
            return redirect(route('SelectRole'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }

    public function destroy($id)
    {
        try {

            if ($id)
            {
                $this->role->id = $id;
                $this->role->delete();

                return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED ROLE');
            }
            else{
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }


        } catch (Exception $e) {

             Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectRole'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }


    }
}
