@extends('layouts.html')

@section('content')
<div class="container main">
    <ul class="list-group">
        <li class="list-group-item"><a href="{{ route('tasks') }}">Зробити</a></li>
        <li class="list-group-item"><a href="{{ route('toBays') }}">Купити</a></li>
        <li class="list-group-item"><a href="#">Побувати</a></li>
        <li class="list-group-item"><a href="http://s2.plopan.com/MyBase/films.php">Продивитись</a></li>
        <li class="list-group-item"><a href="{{ route('toReads') }}">Почитати</a></li>
        <li class="list-group-item"><a href="http://s2.plopan.com/MyBase/privichka.php">Правило 20 минут</a></li>
    </ul>
</div>
@endsection
