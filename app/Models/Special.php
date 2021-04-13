<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Special extends Model
{
    protected $table = 'specials';

    public $id;
    public $name;
    public $title;
    public $description;
    public $tab;
    public $id_picture;
    public $created_at;
    public $modified_at;
    public $numberPagination = 10;

    public function getAll(){
        return $rez =
            DB::table($this->table)
            ->select('pictures.*', 'specials.*', 'specials.id as specialID', 'specials.created_at as created', 'specials.modified_at as modified')
            ->join('pictures', 'pictures.id', '=', 'specials.id_picture')
            ->orderBy('specials.created_at', 'asc')
            ->get();

    }
    public function getAllAdmin(){
        return $rez =
            DB::table($this->table)
                ->select('pictures.*', 'specials.*', 'specials.id as specialID', 'specials.created_at as created', 'specials.modified_at as modified')
                ->join('pictures', 'pictures.id', '=', 'specials.id_picture')
                ->orderBy('specials.created_at', 'asc')
                ->paginate($this->numberPagination);
    }
    public function getOne(){
        return $rez =
            DB::table($this->table)
                ->select('pictures.*', 'specials.*', 'specials.id as specialID', 'specials.created_at as created', 'specials.modified_at as modified')
                ->join('pictures', 'pictures.id', '=', 'specials.id_picture')
                ->where('specials.id', $this->id)
                ->first();
    }
    public function insert(){
        return $query =
            DB::table($this->table)
            ->insert([
                'name' => $this->name,
                'title' => $this->title,
                'description' => $this->description,
                'tab' => $this->tab ,
                'id_picture' => $this->id_picture

            ]);
    }

    public function delete(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->delete();
    }

    public function edit(){
        $data = [
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'id_picture' => $this->id_picture,
            'modified_at' => date("Y-m-d H:i:s")

        ];

        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->update($data);
    }

    public function getInfoCountId(){
        return $query =
            DB::table($this->table)
            ->select(DB::raw("count(id) as countID"))
            ->get();
    }
}
