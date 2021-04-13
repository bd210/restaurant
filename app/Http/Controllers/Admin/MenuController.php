<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuEditRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\Picture;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class MenuController extends AdminController
{


    private $menu;

    public function __construct()
    {
        parent::__construct();

        $this->menu = new Menu();

        $menuType = new MenuType();
        $this->data['menutypes'] = $menuType->getAll();
    }


    public function index()
    {
        $this->data['info'] = $this->menu->getInfoCountId();
        $this->data['menus'] = $this->menu->getAllAdmin();

        return view('pages.admin.menus.menu', $this->data);
    }


    public function create()
    {
          return view('pages.admin.menus.menu_form_insert', $this->data);
    }


    public function store(MenuRequest $request)
    {
        try {
            $file = $request->file('picture');

            $pictureModel = new Picture();

            $directory = public_path('assets/img/menu/');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory,$fileName);

            $pictureModel->created_at = date("Y-m-d H:i:s");
            $pictureModel->src = 'assets/img/menu/'.$fileName;
            $pictureModel->alt = "menu picture";

            $this->menu->id_picture = $pictureModel->create();
            $this->menu->name = $request->input('name');
            $this->menu->description = $request->input('description');
            $this->menu->price = $request->input('price');
            $this->menu->id_menutype = $request->input('menutype');
            $this->menu->id_user = session()->get('user')->id;


            $rez = $this->menu->insert();

            if($rez)
                return redirect(route('SelectMenu'))->with('uspesno', 'YOU HAVE SUCCESSFULLY ADDED MENU');
            else
                return redirect(route('SelectMenu'))->with('neuspesno','AN ERROR HAS OCCURRED!');


        }catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU FILE-A: " . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }



    public function edit($id)
    {
        if($id){
            $this->menu->id= $id;
            $this->data['oneMenu'] = $this->menu->getOneAdmin();

            return view('pages.admin.menus.menu_form_edit', $this->data);
        }else
          return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }


    public function update(MenuEditRequest $request, $id)
    {
        try {
            $this->menu->id = $id;
            $this->menu->name = $request->input('name');
            $this->menu->description = $request->input('description');
            $this->menu->price = $request->input('price');
            $this->menu->id_menutype = $request->input('menutype');

            $file = $request->file('picture');

            if($request->hasFile('picture')){

                $directory = public_path('assets/img/menu/');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                $pictureModel = new Picture();
                $pictureModel->src = "assets/img/menu/" . $fileName;
                $pictureModel->alt = "menu picture";

                $this->menu->id_picture = $pictureModel->create();

                $deletePicture = $this->menu->getOne();
                File::delete($deletePicture->src);


            }else{
                $this->menu->id_picture = $request->input('old_picture');
            }

            $rez = $this->menu->edit();

            if($rez)
                return  redirect(route('SelectMenu'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED MENU');
            else
                return  redirect(route('SelectMenu'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GREKSA PRI UPITU" . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GREKSA PRI UPLOADU FILE-A" . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GREKSA " . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        try {
            if($id){

                $this->menu->id = $id;

                $deletePicture = $this->menu->getOneAdmin();
                $rez = $this->menu->delete();

                if($rez){
                    File::delete($deletePicture->src);
                    return redirect()->back()->with('uspesno' , 'YOU HAVE SUCCESSFULLY DELETED MENU');
                }
                else
                    return redirect()->back()->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
            }
            else
            return redirect()->back()->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
        }catch (Exception $e){
            Log::error('GRESKA : ' . $e->getMessage());
            return redirect(route('SelectMenu'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }
}
