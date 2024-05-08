@extends('layouts.app')
@section('content')

<div class="jumbotron mb-4">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <img src="{{ asset('assets/') . "/bg-alt.svg" }}" alt="">
                <!-- <img src="{{ asset('assets/') . "/boolivery_manager.svg" }}" alt=""> -->
            </div>
            <div class="col-5">
                <h1 class="display-2">Diventa partner Boolivery! 🛵🍝</h1>
                <p class="fs-2 rob4 my-5">Registra la tua attività ed entra a far parte della famiglia di Boolivery!
                    Aggiungi i tuoi piatti e raggiungi subito nuovi clienti!
                </p>
                <div>
                    <!-- BUTTON -->
                    <a href="{{ route('register') }}" class="btn btn--action">
                        <span>Registra la tua attività!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
