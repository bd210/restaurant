<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Picture extends Model
{
    protected $table = 'pictures';

    public $id;
    public $src;
    public $alt;
    public $created_at;


    public function create(){
        return $query =
        DB::table($this->table)
            ->insertGetId([
                'src' => $this->src,
                'alt' => $this->alt,
                'created_at' => $this->created_at

            ]);
    }
}
