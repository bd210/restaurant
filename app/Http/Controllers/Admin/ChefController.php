<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ChefEditRequest;
use App\Http\Requests\ChefRequest;
use App\Models\Chef;
use App\Models\Picture;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;

class ChefController extends AdminController
{

    private $chef ;

    public function __construct()
    {
        parent::__construct();
        $this->chef = new Chef();
    }


    public function index()
    {
        $this->data['chefs'] = $this->chef->getAll();

        return view('pages.admin.chefs.chef', $this->data);
    }


    public function create()
    {
        return  view('pages.admin.chefs.chef_form_insert', $this->data);
    }


    public function store(ChefRequest $request)
    {
        try {
            $this->chef->name = $request->input('name');
            $this->chef->workplace = $request->input('workplace');

            $file = $request->file('picture');

            $directory = public_path('assets/img/chefs/');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory,$fileName);

            $pictureModel = new Picture();

            $pictureModel->src = 'assets/img/chefs/' . $fileName;
            $pictureModel->alt = "chef picture";

            $this->chef->id_picture = $pictureModel->create();

            $rez = $this->chef->insert();

            if($rez)
                return redirect(route('SelectChef'))->with('uspesno','YOU HAVE SUCCESSFULLY ADDED CHEF');
            else
                return  redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (FileException $e){
            Log::error("GRESKA PRILIKOM UPLOAD FILE-A : " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (QueryException $e){
            Log::error("GRESKA PRI UPITU: " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function edit($id)
    {
        if($id){
            $this->chef->id = $id;
            $this->data['oneChef'] = $this->chef->getOne();

            return  view('pages.admin.chefs.chef_form_edit', $this->data);

        }else
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }


    public function update(ChefEditRequest $request, $id)
    {
        try {

            $this->chef->id = $id;
            $this->chef->name = $request->input('name');
            $this->chef->workplace = $request->input('workplace');

            $file = $request->file('picture');

            if($request->hasFile('picture')){


                $directory = public_path('assets/img/chefs/');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                $pictureModel = new Picture();
                $pictureModel->src ='assets/img/chefs/' . $fileName;
                $pictureModel->alt = 'chef picture';

                $this->chef->id_picture = $pictureModel->create();

                $deletePicture = $this->chef->getOne();
                 File::delete($deletePicture->src);

            }else{
                $this->chef->id_picture = $request->input('old_picture');
            }

            $rez = $this->chef->edit();

            if($rez)
                return  redirect(route('SelectChef'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED CHEF');
            else
                return redirect(route('SelectChef'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');


        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU FILE-A : " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }

    }


    public function destroy($id)
    {
        try {
            if($id){

                $this->chef->id = $id;

                $deletePicture= $this->chef->getOne();

                $rez = $this->chef->delete();

                if($rez){
                    File::delete($deletePicture->src);
                    return redirect()->back()->with('uspesno','YOU HAVE SUCCESSFULLY DELETED CHEF');
                }    else
                    return  redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');

            }
            else{
                return  redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectChef'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }
}
