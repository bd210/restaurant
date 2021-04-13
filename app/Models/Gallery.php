<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{

    protected $table = 'gallery';

    public $id;
    public $id_picture;
    public $numberPagination = 5;

    public function getAll(){
        return $rez =
          DB::table($this->table)
          ->select('gallery.*', 'pictures.*')
          ->join('pictures', 'pictures.id', '=', 'gallery.id_picture')
          ->get();

    }
    public function getAllAdmin(){
        return $rez =
            DB::table($this->table)
                ->select('gallery.*', 'pictures.*', 'gallery.id as galleryID', 'gallery.created_at as createdAt','gallery.modified_at as modifiedAt')
                ->join('pictures', 'pictures.id', '=', 'gallery.id_picture')
                ->orderBy('gallery.created_at', 'asc')
                ->paginate($this->numberPagination);
    }
    public function getOne(){
        return $rez =
            DB::table($this->table)
                ->select('gallery.*', 'pictures.*', 'gallery.id as galleryID')
                ->join('pictures', 'pictures.id', '=', 'gallery.id_picture')
                ->where('gallery.id', $this->id)
                ->first();
    }

    public function insert(){
        return $rez =
            DB::table($this->table)
            ->insertGetId([
                'id_picture' => $this->id_picture
            ]);
    }

    public function delete(){
        return $rez =
            DB::table($this->table)
                ->where('id', $this->id)
                ->delete();
    }

    public function edit(){
        return $query =
            DB::table($this->table)
            ->where('id' , $this->id)
            ->update([
                'id_picture' => $this->id_picture,
                'modified_at' => date("Y-m-d H:i:s")
            ]);
    }

    public function getInfo(){
              return $rez =
            DB::table($this->table)
            ->select(DB::raw('count(id) as countID'))
            ->get();
    }

}
