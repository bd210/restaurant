<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class LocationController extends AdminController
{

    private $location;
    public function __construct()
    {
        parent::__construct();

        $this->location = new Location();
        $this->data['getLocation'] = $this->location->getLocation();
    }

    public function index(){

        return view('pages.admin.location.location', $this->data);
  }

    public function edit(){

       return view('pages.admin.location.location_form_edit' , $this->data);
    }
    public function update(Request  $request){
        try {

            $this->location->location = $request->input('location');

            $rez = $this->location->edit();

            if($rez)
                return  redirect(route('SelectLocation'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED LOCATION');
            else
                return  redirect(route('SelectLocation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectLocation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectLocation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }

}
