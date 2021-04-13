<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestimonialsRequest;
use App\Models\Testimonials;
use Illuminate\Support\Facades\Log;
use Exception;

class TestimonialController extends AdminController
{

    private $testimonial;

    public function __construct()
    {
        parent::__construct();
       $this->testimonial = new Testimonials();
    }

    public function index()
    {
        $this->data['info'] = $this->testimonial->getInfoCoutnId();
        $this->data['testimonials'] = $this->testimonial->getAll2();

        return view('pages.admin.testimonials.testimonial', $this->data);
    }

    public function create()
    {
        return view('pages.admin.testimonials.testimonial_form_insert', $this->data);
    }


    public function store(TestimonialsRequest $request)
    {
        try {

        $this->testimonial->content = $request->input('content');
        $this->testimonial->id_user = session()->get('user')->id;

        $rez = $this->testimonial->insert();
            if ($rez) {

                return redirect(route('SelectTestimonial'))->with('uspesno', 'YOU HAVE SUCCESSFULLY ADDED TESTIMONIAL');
            } else {
                return redirect(route('SelectTestimonial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
            }

        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectTestimonial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function edit($id)
    {
        if($id){

            $this->testimonial->id = $id;
            $this->data['oneTestimonial'] = $this->testimonial->getOne();

            return view('pages.admin.testimonials.testimonial_form_edit', $this->data);

        }else
            return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
    }


    public function update(TestimonialsRequest $request, $id)
    {
        try {
            if($id){
            $this->testimonial->id = $id;
            $this->testimonial->content = $request->input('content');

            $rez = $this->testimonial->edit();

                if ($rez) {

                    return redirect(route('SelectTestimonial'))->with('uspesno', 'YOU HAVE SUCCESSFULLY UPDATED TESTIMONIAL');
                } else {
                    return redirect(route('SelectTestimonial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
                }

            }
            else
                return redirect(route('SelectTestimonial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');

        }catch (Exception $e){
            Log::error("GRESKA :" . $e->getMessage());
            return redirect(route('SelectTestimonial'))->with('neuspesno', 'AN ERROR HAS OCCURRED!');
        }
    }


    public function destroy($id)
    {
        try {
            if($id) {
                $this->testimonial->id = $id;
                $rez = $this->testimonial->delete();

                if($rez){

                    return redirect()->back()->with('uspesno', 'YOU HAVE SUCCESSFULLY DELETED TESTIMONIAL');
                } else {
                    return redirect()->back()->with('neuspesno', 'AN ERROR HAS OCCURRED!');
                }
            } else
                return redirect()->back()->with('neuspesno' , 'AN ERROR HAS OCCURRED!');
        }catch (Exception $e){
            Log::error("GRESKA : " . $e->getMessage());
            return redirect(route('SelectTestimonial'))->with('neuspesno', 'DOSLO JE DO GRESKE!');
        }
    }
}
