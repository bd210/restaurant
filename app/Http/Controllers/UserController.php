<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\KorisnikRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UserFrontEditRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\File;

class UserController extends FrontController
{
    protected $data = [];
    private $user;
    private $comment;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
        $this->comment = new Comment();
    }

    public function showCreateForm(){


        return view('pages.korisnik', $this->data);
    }

    public function profile($id){

        try {


            $this->user->id = $id;
            $this->data['userProfile'] = $this->user->getOne();

            return view('pages.userProfileDetail', $this->data);

        }catch (Exception $e){

            Log::error('GRESKA : ' . $e->getMessage());
            return redirect('/')->with('neuspesno' , 'USER DOES NOT EXIST');
        }



    }


    public function selectData(){
        try {


            $this->user->id = session()->get('user')->id;
            $this->data['oneUser'] = $this->user->getOne();
        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());

        }

          return view('pages.userData', $this->data);
    }
    public function showResetPassword($id){

        if($id){
            $this->user->id = $id;
            $this->data['resetPassword'] = $this->user->getOne();
        }
        else
            return redirect()->back()->with('neuspesno', 'USER DOES NOT EXIST');

        return view('pages.userData',$this->data);
    }

    public function resetPassword(ResetPasswordRequest $request, $id){

      $currentUser = session()->get('user');
    $this->user = new User();
    $this->user->id = $id;
    if((md5($request->input('currentPassword')) == $currentUser->password)){

        $this->user->password = $request->input('password');

        $rez = $this->user->resetPassword();

        if($rez)
            return  redirect()->back()->with('uspesno','PASSWORD SUCCESSFULLY UPDATED');

        else
            return redirect()->back()->with('neuspesno', 'CURRENT PASSWORD DOES NOT MATCHED');
    }else
        return redirect()->back()->with('neuspesno', 'CURRENT PASSWORD DOES NOT MATCHED');

    }

    public function updateData(UserFrontEditRequest $request){
        try {
            $this->user->id = session()->get('user')->id;
            $this->user->first_name = $request->input('first_name');
            $this->user->last_name =  $request->input('last_name');
            $this->user->email =  $request->input('email');
            $this->user->IdRole = 2;

            $file = $request->file('picture');

            if($request->hasFile('picture')){

                $directory = public_path('assets/img/users/');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move($directory,$fileName);


                $this->user->src = 'assets/img/users/' . $fileName;

                  $deletePicture = $this->user->getOne();
                   File::delete($deletePicture->src);


            }else {
                $this->user->src = $request->input('old_picture');
            }

            $rez = $this->user->edit();

            if($rez)
                return  redirect(route('SelectData'))->with('uspesnaIzmenaPodataka' , 'YOU HAVE SUCCESSFULLY UPDATED YOUR DATA');
            else
                return redirect(route('SelectData'))->with('neuspesnaIzmenaPodataka' , 'AN ERROR HAS OCCURRED!');

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


    public function create(KorisnikRequest $request){

        try {

            $file = $request->file('picture');

            $this->user->first_name = $request->input('first_name');
            $this->user->last_name = $request->input('last_name');
            $this->user->email = $request->input('email');
            $this->user->password = $request->input('password');

               if($request->hasFile('picture')){

                $directory =public_path('assets/img/users/');
                $fileName =time() . "_" . $file->getClientOriginalName();
                $file->move($directory, $fileName);

                   $this->user->src = 'assets/img/users/'. $fileName;

            }
            $rez = $this->user->create();
              if($rez){
                return redirect(route('ShowLoginForm'))->with('uspesno', 'YOU HAVE SUCCESSFULLY REGISTERED!');
            }else{
                return redirect()->back()->with('neuspesnaRegistracija', 'AN ERROR HAS OCCURRED!');
            }

        }catch(QueryException $e){
            Log::error('GRESKA PRI UPISU U BAZU : ' . $e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
        }
        catch(FileException $e){
           Log::error('GRESKA PRI UPLOADU SLIKE : ' . $e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
        }
        catch(Exception $e){
            Log::error('DOSLO JE DO BAZNE GRESKE : ' .$e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED');
        }


    }

    public function comment(CommentRequest $request, $menuId){
        try {

            $this->comment->content = $request->input('comment');
            $this->comment->idUser = session()->get('user')->id;
            $this->comment->idMenu = $menuId;

            $rez = $this->comment->insert();
            if($rez)
                return  redirect()->back()->with('uspesno' , 'YOU HAVE SUCCESSFULLY COMMENTED');
            else
                return redirect()->back()->with('neuspesno' ,'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error('GRESKA : ' . $e->getMessage());
            return redirect('/')->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }

    }
    public function deleteComment($id){

        if($id){

            $this->comment->id = $id;

            $rez = $this->comment->delete();

            if($rez)
                return  redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED COMMENT');
            else
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }else
        return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }

    public function showComment($id){
       if($id){
           $this->comment->id = $id;
           $this->data['comment'] = $this->comment->getOne();
           return view('pages.editComment', $this->data);
       }
       else
           return redirect()->back()->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
    }

    public function editComment(CommentRequest  $request, $id){
        if($id){
        $this->comment->id = $id;
        $this->comment->content = $request->input('comment');

        $rez = $this->comment->edit();
        if($rez)
            return redirect('/')->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED COMMENT');
            else
                return redirect('/')->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        else
            return redirect('/')->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }

}
