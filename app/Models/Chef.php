<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chef extends Model
{
   public $id;
   public $created_at;
   public $modified_at;
   public $name;
   public $workplace;
   public $id_picture;

   protected $table = 'chefs';

   public function getAll(){
       return $query =
           DB::table($this->table)
           ->select('chefs.*', 'pictures.*','chefs.id as chefID','chefs.created_at as created' , 'chefs.modified_at as modified')
           ->join('pictures', 'pictures.id', '=', 'chefs.id_picture')
           ->orderBy('chefs.created_at', 'asc')
           ->get();

   }
   public function getOne(){
       return $query =
           DB::table($this->table)
               ->select('chefs.*', 'pictures.*','chefs.id as chefID')
               ->join('pictures', 'pictures.id', '=', 'chefs.id_picture')
               ->where('chefs.id',$this->id)
               ->first();
   }

   public function insert(){
       return $query =
           DB::table($this->table)
           ->insert([
               'name' => $this->name,
               'workplace' => $this->workplace,
               'id_picture' => $this->id_picture,
               'created_at' => date("Y-m-d H:i:s")
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
           'workplace' => $this->workplace,
           'id_picture' => $this->id_picture,
           'modified_at' => date("Y-m-d H:i:s")
       ];
           return $query =
               DB::table($this->table)
               ->where('id', $this->id)
               ->update($data);
       }
}
