<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    protected $table = 'roles';

    public $id;
    public $name;

    public function getAll(){
        return $query =
            DB::table($this->table)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function delete(){
        return $query =
            DB::table($this->table)
            ->where([
                'id' => $this->id
            ])
            ->delete();
    }
    public function create(){
        return $query =
            DB::table($this->table)
            ->insert([
                'name' => $this->name

            ]);
    }
    public function getOne(){
        return $query =
            DB::table($this->table)
            ->where('id',$this->id)
            ->first();
    }
    public function edit(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->update([
               'name' => $this->name,
                'modified_at' => date("Y-m-d H:i:s")
            ]);
    }
}
