<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ReservationController extends AdminController
{

    private $reservation;

    public function __construct()
    {
        parent::__construct();

        $this->reservation = new Reservation();
    }


    public function index()
    {
        $this->data['info']= $this->reservation->getInfoCountId();
       $this->data['reservations']= $this->reservation->getAll();
        return view('pages.admin.reservations.reservation', $this->data);
    }


    public function create()
    {
        return view('pages.admin.reservations.reservation_form_insert', $this->data);
    }


    public function store(ReservationRequest $request)
    {
        try {
            $this->reservation->name = $request->input('name');
            $this->reservation->email =$request->input('email');
            $this->reservation->phone = $request->input('phone');
            $this->reservation->date = $request->input('date');
            $this->reservation->number_of_people = $request->input('people');
            $this->reservation->message = $request->input('message');

            $rez = $this->reservation->insert();

            if($rez)
                return redirect(route('SelectReservation'))->with('uspesno', 'YOU HAVE SUCCESSFULLY ADDED RESERVATION');

            else
              return  redirect(route('SelectReservation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectReservation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }

    }




    public function edit($id)
    {
        if($id){
            $this->reservation->id = $id;
            $this->data['oneReservation'] =$this->reservation->getOne();

            return view('pages.admin.reservations.reservation_form_edit', $this->data);
        }else{
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function update(Request $request, $id)
    {
        try {

            if($id){
                $this->reservation->id = $id;

                $this->reservation->name = $request->input('name');
                $this->reservation->email =$request->input('email');
                $this->reservation->phone = $request->input('phone');

                $this->reservation->number_of_people = $request->input('people');
                $this->reservation->message = $request->input('message');


                if($request->hasAny('date')){
                      $this->reservation->date = $request->input('date');
                }else{
                    $this->reservation->date = date_format($request->input('old_date'), "Y-m-d H:i:s");
                }

                $rez = $this->reservation->edit();
                if($rez)
                    return redirect(route('SelectReservation'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED RESERVATION');

                else
                    return redirect(route('SelectReservation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

            }else{
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectReservation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }

    public function destroy($id)
    {
        try {
            if($id){
                $this->reservation->id = $id;
                $this->reservation->delete();

                return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED RESERVATION');
            }
            else{
                return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }

        }catch (Exception $e)
        {
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectReservation'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }
}
