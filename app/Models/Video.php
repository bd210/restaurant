<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    protected $table = 'videos';

    public $id;
    public $modifiedAt;
    public $link;

    public function getVideo(){
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
                    'link' => $this->link,
                    'modified_at' => date("Y-m-d H:i:s")
                ]);
    }
}
