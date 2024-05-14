@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Dishes list')

{{-- !! Main-Content --}}
@section('content')
    <section>
        <div class="container mt-4 mb-4">

            {{-- * Main title page --}}
            <h1 class="text-center mb-5">I tuoi ordini</h1>
            {{-- @foreach ($orders as $order)
                <span>{{ $orders }}</span>
                @endforeach --}}


            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Nome cliente</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Data ordine</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Dettagli</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        @if (!empty($order))
                            <tr>
                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->date_time }}</td>
                                <td>€ {{ $order->price }}</td>
                                <td><a href="{{ route('admin.orders.show', $order) }}"><i
                                            class="fa-solid fa-table-list"></i></a></td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <p>Nessun ordine</p>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <div class="pageControls">
                {{ $orders->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>

        </div>

    @endsection

    {{-- ! CSS --}}
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection
