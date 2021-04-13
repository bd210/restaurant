<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutEditRequest;
use App\Models\About;
use App\Models\Picture;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Log;
use Exception;


class AboutController extends AdminController
{

    private $about;

    public function __construct()
    {
        parent::__construct();
        $this->about = new About();
        $this->data['aboutInfo'] = $this->about->getAbout();
    }


    public function index()
    {

        return view('pages.admin.about.about', $this->data);
    }


    public function edit()
    {
        return view('pages.admin.about.about_form_edit', $this->data);
    }


    public function update(AboutEditRequest $request)
    {
        try {
            $this->about->title = $request->input('title');
            $this->about->description = $request->input('description');

            $file = $request->file('picture');

            if($request->hasFile('picture')){

                $directory = public_path('assets/img/');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                $pictureModel = new Picture();
                $pictureModel->src = 'assets/img/' . $fileName;
                $pictureModel->alt = 'about picture';

                $this->about->id_picture = $pictureModel->create();

                $deletePicture = $this->about->getAbout();
                File::delete($deletePicture->src);

            }else{
                $this->about->id_picture = $request->input('old_picture');
            }

            $rez = $this->about->edit();

            if($rez)
                return  redirect(route('SelectAbout'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED ABOUT');
            else
                return  redirect(route('SelectAbout'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectAbout'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA  PRI UPLOADU FILE-A : " . $e->getMessage());
            return redirect(route('SelectAbout'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectAbout'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }



}
