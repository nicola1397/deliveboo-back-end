<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    {{-- ! Page tilte --}}
    <title>{{ env('APP_NAME', 'Laravel project') }} - @yield('title', 'My page')</title>
    @vite('resources/js/app.js')
    {{-- ! CSS --}}
    @yield('css')
</head>


<body>
    <div class="wrapper">
        {{-- ! Header --}}
        @include('layouts.partials.header')

        {{-- ! Main --}}
        <main>
            @if (session('message'))

              <section>
                  <div class="container mt-3">
                      <div class="alert {{ session('message-class') }} alert-dismissible">
                          {{ session('message') }}
                          <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                      </div>
                  </div>
              </section>

            @endif

            {{-- * Main content --}}
            @yield('content')
            {{-- * Destroy modal --}}
            @yield('modal')
        </main>

    </div>
    
        {{-- ! Footer --}}
        @include('layouts.partials.footer')



    {{-- ! Logout --}}
    @auth
    <script>
        const logoutLink = document.getElementById('logout-link');
        const logoutForm = document.getElementById('logout-form');
        logoutLink.addEventListener('click', (e) => {
            e.preventDefault();
            logoutForm.submit();
        });
    </script>

    @endauth

    {{-- ! Script --}}
    @yield('js')
</body>

</html>
