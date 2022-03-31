$(function () {


    $('#form-pesquisa-curso').submit(function (e) {
        e.preventDefault();

        let data = $(this).serializeArray();

        if (!data[0].value.length)
            return;
        let queryString = $.param(data);

        window.location.href = `/cursos?${queryString}`;
    });

    /** Autocomplete */
    $('#search').focus(function (e) {
        let availableTags;
        let url = $(this)[0].form.action;

        $.ajaxSetup({ async: false });

        $.get(url, function (data) {
            availableTags = JSON.parse(data);
        });

        $(this).autocomplete({
            source: availableTags
        });

    });

    /** Form em movimento */

    let elWrapForm = $('.wrapForm');

    $(window).scroll(function (e) {

        if (window.pageYOffset < 300) {

            elWrapForm.css({
                'position': 'relative',
                'opacity': 1,
                'top': 0
            });

        } else if (window.pageYOffset > 300) {

            elWrapForm.css({
                'position': 'fixed',
                'top': $('.navbar').height() + 30 + 'px',
                'opacity': 1,
                'transform': 'translateY(0)',
                'width': $('.col-md-4').width()
            });

        } else {

            elWrapForm.css({
                'position': 'fixed',
                'opacity': 0,
                'transform': 'translateY(-50%)'
            });
        }

    });

    /** Máscaras */

    $('[name="telefone"]').mask('(00) 00000-0000');

    /** Clique no Curso */
    $('.content-item[data-url]').click(function () {
        let url = $(this).attr('data-url');
        window.location.href = url;
    })
});