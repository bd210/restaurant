<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    protected $table = 'users';

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $id_role;

    public function login(){
        return $query =
            DB::table($this->table)
                ->select('users.*', 'roles.*')
                ->join('roles', 'roles.id', '=', 'users.id_role')
                ->where([
                    'email' => $this->email,
                    'password' => md5($this->password)
                ])
                ->first();

    }
}
