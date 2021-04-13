<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserAdminEditRequest;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\UserAdminResetPasswordRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Log;
use Exception;


class UserAdminController extends AdminController
{

    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();

        $roleModel = new Role();
        $this->data['roles'] = $roleModel->getAll();
    }


    public function index()
    {
        $this->data['info'] = $this->user->getInfoCountID();
        $this->data['users'] = $this->user->getAll();

        return  view('pages.admin.users.user', $this->data);
    }

    public function create()
    {
         return  view('pages.admin.users.user_form_insert', $this->data);
    }


    public function store(UserAdminRequest $request)
    {
        try {

            $file = $request->file('img');

            $this->user->IdRole = $request->input('role');
            $this->user->first_name = $request->input('first_name');
            $this->user->last_name = $request->input('last_name');
            $this->user->email = $request->input('email');
            $this->user->password = $request->input('password');


            if($request->hasFile('img')){

               $directory = public_path('assets/img/users/');
               $fileName = time()."_". $file->getClientOriginalName();
               $file->move($directory,$fileName);

               $this->user->src = "assets/img/users/". $fileName;

             }

            $rez = $this->user->createAdmin();
            if($rez){
                return redirect(route('SelectUser'))->with('uspesno', 'YOU HAVE SUCCESSFULLY ADDED USER');
            }else{
                return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU : " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU : " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function edit($id)
    {
        if($id){

            $this->user->id = $id;
            $this->data['oneUser'] = $this->user->getOne();

                return view('pages.admin.users.user_form_edit', $this->data);

        }else

        return  redirect(route('SelectUser'))->with('neuspesno', 'USER DOES NOT EXIST');
    }

    public function update(UserAdminEditRequest $request ,$id)
    {
        try {
            $this->user->id = $id;
            $this->user->first_name = $request->input('first_name');
            $this->user->last_name =  $request->input('last_name');
            $this->user->email =  $request->input('email');

            $this->user->IdRole = $request->input('role');



            $file = $request->file('picture');

            if($request->hasFile('picture')){

                $directory = public_path('assets/img/users/');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory,$fileName);

                $this->user->src = 'assets/img/users/' . $fileName;

                $deletePicture = $this->user->getOne();
                File::delete($deletePicture->src);

               }
            else {

                $this->user->src = $request->input('old_picture');
                 }

            $rez = $this->user->edit();

            if($rez)
                return  redirect(route('SelectUser'))->with('uspesno' , 'YOU HAVE SUCCESSFULLY UPDATED USER');
            else
                return redirect(route('SelectUser'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }
        catch (QueryException $e){
            Log::error("GRESKA PRI UPITU: " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (FileException $e){
            Log::error("GRESKA PRI UPLOADU FILE0A: " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }

    }

    public function destroy($id)
    {
        try {
            if($id){

                $this->user->id = $id;
                $deletePicture = $this->user->getOne();

                  $rez = $this->user->delete();

                if($rez){
                    File::delete($deletePicture->src);
                    return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED USER');
                }else{

                    return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
                }

            }else
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectUser'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }

    public function resetPassword(UserAdminResetPasswordRequest $request, $id){

        $this->user->id = $id;
        $this->user->password = $request->input('password');

        $rez = $this->user->resetPassword();

        if($rez)
            return redirect(route('SelectUser'))->with('uspesno', 'PASSWORD SUCCESSFULLY UPDATED');
        else
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');

    }

    public function search(){

        $this->user->search = $_GET['search'];
        $this->data['userSearch'] = $this->user->search();

        return view('pages.admin.users.user', $this->data);
    }
}
