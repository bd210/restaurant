<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
{
   protected  $table = 'details';

   public $id;
   public $name;
   public $location;
   public $email;
   public $phone;
   public $open_hours;

   public function get(){
       return $rez =
           DB::table($this->table)
           ->where('id', '=', 1)
           ->first();
   }

   public function edit(){
       return $query =
           DB::table($this->table)
           ->where('id','=', 1)
           ->update([
              'location' => $this->location,
               'name' => $this->name,
               'email' => $this->email,
               'phone'=> $this->phone,
               'open_hours' => $this->open_hours,
               'modified_at' => date("Y-m-d H:i:s")
           ]);
   }
}
