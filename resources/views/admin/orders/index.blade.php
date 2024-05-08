@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Dishes list')

{{-- !! Main-Content --}}
@section('content')
<section>
    <div class="container mt-4 mb-4">


        {{-- * Main title page --}}
        <h1 class="text-center mb-5">I tuoi ordini</h1>


    </div>
    @endsection

    {{-- ! CSS --}}
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @endsection
