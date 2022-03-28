$(function () {

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