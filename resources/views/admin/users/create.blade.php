@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>
@endsection

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <h4>Ocorreu um Erro.</h4>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action="{{route('users.store')}}" class="form-horizontal">
        @csrf
        <div class="form-group">
            <div class="row">
            <label class="col-sm-2 control-label">Nome Completo</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label">Confirme a senha</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>

@endsection