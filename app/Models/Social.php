<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Social extends Model
{
    protected $table = "socials";

    public $id;
    public $name;
    public $url;

    public function getAll(){
        return $rez =
            DB::table($this->table)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function getOne(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->first();
    }

    public function insert(){
        return $query =
            DB::table($this->table)
            ->insert([
               'name' => $this->name,
               'url' => $this->url
            ]);
    }

    public function edit(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->update([
                'name' => $this->name,
                'url' => $this->url,
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
