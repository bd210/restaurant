<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class About extends Model
{
  protected  $table = 'about';
  public $id;
  public $title;
  public $description;
  public $id_picture;

  public function getAbout(){
      return $rez =
          DB::table($this->table)
          ->select('about.*', 'pictures.*','about.created_at as createdAt', 'about.modified_at as modifiedAt')
          ->join('pictures', 'pictures.id', '=', 'about.id_picture')
          ->where('about.id', '=', 1)
          ->first();
  }

    public function edit(){
      return $query =
          DB::table($this->table)
          ->where('id','=', 1)
          ->update([
              'title' => $this->title,
              'description' => $this->description,
              'id_picture' => $this->id_picture,
              'modified_at' => date("Y-m-d H:i:s")
          ]);
    }

}
