$(document).ready(function () {
    $('.select2').select2();
    $("#surat_kuasa").fileinput({
        'showUpload': false,
        'previewFileType': 'any',
        'language': 'id',
        'theme': 'explorer-fas',
        'maxFileSize': 1000,
        'overwriteInitial': false,
        'allowedFileExtensions': ['image'],
        'allowedFileExtensions': ['jpg', 'jpeg', 'png']
    });
    $('.filter_nik').on('keyup', function () {
        let keyword = $(this).val();
        if (keyword.length > 0) {
            $.get(window.location.origin+"/formkeberatan/informasi_by_nik?nik="+keyword, function (data, textStatus, jqXHR) {
                if (data.length > 0) {
                    $('.id_informasi').empty();
                    $('.id_informasi').append(`<option value="">::Informasi::</option>`);
                    data.forEach((v,k) => {
                        $('.id_informasi').append(`
                            <option value="${v.id_permintaan}">${v.informasi_diminta}</option>
                        `);
                    });
                    $('.id_informasi').prop('disabled', false);
                } else {
                    $('.id_informasi').empty();
                    $('.id_informasi').prop('disabled', true);
                    $('.tujuan, .nama_pemohon, .alamat_pemohon, .pekerjaan_pemohon, .kontak_pemohon').val('');
                }
            });
        } else {
            $('.id_informasi').empty();
            $('.id_informasi').prop('disabled', true);
            $('.tujuan, .nama_pemohon, .alamat_pemohon, .pekerjaan_pemohon, .kontak_pemohon').val('');
        }
    });

    $('.id_informasi').on('change', function(e){
        let id = $(this).val();
        $('.tujuan, .nama_pemohon, .alamat_pemohon, .pekerjaan_pemohon, .kontak_pemohon').val('');
        $.get(window.location.origin+"/formkeberatan/informasi_by_id?id_informasi="+id, function (data, textStatus, jqXHR) {
            if(data){
                $('.tujuan').val(data.informasi_diminta)
                $('.nama_pemohon').val(data.pemohon)
                $('.alamat_pemohon').val(data.alamat)
                $('.pekerjaan_pemohon').val(data.pekerjaan)
                $('.kontak_pemohon').val(`${data.telepon}-${data.email}`)
            } else {
                $('.tujuan, .nama_pemohon, .alamat_pemohon, .pekerjaan_pemohon, .kontak_pemohon').val('');
            }
        });
    });

    $('.identitas_kuasa').on('click', function(){
        $('.nama_kuasa, .alamat_kuasa, .kontak_kuasa').val(''); 
        if ($(this).is(":checked")) {
            $('.nama_kuasa, .alamat_kuasa, .kontak_kuasa').prop('readonly', false);
        } else {
            $('.nama_kuasa, .alamat_kuasa, .kontak_kuasa').prop('readonly', true);
        }
    });

    $('#formSubmitKeberatan').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: this.method,
            url: this.action,
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            processData: false,
            beforeSend: function () { 
                $('#submitKeberatan').text('Loading...')
                // $('#submitKeberatan').prop('disabled', true)
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response, textStatus, xhr) {
                if (response.status) {
                    $('#pesanKeberatan').addClass('text-success')
                    $('#pesanKeberatan').text('Permintaan sedang diproses')
                    $('#submitKeberatan').text('Kirim Permintaan')
                    $('#submitKeberatan').prop('disabled', false)
                    setTimeout(function () { 
                        // location.reload();
                    }, 1500);
                } else {
                    $('#pesanKeberatan').addClass('text-danger')
                    $('#pesanKeberatan').text(response.message)
                    $('#submitKeberatan').text('Kirim Permintaan')
                    $('#submitKeberatan').prop('disabled', false)
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
                    $('#submitKeberatan').text('Kirim Permintaan')
                    $('#submitKeberatan').prop('disabled', false)
                }
            }
        });
        return false;
    })
});