<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Picture;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Log;
use Exception;


class GalleryController extends AdminController
{

    private $gallery;
     public function __construct()
    {
        parent::__construct();
        $this->gallery = new Gallery();
    }


    public function index(){
        $this->data['info'] = $this->gallery->getInfo();
        $this->data['galleries'] = $this->gallery->getAllAdmin();


        return view('pages.admin.galleries.gallery', $this->data);
    }


    public function create()
    {
        return view('pages.admin.galleries.gallery_form_insert', $this->data);
    }


    public function store(GalleryRequest $request)
    {
        try {

            $file = $request->file('picture');

            $directory = public_path('assets/img/gallery/');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory,$fileName);

            $pictureModel = new Picture();
            $pictureModel->src = 'assets/img/gallery/'.$fileName;
            $pictureModel->alt = 'gallery picture';

            $this->gallery->id_picture = $pictureModel->create();

            $rez = $this->gallery->insert();

            if($rez)
                return redirect(route('SelectGallery'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY ADDED PICTURE IN GALLERY');
            else
                return redirect(route('SelectGallery'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
        }
        catch(QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch(FileException $e){
            Log::error("GRESKA PRI UPLOADU FILE-A: " . $e->getMessage());
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch(Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }

    }



    public function edit($id)
    {
        if($id){
            $this->gallery->id = $id;
            $this->data['oneGallery'] = $this->gallery->getOne();

            return view('pages.admin.galleries.gallery_form_edit', $this->data);
        }else
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }


    public function update(GalleryRequest $request, $id)
    {
        try {
            $this->gallery->id = $id;

            $file = $request->file('picture');

            $directory = public_path('assets/img/gallery/');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory, $fileName);

            $pictureModel = new Picture();
            $pictureModel->src = 'assets/img/gallery/' . $fileName;
            $pictureModel->alt = 'gallery picture';



            $this->gallery->id_picture = $pictureModel->create();

            $deletePicture = $this->gallery->getOne();
            File::delete($deletePicture->src);

            $rez = $this->gallery->edit();

            if($rez)
                return  redirect(route('SelectGallery'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED PICTURE FROM GALLERY');
            else
                return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " .$e->getMessage());
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU FILE-A : " .$e->getMessage());
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " .$e->getMessage());
            return redirect(route('SelectGallery'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        if($id){
        $this->gallery->id= $id;
        $deletePicture = $this->gallery->getOne();

            $rez = $this->gallery->delete();

            if($rez){
                File::delete($deletePicture->src);
                return redirect()->back()->with('uspesno' , 'YOU HAVE SUCCESSFULLY DELETED PICTURE FROM GALLERY');
            }

            else
                return redirect()->back()->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }else
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }
}
