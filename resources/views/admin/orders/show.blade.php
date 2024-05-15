@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Dishes list')

{{-- !! Main-Content --}}
@section('content')
<section>
    <div class="container mt-4 mb-4">

        {{-- * Main title page --}}
        <h1 class="text-center mb-5">I tuoi ordini</h1>

        <a href="{{ route('admin.dashboard') }}" class="my-4 btn btn-primary">
            <i class="fa-solid fa-chart-column fa-beat me-1"></i>
            Vai alla Dashboard</a>

        <a href="{{ route('admin.orders.index') }}" class="my-4 btn btn-primary ms-2">
            <i class="fa-solid fa-circle-left fa-beat"></i>
            Vai ai tuoi Ordini</a>

        <h3 class="text-center">CONTATTI</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome cliente</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Data ordine</th>
                    <th scope="col">Prezzo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->date_time }}</td>
                    <td>€ {{ $order->price }}</td>
                </tr>
            </tbody>
        </table>
        <h3 class="text-center">DETTAGLIO ORDINE</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Piatto</th>
                    <th scope="col">Quantità</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->dishes as $dish)
                <tr>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->pivot->quantity }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>




    </div>
    @endsection

    {{-- ! CSS --}}
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @endsection
