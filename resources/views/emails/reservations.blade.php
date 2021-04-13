@component('mail::message')

<h1>Postovani, hvala Vam na rezervaciji</h1>

<p>Rezervacija na ime  : <b>{{$data['name'] }} </b> </p>
<p>Broj osoba : <b>{{$data['people'] }} </b></p>
<p>Datum rezervacije :<b> {{ date("F j, Y H:i", strtotime($data['date'] )) }} H </b> </p>

<p>Poruka rezervacije : <b>  {{ $data['message'] }}  </b></p>
@endcomponent
