@extends('site.layouts.app')

@section('title' , 'Meu Perfil')

@section('content')
<h1>Meu perfil</h1> 

<form action="{{ route('profile.update') }}" method="POST">
    {{!! csrf_field() !! }}
    <div class = "form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" value = "{{ auth()->user()->name }}" placeholder= "Nome" class="form-control" >
    </div>
    <div class = "form-group">
    <label for="email">Email:</label>
        <input type="email" name="email" value = "{{ auth()->user()->email }}" placeholder= "Email" class="form-control">
    </div>
    <div class = "form-group">
    <label for="password">Senha:</label>
        <input type="password" name="password" placeholder= "Senha" class="form-control">
    </div>
    <div class = "form-group">
    <label for="image">Imagem:</label>
        <input type="file" name="file" class="form-control">
    </div>
    <div class = "form-group">
    <button type="submit" class= "btn btn-info">Atualizar Perfil</button>
    </div>
</form>

@endsection