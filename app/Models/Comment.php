<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'comments';

    public $id;
    public $createAt;
    public $modifiedAt;
    public $content;
    public $idMenu;
    public $idUser;

    public function getMenuComments(){
        return $query =
            DB::table($this->table)
            ->select('comments.*', 'users.*', 'users.id as userID', 'comments.created_at as created','comments.modified_at as modified' ,'comments.id as commID')
            ->join('users', 'users.id', '=' , 'comments.id_user')
            ->where('comments.id_menu', '=', $this->idMenu)
            ->get();
    }
    public function getOne(){
        return $query =
        DB::table($this->table)
            ->select('comments.*', 'users.*', 'users.id as userID', 'comments.created_at as created',  'comments.id as commID')
            ->join('users', 'users.id', '=' , 'comments.id_user')
            ->where('comments.id', '=', $this->id)
            ->first();
    }
    public function getInfoCountId(){
        return $query =
        DB::table($this->table)
            ->select(DB::raw("count(id) as countID"))
            ->where('id_menu', $this->idMenu)
            ->get();
    }

    public function insert(){

        return $query =
            DB::table($this->table)
            ->insert([
                'content' => $this->content,
                'id_user' => $this->idUser,
                'id_menu' => $this->idMenu

            ]);
    }
    public function edit(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->update([
                'content' => $this->content,
                'modified_at' => date("Y-m-d H:i:s")
            ]);
    }
    public function delete(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->delete();
    }
}
