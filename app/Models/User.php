<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'users';

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $IdRole;
    public $src;
    public $alt;
    public $search;

    public $numberPaginate = 10;

   public function create(){
        return $query =
            DB::table($this->table)
                ->insertGetId([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'password' => md5($this->password),
                    'src' => $this->src,
                    'alt' => "user picture",
                    'id_role' => 2,
                       ]);
    }

    public function createAdmin(){
        return $query =
            DB::table($this->table)
                ->insertGetId([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'password' => md5($this->password),
                    'src' => $this->src,
                    'alt' => "user picture",
                    'id_role' => $this->IdRole,

                ]);
    }




    public function login(){
       return $query =
           DB::table($this->table)
           ->select('users.*','users.id as idUser', 'roles.name as roleName')
           ->join('roles', 'roles.id', '=', 'users.id_role')
           ->where([

               'email' => $this->email,
               'password' => md5($this->password)
           ])
           ->first();
    }
    public function getOne(){
         return $query =
            DB::table($this->table)
            ->select('users.*', 'roles.id as roleID','roles.name', 'users.id as userID')
            ->join('roles', 'roles.id', '=', 'users.id_role')
            ->where('users.id', $this->id)
            ->first();
    }


    public function getAll(){
        return $query =
            DB::table($this->table)
                ->select('users.id as userID','users.*', 'roles.*' ,'users.created_at as createdAt' , 'users.modified_at as modifiedAt')
                ->join('roles', 'roles.id', '=', 'users.id_role')
                ->orderBy('users.created_at','asc')
                ->paginate($this->numberPaginate);
    }

    public function delete(){

       return $query =
           DB::table($this->table)
           ->where('id', $this->id)
           ->delete();
    }

    public function edit(){
       $data = [
           'first_name' => $this->first_name,
           'last_name' => $this->last_name,
           'email' => $this->email,
           'src' => $this->src,
           'alt' => "user picture",
           'id_role' => $this->IdRole,
           'modified_at' => date("Y-m-d H:i:s")
             ];


      return $query =
           DB::table($this->table)
           ->where('id', $this->id)
           ->update($data);
    }

    public function resetPassword(){
       return $query =
           DB::table($this->table)
           ->where('id', $this->id)
           ->update([
               'password' => md5($this->password)
           ]);
    }

    public function FindUserWithEmail(){
       return $query =
           DB::table($this->table)
           ->where('email',$this->email)
           ->first();
    }

    public function search(){
       return $query =
           DB::table($this->table)
           ->select('users.id as userID','users.*', 'roles.*', 'users.created_at as createdAt' , 'users.modified_at as modifiedAt')
           ->join('roles', 'roles.id', '=', 'users.id_role')
           ->where('users.first_name' , 'like', '%' . $this->search . '%')
           ->orWhere('users.last_name' , 'like', '%' . $this->search . '%')
           ->orWhere('users.email' , 'like', '%' . $this->search . '%')
           ->get();
    }

    public function getInfoCountID(){
        return $query =
            DB::table($this->table)
            ->select(DB::raw('count(id) as countID'))
            ->get();
    }



}
