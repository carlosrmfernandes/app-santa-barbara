@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Centro de Saúde 
                    <button type="button" style="background-color: #1f3366; color: white" class="btn btn-primary btn float-right" id="openModal"><i class="fa fa-plus" aria-hidden="true"></i> Novo Centro de Saúde</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @component('componentes.m-datatable',['id'=>'hospital-table'])   
                    @endcomponent

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="hospitalModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hospital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="services-form">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Hospital:</label>
                        <input type="text" class="form-control" id="hospital" name="hospital" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" id="id" name="id"/>
                            <label for="descricao">Exame</label>
                            <input class="form-control" type="text" id="exame" name="exame">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formControlSelectStatus">Status</label>
                                <select class="form-control" id="status">
                                    <option value="1">OK</option>
                                    <option value="0">Em falta</option>
                                </select>
                            </div>                          
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-success pull-right" id="add-exame" style="margin-top: 30px;"> 
                                <span class="fa fa-plus" aria-hidden="true"></span>
                                Adcionar Exame
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive-xl">
                        <div id="table">
                            <table class="table table-striped table-hover">
                                <thead class>
                                    <tr>
                                        <th scope="col">Exame</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">
                                            <div class="float-right">Ação</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="services-table">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" id ="salvar" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="{{asset('js/view/exames/index.js') }}"></script>
@endsection
