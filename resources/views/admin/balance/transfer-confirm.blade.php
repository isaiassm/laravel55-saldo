@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Confirmar transferencia</h1>
    
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">confirmação</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">
       <h3>Confirmar tranferencia Saldo</h3>
        </div>
        <div class="box-body">
        @include('admin.includes.alerts')
        <p>Recebedor:<strong> {{$sender->name}} </strong></p> 
       

        <form method="POST" action="{{ route('transfer.store') }}">
        {!! csrf_field() !!}
        <input type="hidden" name="sender_id" value="{{$sender->id}}">


        <div class="form-group">
        <input type="text" name="value" placeholder="Valor:" class="form-control">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-info">Transferir</button>
        </div>
            </form>
        </div>
    </div>
@stop