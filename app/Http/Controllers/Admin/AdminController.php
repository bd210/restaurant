<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    protected $data = [];
    private $user;

    public function __construct()
    {
        $this->data['number'] = 1;

        $this->user = new User();

 }

    public function admin(){
        $this->user->id = session()->get('user')->id;
        $this->data['userInfo'] = $this->user->getOne();

        return view('pages.adminHome', $this->data);
    }


}
