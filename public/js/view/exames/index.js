$(document).ready(function () {
    get();
    function get() {
        var enderecoServidorApi = $('#endereco_servidor_api').val();
        $.get(enderecoServidorApi + '/hl7-api/public/V1/get_hospital').done(function (data) {
            $.each(data.hospital, function (i, intens) {
                console.log(intens);
            });
        });
    }
});
