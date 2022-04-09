/**
 * Script customizado para ADMINLTE
 * Caio Dellano em 25-01-2022
 */
$(function () {

    /** Deletando anexos */
    $('body').on('click', '.btnRemoverAnexo', function (e) {

        $.ajax({
            type: "GET",
            url: `/admin/attachments/${$(this)[0].dataset.id}`,
            dataType: "JSON",
            beforeSend: function () {
                ajax_load('open');
            },
            success: function (su) {
                if (su.success) {
                    ajax_load('close');
                }
                table.ajax.reload();
            }
        });

    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
        format: 'DD/MM/YYYY H:mm',
        icons: { time: 'far fa-clock' }
    });
    /**
     * Adicionar e remover anexos Cursos
     */

    $('#type').change(function () {
        if ($(this).val() != 'schedule')
            $('[name="event_date"]').attr('disabled', true);
        else
            $('[name="event_date"]').attr('disabled', false);
    });

    // add row
    $("#addRow").click(function () {

        var html = '';

        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="nomeAnexos[]" class="form-control" placeholder="Nome do documento" required>';
        html += '<input type="file" name="anexos[]" class="form-control" required>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remover</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

    //Input File    
    bsCustomFileInput.init();

    //Editor 
    runSummernote();

    /**
     * Datatables para tabelas que possuirem a class .table
     */
    $('.table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, "desc"]],
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "oLanguage": {
            "sProcessing": "<img src='../../../../images/loading.gif'></img>",
            "sZeroRecords": "Nada encontrado, desculpe",
            "sLengthMenu": "Mostrar _MENU_ itens por p&aacute;gina",
            "sInfo": "Mostrando de _START_ &aacute; _END_ de _MAX_",
            "sInfoEmpty": "Nenhum registro encontrado",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar:",
            "oPaginate": {
                "sNext": "Pr&oacute;xima",
                "sPrevious": "Anterior",
                "sLast": "&Uacute;ltima",
                "sFirst": "Primeira"
            }
        }
    });
});

//Datatables
table = $('#anexos-ativos').DataTable({
    "processing": true,
    "ajax": $('#anexos-ativos').data('url') + "/admin/attachments",
    "columns": [
        { "data": "id" },
        { "data": "nome" },
        { "data": "nome_arquivo" },
        {
            "data": "arquivo",
            "fnCreatedCell": function (nTd, data, dt) {
                $(nTd).html(`<img style="height:50px; object-fit: cover; width: 100%;" alt='SEM IMAGEM' src="${$('#anexos-ativos').data('url')}/${dt.arquivo}">`);
            }
        },
        {
            "data": "arquivo",
            "fnCreatedCell": function (nTd, data, dt) {
             

                $(nTd).html(` <input type="text" value="${$('#anexos-ativos').data('url')}/${dt.arquivo}">`);
            }
        },
        { "data": "created_at" },

        {
            "data": null,
            "fnCreatedCell": function (nTd, data, allData) {
                $(nTd).html(`<a onclick="return confirm('Deseja realmente excluir este registro?')" class='btnRemoverAnexo btn btn-danger btn-sm' href='#' data-id='${+data.id}'>  
                <i class="far fa-trash-alt" title="Remover"></i>
                </a>`);
            }
        },
    ],
    "oLanguage": {
        "sZeroRecords": "Nada encontrado, desculpe",
        "sLengthMenu": "Mostrar _MENU_ itens por p&aacute;gina",
        "sInfo": "Mostrando de _START_ &aacute; _END_ de _MAX_",
        "sInfoEmpty": "Nenhum registro encontrado",
        "sInfoFiltered": "(filtrado de _MAX_ registros)",
        "sSearch": "Pesquisar:",
        "oPaginate": {
            "sNext": "Pr&oacute;xima",
            "sPrevious": "Anterior",
            "sLast": "&Uacute;ltima",
            "sFirst": "Primeira"
        }
    },
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "order": [
        [0, "desc"]
    ],
    "ordering": true,
    "info": true,
});


// FUNCTIONS
function ajax_load(action) {
    ajax_load_div = $(".ajax_load");

    if (action === "open") {
        ajax_load_div.fadeIn(200).css("display", "flex");
    }

    if (action === "close") {
        ajax_load_div.fadeOut(200);
    }
}

function previewFile(e) {

    let file = $(e).get(0).files[0];

    if (file) {
        let reader = new FileReader();
        reader.onload = function () {
            $('#previewImg').attr('src', reader.result).fadeIn();
        }
        reader.readAsDataURL(file);
    }
}

function allPreviewFile(e) {

    let target = e.attributes.name.value;
    let file = $(e).get(0).files[0];

    if (file) {
        let reader = new FileReader();
        reader.onload = function () {
            $(`.previewFile[data-target="${target}"]`).attr('src', reader.result).fadeIn();
        }
        reader.readAsDataURL(file);
    }
}

function runSummernote(element = '.summernote', height = 350) {
    return $(element).summernote({
        height: height,
    });
}

function onlyNumbers(num) {
    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

