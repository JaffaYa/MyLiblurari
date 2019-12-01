@extends('layouts.html')

@section('content')
<div class="container">
    <h1>Задачнік</h1>
    <form action="{{ route('addTask') }}" method="POST" class="form-inline inputFormFixet">
        <div class="row inputForm">
            <div class="col-9 col-md-11">
                <!-- <textarea class="form-control" name="name" rows="1" style="width: 100%" placeholder="Задача"></textarea> -->
                <input class="form-control" name="name" rows="1" style="width: 100%" placeholder="Задача"/>
            </div>
            <div class="col-3 col-md-1">
                <button type="submit" class="btn btn-success">Забиндить</button>
            </div> 
            {{ csrf_field() }}
        </div>
    </form>

    <a href="/" class="homeHref">Home</a>
    <a href="{{ route('myApi') }}" class="apiHref">API</a>

    @if(count($tasks)>0)

    <!-- <h2 class="currentTasks">Текущие задачи</h2> -->
    <h2 class="currentTasks" style="font-size: 24px">Потрать 5 минут на задачу, еслі не йде то некст.</h2>
    <ul class="list-group">
        @foreach ($tasks as $task)
        <li class="list-group-item">
            <div class="row">
                <div class="col-9 col-md-10 outPutTask">
                    <div class="text text-active">{{ $task->name }}</div>
                    <form action="{{ route('updateTask', ['id' => $task->id])  }}" method="POST" class="updateForm">
                        <input type="text" class="updateForm-feild" name="name" value="{{ $task->name }}"> 
                        <input type="submit" class="btn btn-info" value="Змінити"> 
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </form>
                </div>
                <button class="chage">Aa</button>
                <div class="col-3 col-md-2 delForm">
                    <form action="{{ route('deleteTask',['task' => $task->id])  }}" method="POST" class="outPutTaskForm">
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
