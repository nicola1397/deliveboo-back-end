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

        <div class="row flex-row mb-4">
            <div class="col-12 col-md-8 mb-4">
                <div class="chartContainer">
                    <button class="btn orders" id="toggleData">Ordini</button>
                    <canvas id="ordersChart"></canvas>
                </div>

                {{-- TABLE --}}
                <div class="table-responsive p-3 bg-white rounded-bottom">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome cliente</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Indirizzo</th>

                                <th scope="col">Data ordine</th>
                                <th scope="col">Prezzo(€)</th>

                                <th scope="col">Dettagli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 0; @endphp
                            @forelse($orders as $order)
                                @if ($counter >= 5)
                                @break
                            @endif

                            @if (!empty($order))
                                <tr>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ substr($order->address, 0, 10) . '...' }}</td>
                                    <td>{{ date('d/m/Y', strtotime($order->date_time)) }}</td>
                                    <td>{{ str_replace('.', ',', $order->price) }}</td>
                                    <td><a href="{{ route('admin.orders.show', $order) }}"><i
                                                class="fa-solid fa-table-list"></i></a></td>
                                </tr>
                            @endif
                            @php $counter++; @endphp
                        @empty
                            <tr>
                                <p>Nessun ordine</p>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>




        <div class="col-12 col-md-3 mb-4 myCard mb-auto">

            <div class="coverImage">
                <a href="{{ route('admin.restaurants.index') }}" class="card-link">
                    <img class="card-img-bottom"
                        src="{{ !empty($restaurant->image)
                            ? asset('storage/' . $restaurant->image)
                            : asset('storage/uploads/placeholder.png') }}">

                </a>
            </div>

            <div class="card mt-4">
                <button class="btn btn-warning"><a href="{{ route('admin.dishes.index') }}"> Ecco i tuoi piatti
                        🍝</a>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/charts.js')
@endsection

{{-- ! CSS --}}
@section('script')
@vite('resources/js/charts.js')
<script>
    window.orders = @json($orders);
</script>
@endsection

{{-- ! CSS --}}
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@vite('resources/scss/indexs.scss')
@endsection
