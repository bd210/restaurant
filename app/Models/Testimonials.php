<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testimonials extends Model
{
    protected $table = 'testimonials';

    public $id;
    public $content;
    public $id_user;
    public $numberPaginate = 10;

    public function getAll(){
        return $query =
            DB::table($this->table)
            ->select('users.*', 'testimonials.*')
            ->join('users', 'users.id', '=','testimonials.id_user')
            ->get();
    }

    public function insert(){
        return $query =
            DB::table($this->table)
            ->insert([
               'content' => $this->content,
               'id_user' => $this->id_user

            ]);
    }
    public function getOne(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->first();
    }

    public function delete(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->delete();
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

    public function getAll2(){
        return $query =
            DB::table($this->table)
                ->select('testimonials.*', 'users.first_name', 'users.last_name', 'users.email', 'testimonials.created_at as createdAt' ,'testimonials.modified_at as modifiedAt')
                ->join('users', 'users.id', '=','testimonials.id_user')
                ->orderBy('created_at', 'asc')
                ->paginate($this->numberPaginate);
    }

    public function getInfoCoutnId(){
        return $query =
            DB::table($this->table)
            ->select(DB::raw('count(id) as countID'))
            ->get();
    }
}
