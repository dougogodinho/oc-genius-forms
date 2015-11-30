$(function(){

    // tratamento .genius-form
    $('.genius-form')
        .on('submit', function(e) {
            e.preventDefault();
            $(this).find('.form-error, .form-success').hide();
            $(this).find('.has-error').removeClass('has-error');
            $(this).find('.input-error').html('');
        })
        .on('ajaxSuccess', function() {
            $('*').val('');
            $(this).find('.form-success').show();
        })
        .on('ajaxError', function(e, c, s, jqXHR) {
            var $this = $(this);
            $this.find('.form-error').show();
            $.each(jqXHR.responseJSON.X_OCTOBER_ERROR_FIELDS, function (id,errors) {
                var parent = $this.find('#' + id).closest('div');
                var text = errors.join('<br>').replace(RegExp("\\b" + id + "\\b"), '<u>' + parent.find('label').html() + '</u>');
                parent.addClass('has-error').find('.input-error').html(text);
            });
        })
        .on('ajaxComplete', function() {

        });

    // remove o tratamento padrão (com alert) de retorno de erros
    $(window).on('ajaxErrorMessage', function(e){
        e.preventDefault();
    });
});