@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Alerta!</h5>
                        <p class="card-text">Foi implementado o compartilhamento de Informações com as Outras Unidades.</p>
<!--                        <a href="#" class="btn btn-primary">Go somewhere</a>-->
                    </div>
                    <div class="card-footer text-muted">
                        Teve inicio ao 12 de Agosto 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>-->
@endsection
