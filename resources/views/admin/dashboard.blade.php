@extends('layouts.app')

{{-- @section('script')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </script>
    <script></script>
@endsection --}}




@section('content')
    <div class="container">
        <div class="card-body mt-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        </div>
        <h2 class="fs-4 text-white my-4">

            {{-- schermata dashboard  --}}


            {{ __('Bentornato') . ', ' . Auth::user()->name . '!' }}
        </h2>

        <div class="row">
            <div class="col-9">
                <div class="col">
                    <canvas id="myChart"></canvas>

                </div>

                {{-- TABLE --}}
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome_cliente</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Indirizzo</th>
                                <th scope="col">Data_ordine</th>
                                {{-- <th scope="col">Piatto</th> --}}
                                <th scope="col">Prezzo</th>
                                <th scope="col">Dettagli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                @if (!empty($order))
                                    <tr>
                                        <td>{{ $order->id }}</td>
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
                </div>


            </div>
            {{--  --}}
            <div class="col-3 myCard">
                {{-- qua andremo a mostrare l'index del ristorante --}}
                {{-- <div class="card ">
                    <div class="card-body"> --}}
                {{-- <h5 class="card-title">{{ Auth::user()->name }}</h5> --}}
                <div class="coverImage"><a href="{{ route('admin.restaurants.index') }}" class="card-link">
                        @foreach ($restaurants as $restaurant)
                            <img class="card-img-bottom"
                                src="{{ !empty($restaurant->image)
                                    ? asset('storage/' . $restaurant->image)
                                    : asset('storage/uploads/placeholder.png') }}">
                        @endforeach
                    </a>
                </div>
                {{-- </div>
                </div> --}}
                <div class="card mt-4">
                    <button class="btn btn-warning"><a href="{{ route('admin.dishes.index') }}"> Ecco i tuoi piatti
                            🍝</a>
                        </a>
                    </button>
                </div>

            </div>
        </div>
    @endsection

    {{-- ! CSS --}}
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite('resources/scss/indexs.scss')
    @endsection
