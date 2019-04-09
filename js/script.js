$('.carousel').carousel({
    interval: 5000
});


$('#myModalLogin').on('shown.bs.modal', function () {
    $('#email-login-input').focus()
});

$('[data-toggle="tolltip"]').tooltip({
    title: 'Teste de title via javascripi jquery com Bottstrap...'
});