<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SpecialEditRequest;
use App\Http\Requests\SpecialRequest;
use App\Models\Picture;
use App\Models\Special;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class SpecialController extends AdminController
{


    private $special;

    public function __construct()
    {
        parent::__construct();
        $this->special = new Special();
    }

    public function index()
    {
        $this->data['info'] = $this->special->getInfoCountId();
        $this->data['specials'] = $this->special->getAllAdmin();
        return  view('pages.admin.specials.special', $this->data);
    }

    public function create()
    {
        return view('pages.admin.specials.special_form_insert', $this->data);
    }

    public function store(SpecialRequest $request)
    {
        try {

                $this->special->name = $request->input('name');
                $this->special->title = $request->input('title');
                $this->special->description = $request->input('description');
                $this->special->tab = $request->input('tab');

                $file = $request->file('picture');

                $directory = public_path('assets/img/specials/');
                $fileName = time()."_".$file->getClientOriginalName();
                $file->move($directory,$fileName);

                $picture = new Picture();
                $picture->src = 'assets/img/specials/'.$fileName;
                $picture->alt = "special picture";
                $picture->created_at = date("Y-m-d H:i:s");

                $this->special->id_picture = $picture->create();

                $rez = $this->special->insert();

                if($rez)
                    return redirect(route('SelectSpecial'))->with('uspesno', 'YOU HAVE SUCCESSFULLY ADDED SPECIAL');
                else
                    return  redirect(route('SelectSpecial'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU FILE-A : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }

    }


    public function edit($id)
    {
        if($id){
            $this->special->id = $id;
            $this->data['oneSpecial'] = $this->special->getOne();
            return view('pages.admin.specials.special_form_edit' , $this->data);
        }else
            return redirect(route('SelectSpecial'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
    }

    public function update(SpecialEditRequest $request, $id)
    {
        try {
            $this->special->id = $id;
            $this->special->name = $request->input('name');
            $this->special->title = $request->input('title');
            $this->special->description = $request->input('description');

            $file = $request->file('picture');

            if($request->hasFile('picture')){

                $directory = public_path('assets/img/specials/');
                $fileName = time() ."_" . $file->getClientOriginalName();
                $file->move($directory,$fileName);

                $pictureModel= new Picture();
                $pictureModel->src = 'assets/img/specials/' . $fileName;
                $pictureModel->alt = "special pitcture";

                $this->special->id_picture = $pictureModel->create();

                $deletePicture = $this->special->getOne();
                File::delete($deletePicture->src);


            }else{
                $this->special->id_picture = $request->input('old_picture');
            }

            $rez = $this->special->edit();

            if($rez)
                return  redirect(route('SelectSpecial'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED SPECIAL');
            else
                return  redirect(route('SelectSpecial'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        try {
            if($id){

                $this->special->id = $id;
                $deletePicture = $this->special->getOne();

                  $rez = $this->special->delete();

                if($rez){

                    File::delete($deletePicture->src);
                    return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED SPECIAL');
                }else{

                    return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
                }

            }else
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectSpecial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }
}
