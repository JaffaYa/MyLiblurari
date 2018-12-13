@extends('layouts.html')

@section('content')
<nav id="menu" class="navbar navbar-dark fixed-right bg-dark slideout-menu slideout-menu-right">
	<button id="menuClose"><span class="criss-cross"></span></button>
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link" href="#get">Всі задачі</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#post">Создати задачу</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#put">Обновити задачу</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#delete">Удалити задачу</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#createUser">Зареєструватись</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#login">Зайти</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#logout">Вийти</a>
		</li> 
	</ul>
</nav>
<div id="panel" class="api slideout-panel">
	<button class="btn-hamburger js-slideout-toggle"></button>
	<div class="upperText">
		<p>
			В API RESTful мы используем HTTP-action как действия, а конечными точками являются ресурсы, на которые воздействуют. Мы будем использовать HTTP-action по их семантическому значению:
		</p>
		<p>
			<strong>POST</strong>: создать<br />
			<strong>GET</strong>: получить<br />
			<strong>PUT</strong>: обновить<br />
			<strong>DELETE</strong>: удалить
		</p>
		<p>&nbsp;</p>
		<p>
			CreateReadUpdateDelete (<strong>CRUD</strong>) &#8212; эта аббревиатура частенько может попадаться в статьях.
		</p>
	</div>

	<div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
		<h4 id="get">/api/tasks::get</h4>
		<p><strong>Получити всі задачі.</strong><br/>
			Вертає json з масівом задач і HTTP код 200<br/>
			@if($api_token!=null)
			{{ $api_token }}<br/>
			@endif
			<form action="{{ url('/api/tasks') }}" method="GET" class="outPutTaskForm outPutTaskFormApi">
				<input type="submit" class="btn btn-warning" value="Получити"> 
				@if($api_token!=null)
				<input type = "hidden" name="api_token" value="{{ $api_token->api_token }}">
				@endif
				{{ csrf_field() }}
			</form>
		</p>
		<br/>
		<br/>
		<h4 id="post">/api/tasks::post</h4>
		<p><strong>Сохранити задачу.</strong><br/>
			Принімає постом змінну "name" з текстом задачі. Наприклад "test".<br/>
			Вертає json з обновленою задачою і HTTP код 201<br/>
			@if($api_token!=null)
			{{ $api_token }}<br/>
			@endif
			<form action="{{ route('apiAddTask')  }}" method="POST" class="outPutTaskForm outPutTaskFormApi">
				<input type = "hidden" name="name" value="test">
				<input type="submit" class="btn btn-warning" value="Зберегти завдання test"> 
				@if($api_token!=null)
				<input type = "hidden" name="api_token" value="{{ $api_token->api_token }}">
				@endif
				{{ csrf_field() }}
			</form>
		</p>
		<br/>
		<br/>
		<h4 id="put">/api/tasks::put</h4>
		<p><strong>Обновити задачу.</strong><br/>
			Принімає путом змінну "name" з оновленим текстом задачі, на урл типу /api/tasks/{id}.<br/>
			Вертає json з масівом задач і HTTP кодом 200<br/>
			@if($api_token!=null)
				{{ $api_token }}<br/>
			@endif
			@if($testTasks!=null)
			<form action="{{ route('apiUpdateTask',['id' => $testTasks->id]) }}" method="POST" class="outPutTaskForm outPutTaskFormApi">
				<input type = "hidden" name="name" value="test">
				<input type="submit" class="btn btn-warning" value="Обновити задачу {{ $testTasks }} з test на test"> 
				@if($api_token!=null)
				<input type = "hidden" name="api_token" value="{{ $api_token->api_token }}">
				@endif
				{{ method_field('PUT') }}
				{{ csrf_field() }}
			</form>
			@endif
		</p>
		<br/>
		<br/>
		<h4 id="delete">/api/tasks::delete</h4>
		<p><strong>Удалити задачу.</strong><br/>
			Запрос делете потрібно слати на урл типу /api/tasks/{id}.<br/>
			Вертає пустий json і HTTP код 204<br/>
			@if($api_token!=null)
			{{ $api_token }}<br/>
			@endif
			@if($testTasks!=null)
			<form action="{{ route('apiDeleteTask',['task' => $testTasks])  }}" method="POST" class="outPutTaskForm outPutTaskFormApi">
				<input type="submit" class="btn btn-warning" value="Вилучити задачу {{ $testTasks }}"> 
				@if($api_token!=null)
				<input type = "hidden" name="api_token" value="{{ $api_token->api_token }}">
				@endif
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
			</form>
			@endif
		</p>
		<br/>
		<br/>
		<h4 id="createUser">/api/register::post</h4>
		<p><strong>Создати пользователя.</strong><br/>
			Вертає json пользователя<br/>
			<form action="{{ url('/api/register')  }}" method="POST" class="outPutTaskForm outPutTaskFormApi">
				<input type = "hidden" name="name" value="John	">
				<input type = "hidden" name="email" value="john.doe@toptal.com">
				<input type = "hidden" name="password" value="topta123">
				<input type = "hidden" name="password_confirmation" value="topta123">
				<input type="submit" class="btn btn-warning" value="Зареєструватись"> 
				{{ csrf_field() }}
			</form>
		</p>
		<br/>
		<br/>
		<h4 id="login">/api/login::post</h4>
		<p><strong>Залогінитимь.</strong><br/>
			Вертає json пользователя<br/>
			<form action="{{ url('/api/login')  }}" method="POST" class="outPutTaskForm outPutTaskFormApi">
				<input type = "hidden" name="email" value="john.doe@toptal.com">
				<input type = "hidden" name="password" value="topta123">
				<input type="submit" class="btn btn-warning" value="Зайти"> 
				{{ csrf_field() }}
			</form>
		</p>
		<br/>
		<br/>
		<h4 id="logout">/api/logout::post</h4>
		<p><strong>Розлогінитимь.</strong><br/>
			Вертає json 'User logged out.'<br/>
			@if($api_token!=null)
			{{ $api_token }}<br/>
			@endif
			<form action="{{ url('/api/logout')  }}" method="POST" class="outPutTaskForm outPutTaskFormApi">
				<input type = "hidden" name="email" value="john.doe@toptal.com">
				<input type = "hidden" name="password" value="topta123">
				<input type="submit" class="btn btn-warning" value="Вийти"> 
				@if($api_token!=null)
				<input type = "hidden" name="api_token" value="{{ $api_token->api_token }}">
				@endif
				{{ csrf_field() }}
			</form>
		</p>
	</div>
</div>
<script src="{{ asset('js/slideout.min.js') }}"></script>
<script>
	window.onload = function() {
		var slideout = new Slideout({
			'panel': document.getElementById('panel'),
			'menu': document.getElementById('menu'),
			'side': 'right'
		});

        // кнопка
        document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
        	slideout.toggle();
        });

        // закриває меню еслі ссилка
        // document.querySelector('.menu').addEventListener('click', function(eve) {
        // 	if (eve.target.nodeName === 'A') { slideout.close(); }
        // });
        document.getElementById('menuClose').addEventListener('click', function(eve) {
        	slideout.close();
        });

    };
    document.addEventListener( "DOMContentLoaded", function( event ) {
    });
</script>
@endsection