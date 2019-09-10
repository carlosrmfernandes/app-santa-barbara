//IMPLEMENTACAO NAO CONCLUIDA//
//Esta seria a implementacao para renderizar os dados na tabelea principal
//Esta aberto para a implementacao      

function addLinhaTablePrinciMain(intens, endApireq) {    
    var enderecoServidorApi = $('#endereco_servidor_api').val();
    var tr = $('<tr>');
    var length = $('#hospital-table tr').length;

    var tdCodigo = $('<td>').append(($('<input>').attr('type', 'hidden').attr('value', intens.id).attr('name', 'id')));
    tdCodigo.append(intens.id);
    tr.append(tdCodigo);

    var tdHospital = $('<td>').append(($('<input>').attr('type', 'hidden').attr('value', intens.hospital).attr('name', 'hospital')));
    tdHospital.append(intens.hospital);
    tr.append(tdHospital);

    var edit = $('<a>').attr('class', '').attr('data-codigo', intens.id).append($('<span>').attr('class', 'fa fa-pencil-square-o'))
            .on('click', function () {
                $.get(enderecoServidorApi + endApireq + $(this).attr('data-codigo')).done(function (data) {
                    $('#services-table tr').detach();
                    $('#hospitalModal #hospital').val(data.hospital).prop("disabled", false);
                    $('#hospitalModal #id').val(data.id)
                    $('#exame').prop("disabled", false);
                    $('#status').prop("disabled", false);
                    $('#add-exame').show();
                    $('#salvar').show();
                    $('#hospital #id').val(data.id);
                    if (data.services == "") {
                        $('#hospitalModal').modal('show');
                    } else {
                        $.each(data.services, function (i, services) {
                            addlinha(services, i, 1);
                        });

                    }
                });
            });
    var swhow = $('<a>').attr('class', '').attr('data-codigo', intens.id).append($('<span>').attr('class', 'fa fa-align-justify'))
            .on('click', function () {
                $.get(enderecoServidorApi + endApireq + $(this).attr('data-codigo')).done(function (data) {
                    $('#services-table tr').detach();
                    $('#hospitalModal #hospital').val(data.hospital).prop("disabled", true);
                    $('#hospitalModal #id').val(data.id)
                    $('#exame').prop("disabled", true);
                    $('#status').prop("disabled", true);
                    $('#add-exame').hide();
                    $('#salvar').hide();
                    if (data.services == "") {
                        $('#hospitalModal').modal('show');
                    } else {
                        $.each(data.services, function (i, services) {
                            addlinha(services, i, 0);
                        });

                    }

                });
            });
    var remove = $('<a>').attr('class', '').attr('data-codigo', intens.id).append($('<span>').attr('class', 'fa fa-trash-o'))
            .on('click', function () {
                bootbox.confirm({
                    message: "Deseja Realmete pagar esta Hospital?",
                    buttons: {
                        confirm: {
                            label: 'Sim',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'Não',
                            className: 'btn-danger'
                        }
                    },
                    callback: (result, id = $(this).attr('data-codigo')) => {
                        if (result) {
                            apagarHospital(id,enderecoServidorApi,endApireq);
                    }

                    }
                });
            });

    tr.append($('<td>').append($('<div>').attr('class', 'float-right alinharButtonTableMain').append(swhow).append(edit).append(remove)));
    tr.appendTo('#hospital-table');
}

function addlinha(services, i, ver = 0) {
    var tr = $('<tr>');
    var length = $('#services-table tr').length;

    tr.append($('<input>').attr('type', 'hidden').attr('name', 'services[' + length + '][id]').val(services.id == null ? '' : services.id));


    var tdExame = $('<td>').append(($('<input>').attr('type', 'hidden').attr('value', services.service).attr('name', 'services[' + length + '][service]')));
    tdExame.append(services.service);
    tr.append(tdExame);

    var tdStatus = $('<td>').append(($('<input>').attr('type', 'hidden').attr('value', services.status).attr('name', 'services[' + length + '][status]')));
    tdStatus.append(services.status == 1 ? "Ok" : "Em falta");
    tr.append(tdStatus);

    if (ver == 1) {
        var remove = $('<a>').attr('class', '').attr('data-codigo', '').attr('data-i', i).append($('<span>').attr('class', 'fa fa-trash-o'))
                .on('click', function () {
                    removerLine(this)
                });
    }
    tr.append($('<td>').append($('<div>').attr('class', 'float-right alinharButtonTableMain').append(remove)));
    tr.appendTo('#services-table');
    $('#hospitalModal').modal('show');
}
function apagarHospital(id,enderecoServidorApi,endApireq) {
    var ids = [];
    ids.push(id);
    param = {
        ids: ids
    }
    $.post(enderecoServidorApi + endApireq, param)
            .done(function (ret) {
                console.log(ret);
                $('#hospital-table tr').detach();
                $('#hospitalModal').modal('hide');
                get();
            });
    return false;
}
function  removerLine(item) {
    var tr = $(item).closest('tr');
    tr.fadeOut(400, function () {
        tr.remove();
    });
    return false;
}