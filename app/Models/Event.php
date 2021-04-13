<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $table = 'events';

    public $id;
    public $title;
    public $description;
    public $price;
    public $id_picture;
    public $created_at;
    public $modified_at;
    public $numberPaginate = 10;

    public function getAll(){
        return $rez =
            DB::table($this->table)
            ->select('events.*', 'pictures.*', 'events.id as eventID','events.created_at as created','events.modified_at as modified' )
            ->join('pictures', 'pictures.id', '=', 'events.id_picture')
            ->orderBy('events.created_at', 'asc')
            ->get();
    }
    public function getAllAdmin(){
        return $rez =
            DB::table($this->table)
                ->select('events.*', 'pictures.*', 'events.id as eventID','events.created_at as created','events.modified_at as modified' )
                ->join('pictures', 'pictures.id', '=', 'events.id_picture')
                ->orderBy('events.created_at', 'asc')
                ->paginate($this->numberPaginate);
    }

    public function getOne(){
        return $query =
            DB::table($this->table)
                ->select('events.*', 'pictures.*', 'events.id as eventID' )
                ->join('pictures', 'pictures.id', '=', 'events.id_picture')
                ->where('events.id', $this->id)
                ->first();
    }
    public function insert(){
        return $query =
        DB::table($this->table)
            ->insertGetId([
               'title' => $this->title,
               'description' => $this->description,
                'price' => $this->price,
                'id_picture' => $this->id_picture
            ]);
    }
    public function delete(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->delete();
    }
    public function getInfoCountId(){
        return $query =
            DB::table($this->table)
            ->select(DB::raw("count(id) as countID"))
            ->get();
    }
    public function edit(){
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'modified_at' => date("Y-m-d H:i:s"),
            'id_picture' => $this->id_picture

         ];

        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->update($data);
    }
}
