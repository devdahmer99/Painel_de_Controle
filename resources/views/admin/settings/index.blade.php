@extends('adminlte::page')

@section('title', 'Configurações do Site')


@section('content_header')
    <h1>Configurações do Site</h1>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('settings.save')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Titulo do Site</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">SubTitulo</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail para Contato</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor do Fundo</label>
                    <div class="col-sm-10">
                        <input type="color" name="bgcolor" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Cor da letra</label>
                    <div class="col-sm-10">
                        <input type="color" name="textcolor" value="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-sm btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
