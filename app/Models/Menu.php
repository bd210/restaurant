<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menus';

    public $id;
    public $create_at;
    public $modified_at;
    public $name;
    public $description;
    public $price;
    public $id_menutype;
    public $id_picture;
    public $id_user;
    public $ip;
    public $numberPaginate = 10;

    public function getAll(){
        return $rez =
            DB::table($this->table)
            ->select('menus.*','menus.id as id_menu', 'pictures.*', 'menutypes.*')
            ->join('pictures', 'pictures.id', '=', 'menus.id_picture')
            ->join('menutypes', 'menutypes.id', '=', 'menus.id_menutypes')
            ->get();

    }
    public function getAllAdmin(){
        return $rez =
            DB::table($this->table)
                ->select('menus.*','menus.id as menuID', 'pictures.*', 'menutypes.*', 'users.*', 'menus.created_at as createdAt', 'menus.modified_at as modifiedAt')
                ->join('pictures', 'pictures.id', '=', 'menus.id_picture')
                ->join('menutypes', 'menutypes.id', '=', 'menus.id_menutypes')
                ->join('users', 'users.id', '=', 'menus.id_user')
                ->orderBy('menus.created_at', 'asc')
                ->paginate($this->numberPaginate);
    }
    public function getOne(){
        return $rez =
            DB::table($this->table)
                ->select('menus.*','menus.created_at as created' ,'menus.id as menuID', 'pictures.*', 'menutypes.*','users.id as userID','users.first_name', 'users.last_name',DB::raw("(SELECT count(id) FROM visits WHERE id_menu= $this->id) as visits"))
                ->join('pictures', 'pictures.id', '=', 'menus.id_picture')
                ->join('menutypes', 'menutypes.id', '=', 'menus.id_menutypes')
                ->join('users', 'users.id' , '=', 'menus.id_user')
                ->where('menus.id', '=', $this->id)
                ->first();

    }
    public function getOneAdmin(){
        return $rez =
            DB::table($this->table)
                ->select('menus.*', 'pictures.*', 'menutypes.*', 'menus.id as menuID')
                ->join('pictures', 'pictures.id', '=', 'menus.id_picture')
                ->join('menutypes', 'menutypes.id', '=', 'menus.id_menutypes')
                ->where('menus.id', '=', $this->id)
                ->first();
    }

    public function delete(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->delete();
        }

    public function insert(){
        return $query =
            DB::table($this->table)
            ->insertGetId([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'id_menutypes' => $this->id_menutype,
                'id_picture' => $this->id_picture,
                'id_user' => $this->id_user

            ]);
    }

        public function addVisit(){
        return $rez =
        DB::table('visits')
            ->insert([
                'id_menu' => $this->id,
                'ip' => $this->ip
            ]);
    }

    public function edit(){
        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'id_menutypes' => $this->id_menutype,
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
