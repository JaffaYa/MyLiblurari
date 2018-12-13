@extends('layouts.html')

@section('content')
<div class="container">
    <h1>Купити</h1>
    <form action="{{ route('addTobay') }}" method="POST" class="form-inline">
        <div class="row inputForm">
            <div class="col-9 col-md-11">
                <!-- <textarea class="form-control" name="name" rows="1" style="width: 100%" placeholder="Задача"></textarea> -->
                <input class="form-control" name="name" rows="1" style="width: 100%" placeholder="Покупка"/>
            </div>
            <div class="col-3 col-md-1">
                <button type="submit" class="btn btn-success">Додати</button>
            </div> 
            {{ csrf_field() }}
        </div>
    </form>

    <a href="/" class="homeHref">Home</a>

    @if(count($tobays)>0)

    <h2 class="currentTasks">Список</h2>
    <ul class="list-group">
        @foreach ($tobays as $tobay)
        <li class="list-group-item">
            <div class="row">
                <div class="col-9 col-md-10 outPutTask">
                    <div class="text text-active">{{ $tobay->name }}</div>
                    <form action="{{ route('updateTobay', ['id' => $tobay->id])  }}" method="POST" class="updateForm">
                        <input type="text" class="updateForm-feild" name="name" value="{{ $tobay->name }}"> 
                        <input type="submit" class="btn btn-info" value="Змінити"> 
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </form>
                </div>
                <button class="chage">Aa</button>
                <div class="col-3 col-md-2 delForm">
                    <form action="{{ route('deleteTobay',['tobay' => $tobay->id])  }}" method="POST" class="outPutTaskForm">
                        <input type="submit" class="btn btn-warning" value="Удалить"> 
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection
