<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\TestimonialsRequest;
use App\Mail\ContactFormMail;
use App\Mail\ReservationsMail;
use App\Models\About;
use App\Models\Chef;
use App\Models\Detail;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\Reservation;
use App\Models\Social;
use App\Models\Special;
use App\Models\Comment;
use App\Models\Testimonials;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Exception;

class FrontController extends Controller
{
    protected $data = [];


    public function __construct()
    {
        $socials = new Social();
        $this->data['socials'] = $socials->getAll();

        $chefs = new Chef();
        $this->data['chefs'] = $chefs->getAll();

        $gallery = new Gallery();
        $this->data['gallery'] = $gallery->getAll();

        $menu = new Menu();
        $this->data['menus'] = $menu->getAll();

        $events = new Event();
        $this->data['events'] = $events->getAll();

        $details = new Detail();
        $this->data['detail'] = $details->get();

        $specials = new Special();
        $this->data['specials'] = $specials->getAll();

        $about = new About();
        $this->data['about'] = $about->getAbout();

        $testimonialsModel= new Testimonials();
        $this->data['testimonials'] = $testimonialsModel->getAll();

        $menuTypes = new MenuType();
        $this->data['menuTypes'] = $menuTypes->getAll();

        $location = new Location();
        $this->data['location'] = $location->getLocation();

        $video = new Video();
        $this->data['video'] = $video->getVideo();

    }

    public function index(){

        return view('pages.home', $this->data);

    }


    public function contact(ContactRequest $request){

        try {

            Mail::to('boris.dmitrovic.17.09@gmail.com')->send(new ContactFormMail($request));

            return redirect('/')->with('uspesno', 'YOU HAVE SUCCESSFULLY CONTACTED US!');


        }catch (Exception $e){
            Log::error("GRESKA : " .$e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');

        }
    }

    public function insertTestimonials(TestimonialsRequest $request){

          try {
            $testimonialsModel = new Testimonials();
            $testimonialsModel->content = $request->input('content');
            $testimonialsModel->id_user = session()->get('user')->id;

           $rez = $testimonialsModel->insert();

            if($rez){
                return redirect('/')->with('uspesno', 'YOU HAVE SUCCESSFULLY COMMENTED!');
            }else{
                return redirect('/')->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED');
          }

    }

    public function singleMenu(Request $request,$id){

        $comment = new Comment();
        $comment->idMenu = $id;
        $this->data['comments'] = $comment->getMenuComments();

       $commInfo = new Comment();
       $commInfo->idMenu = $id;
       $this->data['commInfo'] = $commInfo->getInfoCountId();

        $menu = new Menu();
        $menu->id = $id;
        $menu->ip = $request->ip();
        $menu->addVisit();
        $this->data['singleMenu'] = $menu->getOne();



        return view('pages.single', $this->data);
    }



    public function insertReservations(ReservationRequest $request){

        try {

            $reservationModel = new Reservation();

            $reservationModel->name = $request->input('name');
            $reservationModel->email =$request->input('email');
            $reservationModel->phone = $request->input('phone');
            $reservationModel->date = $request->input('date');
            $reservationModel->number_of_people = $request->input('people');
            $reservationModel->message = $request->input('message');


            $rez = $reservationModel->insert();

            Mail::to($reservationModel->email)->send( new ReservationsMail($request));


            if($rez)
                return redirect('/')->with('uspesno', 'SUCCESSFUL RESERVATION!');

            else
               return redirect('/')->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }
        catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('/'))->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
        }

      }



}

