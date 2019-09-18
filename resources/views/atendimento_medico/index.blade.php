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

            <div class="tab-content">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#pidTab" class="btn btn-link" aria-controls="browseTab" role="tab" data-toggle="tab">Dados do Paciente</a>

                    </li>
                    <li role="presentation" ><a href="#nteTab" class="btn btn-link" aria-controls="uploadTab" role="tab" data-toggle="tab">Notas e comentários</a>

                    </li>
                    <li role="presentation"><a href="#obrTab" class="btn btn-link" aria-controls="browseTab" role="tab" data-toggle="tab">Pedido de observação</a>

                    </li>
                </ul>
            </div>

            <div class="modal-body">
                <form id="atendimento-medico-form">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="pidTab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">Número de identificação</label>
                                        <input class="form-control" type="number" id="identificacao_paciente" name="identificacao_paciente" required>
                                    </div>                          
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">Dígito de verificação do identificador</label>
                                        <input class="form-control" type="text" id="dg_verificacao_id" name="dg_verificacao_id" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">Esquema de dígitos de verificação</label>
                                        <input class="form-control" type="text" id="esquema_verificacao" name="esquema_verificacao" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <input type="hidden" id="id" name="id"/>
                                    <label for="descricao">Nome</label>
                                    <input class="form-control" type="text" id="nome" name="nome" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Sobrenome</label >
                                    <input class="form-control" type="text" id="sobre_nome" name="sobre_nome" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Data de Nascimento</label>
                                    <input class="form-control" type="date" id="data_mascimento" name="data_mascimento" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="formControlSelectStatus">Sexo</label>
                                        <select class="form-control" id="sexo" name="sexo">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>                          
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Endereço</label>
                                    <input class="form-control" type="text" id="endereco" name="endereco" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Cidade</label>
                                    <input class="form-control" type="text" id="cidade" name="cidade" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="descricao">Pais</label>
                                    <input class="form-control" type="text" id="pais" name="pais" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="descricao">Telefone</label>
                                    <input class="form-control" type="number" id="telefone" name="telefone" required>
                                </div>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="nteTab">
                            <div class="form-group">
                                <label for="comentario">Comentário</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="obrTab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">N. do Pedido</label>
                                        <input class="form-control" type="number" id="numero_pedido_preenchimento" name="numero_pedido_preenchimento" required>
                                    </div>                          
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">ID do serviço universal</label>
                                        <input class="form-control" type="number" id="id_servico_univesal" name="id_servico_univesal" required>
                                    </div>                          
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">O Nome Textual</label>
                                        <input class="form-control" type="text" id="nome_textual" name="nome_textual" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="formControlSelectStatus">Prioridade</label>
                                        <select class="form-control" id="prioridade" name="prioridade">
                                            <option value="muito_baixa">Muito Baixa</option>
                                            <option value="baixa">Baixa</option>
                                            <option value="medio">Médio</option>
                                            <option value="alta">Alta</option>
                                            <option value="muito_alta">Muito Alta</option>
                                        </select>
                                    </div>                          
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Data Solicitada</label>
                                    <input class="form-control" type="date" id="data_solicitada" name="data_solicitada" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Data da Observação</label>
                                    <input class="form-control" type="date" id="data_observacao" name="data_observacao" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Data do término da observação</label>
                                    <input class="form-control" type="date" id="data_termino_observacao" name="data_termino_observacao" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="descricao">Identificador do Provedor</label>
                                    <input class="form-control" type="text" id="id_provedor" name="id_provedor" required>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">Nome Do Provedor</label>
                                        <input class="form-control" type="text" id="nome_provedor" name="nome_provedor" required>
                                    </div>                          
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descricao">Telefone</label>
                                        <input class="form-control" type="number" id="telefone_obr" name="telefone_obr" required>
                                    </div>                          
                                </div>
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
