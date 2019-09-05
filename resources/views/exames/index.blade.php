@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard 
                    <button type="button" style="background-color: #1f3366; color: white" class="btn float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" aria-hidden="true"></i> Novo Centro de Saúde</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="table-responsive-xl">
                        <table class="table table-striped table-hover">
                            <thead class>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Hospital</th>
                                    <th scope="col">Exames ok</th>
                                    <th scope="col">
                                        <div class="float-right">Ação</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Santa Barbara</td>
                                    <td>24</td>
                                    <td>
                                        <div class="float-right">
                                            <button type=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <button type=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/view/exames/index.js') }}"></script>
@endsection
