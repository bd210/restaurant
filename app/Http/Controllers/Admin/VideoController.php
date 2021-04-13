<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Exception;
class VideoController extends AdminController
{
    private $video;

    public function __construct()
    {
        parent::__construct();
        $this->video = new Video();
        $this->data['getVideo'] = $this->video->getVideo();
    }

    public function index(){


        return view('pages.admin.video.video' ,$this->data);
    }

    public function edit(){

        return view('pages.admin.video.video_form_edit' ,$this->data);

    }
    public function update(VideoRequest $request){

        try {

            $this->video->link = $request->input('link');

            $rez = $this->video->edit();

            if($rez)
                return  redirect(route('SelectVideo'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED VIDEO');
            else
                return  redirect(route('SelectVideo'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectVideo'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectVideo'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }

}
