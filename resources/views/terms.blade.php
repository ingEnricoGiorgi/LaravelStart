@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                È universalmente riconosciuto che un lettore che osserva il layout di una pagina viene distratto dal
                contenuto testuale se questo è leggibile. Lo scopo dell’utilizzo del Lorem Ipsum è che offre una normale
                distribuzione delle lettere (al contrario di quanto avviene se si utilizzano brevi frasi ripetute, ad
                esempio “testo qui”), apparendo come un normale blocco di testo leggibile. Molti software di
                impaginazione e di web design utilizzano Lorem Ipsum come testo modello. Molte versioni del testo sono
                state prodotte negli anni, a volte casualmente, a volte di proposito (ad esempio inserendo passaggi
                ironici).
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')


        </div>
    </div>
@endsection
