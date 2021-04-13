@component('mail::message')

    <h1>Postovani, hvala Vam na kontaktiranju </h1>

  <p>Email :    <b>{{ $data['email'] }}       </b> </p>  <br/>
  <p>Subject :  <b> {{ $data['subject'] }}    </b> </p>  <br/>
  <p>Message :  <b>{{ $data['message'] }}     </b> </p>  <br/>

@endcomponent
