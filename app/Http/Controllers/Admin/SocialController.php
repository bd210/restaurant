<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SocialEditRequest;
use App\Http\Requests\SocialRequest;
use App\Models\Social;
use Illuminate\Support\Facades\Log;
use Exception;

class   SocialController extends AdminController
{

    private $social;

    public function __construct()
    {
        parent::__construct();
        $this->social = new Social();
    }

    public function index()
    {
        $this->data['socials'] = $this->social->getAll();

        return view('pages.admin.socials.social', $this->data);
    }

    public function create()
    {
        return view('pages.admin.socials.social_form_insert', $this->data);
    }


    public function store(SocialRequest $request)
    {
        try {
            $this->social->name = $request->input('name');
            $this->social->url = $request->input('url');

            $rez = $this->social->insert();

            if($rez)
                return redirect(route('SelectSocial'))->with('uspesno', 'YOU SUCCESSFULLY ADDED SOCIAL');

            else
               return redirect(route('SelectSocial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectSocial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function edit($id)
    {
        if($id){

            $this->social->id = $id;
            $this->data['oneSocial'] = $this->social->getOne();

              return view('pages.admin.socials.social_form_edit', $this->data);

        }else
            return redirect()->back()->with('neuspesno','AN ERROR HAS OCCURRED!');
    }


    public function update(SocialEditRequest $request, $id)
    {
        try {
            if($id){
                $this->social->id = $id;
                $this->social->name = $request->input('name');
                $this->social->url = $request->input('url');

                $rez = $this->social->edit();
                if($rez)
                    return redirect(route('SelectSocial'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED SOCIAL');
                else
                    return redirect(route('SelectSocial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!!');

            }else {
                return redirect(route('SelectSocial'))->with('neuspesno','AN ERROR HAS OCCURRED!');
            }

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectSocial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        try {
            if($id){

            $this->social->id = $id;
            $rez = $this->social->delete();

            if($rez)
                return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED SOCIAL');
            else
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }
         else {
             return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }
        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectSocial'))->with('neuspesno', 'DAN ERROR HAS OCCURRED!');
        }
    }
}
