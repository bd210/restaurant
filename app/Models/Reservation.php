<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    protected $table = 'reservations';

    public $id;
    public $created_at;
    public $name;
    public $email;
    public $phone;
    public $date;
    public $number_of_people;
    public $message;
    public $numberPaginate = 10;

    public function insert(){

        return $query =
                DB::table($this->table)
                ->insert([
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'date' => $this->date ,
                    'number_of_people' => $this->number_of_people,
                    'message' => $this->message,


                ]);
    }

    public function getAll(){
        return $query =
            DB::table($this->table)
            ->paginate($this->numberPaginate);
    }

    public function getOne(){
        return $query =
            DB::table($this->table)
            ->where('id', $this->id)
            ->first();
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
            'email' => $this->email,
            'phone' => $this->phone,
            'number_of_people' => $this->number_of_people,
            'message' => $this->message,
            'modified_at' => date("Y-m-d H:i:s")
        ];
        if(!empty($this->date)){
            $data['date'] = $this->date;
        }

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
