jQuery(document).ready(function ($) {
    $('#subscriber-form').submit(function (event) {
        event.preventDefault()
        var subscriberData = $('#subscriber-form').serialize();

        $.ajax({
                type: 'post',
                url: $('#subscriber-form').attr('action'),
                data: subscriberData
            }).done(function (response) {
                $('#form-msg').removeClass('error');
                $('#form-msg').addClass('success');
                $('#form-msg').text(response);
                $("#name").val('');
                $("#email").val('');
        }).fail(function (data) {
            $('#form-msg').addClass('error');
            $('#form-msg').removeClass('success');
            if(data.responseText != ''){
                $('#form-msg').text(data.responseText);
            }else{
                $('#form-msg').text('Message was not sent');
            }
        })
    })
});