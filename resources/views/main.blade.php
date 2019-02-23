@extends('layouts.html')

@section('content')
<div class="container main">
    <div class="main-ul-wraper">
        <ul class="list-group main-ul">
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('tasks') }}">Зробити</a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('toBays') }}">Купити</a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('toTravel') }}">Побувати</a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="http://s2.plopan.com/MyBase/films.php">Продивитись</a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('toReads') }}">Почитати</a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="http://s2.plopan.com/MyBase/privichka.php">Правило 20 минут</a></li>
            </div>
        </ul>
    </div>
</div>
@endsection
