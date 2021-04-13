<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Location extends Model
{
    protected $table = 'locations';

    public $id;
    public $location;

    public function getLocation(){
        return $query =
        DB::table($this->table)
            ->where('id', '=', 1)
            ->first();
    }

    public function edit(){

        return $query =
        DB::table($this->table)
            ->where('id', '=', 1)
            ->update([
                'location' => $this->location,
                'modified_at' => date("Y-m-d H:i:s")
            ]);

    }
}
