<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuType extends Model
{
    protected $table = "menutypes";

    public $id;
    public $type;

    public function getAll(){
        return $query =
            DB::table($this->table)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function getOne(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id )
            ->first();
    }

    public function insert(){
        return $query =
            DB::table($this->table)
            ->insert([
                'type' => $this->type
            ]);
    }

    public function edit(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id )
            ->update([
                'type' => $this->type,
                'modified_at' => date("Y-m-d H:i:s")
            ]);
    }
    public function delete(){
        return $query =
            DB::table($this->table)
                ->where('id', $this->id )
                ->delete();
    }


}
