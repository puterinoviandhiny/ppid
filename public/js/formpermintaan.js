$(document).ready(function () {
    $('.select2').select2({
        theme: "classic"
    });

    $("#scanKTP").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        'language': 'id',
        'theme': 'explorer-fas',
        'maxFileSize': 1000,
        'overwriteInitial': false,
        'allowedFileExtensions': ['image'],
        'allowedFileExtensions': ['jpg', 'jpeg', 'png']
    });
    $('#formSubmitPermintaan').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: this.method,
            url: this.action,
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            processData: false,
            beforeSend: function () { 
                $('#submitPermintaan').text('Loading...')
                $('#submitPermintaan').prop('disabled', true)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response, textStatus, xhr) {
                if (response.status) {
                    $('#pesanPermintaan').addClass('text-success')
                    $('#pesanPermintaan').text('Permintaan sedang diproses')
                    $('#submitPermintaan').text('Kirim Permintaan')
                    $('#submitPermintaan').prop('disabled', false)
                    setTimeout(function () { 
                        location.reload();
                    }, 1500);
                } else {
                    $('#pesanPermintaan').addClass('text-danger')
                    $('#pesanPermintaan').text(response.message)
                    $('#submitPermintaan').text('Kirim Permintaan')
                    $('#submitPermintaan').prop('disabled', false)
                }
            },
            error: function (err, textStatus, xhr) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    console.log(err.responseJSON);                    
                    // you can loop through the errors object and show it to the user
                    console.warn(err.responseJSON.errors);
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span style="color: red;">'+error[0]+'</span>'));
                    });
                    $('#submitPermintaan').text('Kirim Permintaan')
                    $('#submitPermintaan').prop('disabled', false)
                }
            }
        });
        return false;
    })
});