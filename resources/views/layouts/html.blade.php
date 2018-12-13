<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap css -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/task.css') }}">

    <title>{{ $title or "MyLibrary" }}</title>

</head>
<body>
    <div class="container-fuid">
    @if(count($errors)>0)
    <div class="bg-warning errors container">
        <p>Хюстон у нас {{ count($errors) }} проблем(а)</p>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @yield('content')

    </div>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>
</html>