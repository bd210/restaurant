<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DetailRequest;
use App\Models\Detail;
use Illuminate\Support\Facades\Log;
use Exception;

class DetailController extends AdminController
{


     private $detail;

    public function __construct()
    {
        parent::__construct();
        $this->detail = new Detail();
        $this->data['detail'] = $this->detail->get();
    }


    public function index()
    {
        return  view('pages.admin.details.detail', $this->data);
    }

   public function edit()
    {

        return  view('pages.admin.details.detail_form_edit', $this->data);
    }


    public function update(DetailRequest $request)
    {
        try {
            $this->detail->name = $request->input('name');
            $this->detail->location = $request->input('location');
            $this->detail->email = $request->input('email');
            $this->detail->phone = $request->input('phone');
            $this->detail->open_hours = $request->input('open_hours');

            $rez = $this->detail->edit();

            if($rez)
                return redirect(route('SelectDetail'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED DETAILS');

            else
                return  redirect(route('SelectDetail'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectDetail'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


}
