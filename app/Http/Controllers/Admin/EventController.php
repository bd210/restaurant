<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventEditRequest;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Picture;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Log;
use Exception;

class EventController extends AdminController
{

    private $event;

    public function __construct()
    {
        parent::__construct();
        $this->event = new Event();
    }

    public function index()
    {
        $this->data['info'] = $this->event->getInfoCountId();
        $this->data['events'] = $this->event->getAllAdmin();

        return  view('pages.admin.events.event', $this->data);
    }


    public function create()
    {
        return view('pages.admin.events.event_form_insert', $this->data);
    }

    public function store(EventRequest $request)
    {
        try {
            $this->event->title = $request->input('title');
            $this->event->description=  $request->input('description');
            $this->event->price = $request->input('price');

            $file = $request->file('picture');

            $directory = 'assets/img/events/';
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move($directory,$fileName);

            $pictureModel = new Picture();

            $pictureModel->src = 'assets/img/events/'. $fileName;
            $pictureModel->alt = "event picture";

            $this->event->id_picture = $pictureModel->create();

            $rez = $this->event->insert();

            if($rez)
                return redirect(route('SelectEvent'))->with('uspesno' ,'YOU HAVE SUCCESSFULLY ADDED EVENT');
                else
            return redirect(route('SelectEvent'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }
        catch(QueryException $e){
            Log::error("GRESKA PRI IZVRSAVANJU UPITA: " . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU FILEA : " . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch(Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }




    public function edit($id)
    {
        if ($id) {
            $this->event->id = $id;
            $this->data['oneEvent'] = $this->event->getOne();

            return view('pages.admin.events.event_form_edit',  $this->data);
        } else
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }

    public function update(EventEditRequest $request, $id)
    {
        try {
            $this->event->id = $id;
            $this->event->title = $request->input('title');
            $this->event->description = $request->input('description');
            $this->event->price = $request->input('price');

            $file = $request->file('picture');

            if($request->hasFile('picture')){


                $directory = public_path("assets/img/events/");
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                $pictureModel = new Picture();
                $pictureModel->src = "assets/img/events/" . $fileName;
                $pictureModel->alt = "picutre event";


                $this->event->id_picture = $pictureModel->create();

                $deletePicture = $this->event->getOne();
                File::delete($deletePicture->src);


            }else{
                $this->event->id_picture = $request->input('old_picture');
            }

            $rez = $this->event->edit();

            if($rez)
                return redirect(route('SelectEvent'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED EVENT');
            else
                return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GREKSA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GREKSA PRI UPLOADU FILE-A : " . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GREKSA  : " . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        try {
            if($id){

                $this->event->id = $id;
                $deletePicture = $this->event->getOne();

                $rez = $this->event->delete();

                if($rez){
                    File::delete($deletePicture->src);
                    return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED EVENT');
                }
                    else
                        return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }else
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e) {
            Log::error('GRESKA : ' . $e->getMessage());
            return redirect(route('SelectEvent'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }
}
