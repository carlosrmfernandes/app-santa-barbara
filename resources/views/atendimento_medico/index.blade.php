@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ficha do Paciente 
                    <button type="button" style="background-color: #1f3366; color: white" class="btn btn-primary btn float-right" id="openModal"><i class="fa fa-plus" aria-hidden="true"></i> Ficha do Paciente</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
<!--                    <div class="table-responsive-xl">
                        <table class="table table-striped table-hover">
                            <thead class>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <div class="float-right"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="hospital-table">

                            </tbody>
                        </table>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="atendimento_medicoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ficha do Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="atendimento-medico-form">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" id="id" name="id"/>
                            <label for="descricao">Nome</label>
                            <input class="form-control" type="text" id="exame" name="exame">
                        </div>
                        <div class="col-md-4">
                            <label for="descricao">Sobrenome</label>
                            <input class="form-control" type="text" id="exame" name="exame">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="formControlSelectStatus">Cidade</label>
                                <select class="form-control" id="status">
                                    <option value="1">Luanda</option>
                                    <option value="0">Angola </option>
                                </select>
                            </div>                          
                        </div>

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
<script src="{{asset('js/view/atendimento_medico/index.js') }}"></script>
@endsection
