@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <h1>Dishes List</h1>

        @dump($dishes)
    </div>
</section>
@endsection