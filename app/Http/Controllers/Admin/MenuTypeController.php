<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuTypeRequest;
use App\Models\MenuType;
use Illuminate\Support\Facades\Log;
use Exception;

class MenuTypeController extends AdminController
{

    private  $menutypes;

    public function __construct()
    {
        parent::__construct();
        $this->menutypes = new MenuType();
    }


    public function index()
    {
        $this->data['menutypes'] = $this->menutypes->getAll();
        return  view('pages.admin.menutypes.menutype', $this->data);
    }


    public function create()
    {
        return view('pages.admin.menutypes.menutype_form_insert' , $this->data);
    }


    public function store(MenuTypeRequest $request)
    {
        try {
            $this->menutypes ->type = $request->input('type');

            $rez = $this->menutypes->insert();

            if($rez){
                return redirect(route('SelectMenuType'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY ADDED MENUTYPE');
            }else
                return redirect(route('SelectMenuType'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e) {
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectMenuType'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }



    public function edit($id)
    {
        if($id){

            $this->menutypes->id = $id;
            $this->data['oneMenuType'] = $this->menutypes->getOne();

            return view('pages.admin.menutypes.menutype_form_edit', $this->data);

        }else
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }


    public function update(MenuTypeRequest $request, $id)
    {
        try {
            if($id){

                $this->menutypes->id = $id;
                $this->menutypes->type = $request->input('type');
                $rez = $this->menutypes->edit();

                if($rez)
                return  redirect(route('SelectMenuType'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED MENUTYPE');
                else
                return  redirect(route('SelectMenuType'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }
            else
                return  redirect(route('SelectMenuType'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectMenuType'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        try {
            if($id){

                $this->menutypes->id = $id;
                $this->menutypes->delete();
                return  redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED MENUTYPE');
            }
            else
             return  redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectMenuType'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }
}
