@extends('layouts.html')

@section('content')
<div class="container main">
    <div class="main-ul-wraper">
        <ul class="list-group main-ul">
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('tasks') }}"><span class="text-block">Зробити</span></a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('toBays') }}"><span class="text-block">Купити</span></a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('toTravel') }}"><span class="text-block">Побувати</span></a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="http://s2.plopan.com/MyBase/films.php"><span class="text-block">Продивитись</span></a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="{{ route('toReads') }}"><span class="text-block">Почитати</span></a></li>
            </div>
            <div class="main-li-wraper">
                <li class="list-group-item"><a href="http://s2.plopan.com/MyBase/privichka.php"><span class="text-block">Правило 20 минут</span></a></li>
            </div>
        </ul>
    </div>
</div>
@endsection
