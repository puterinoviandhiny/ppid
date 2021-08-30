@include('frontend.layout.layout')
@include('frontend.inc.header')
<style type="text/css">
    .file-preview .fileinput-remove {
        display: none;
    }
    .file-input {
        box-shadow: 10px 20px 50px rgba(0, 0, 0, 0.02);
    }
    .file-input .file-preview {
        background-color: #E3E3E3;
        border: 0;
    }
    .file-input .file-preview .file-drop-zone {
        border-color: #676767;
    }
    .file-input .file-preview .file-drop-zone .file-drop-zone-title {
        color: #676767;
    }
    .file-input .btn-file {
        /* border-radius: 25px; */
        background: #f77000;
        border-color: #f77000;
        box-sizing: border-box;
        appearance: none;
        background-color: transparent;
        border: 2px solid $red;
        border-radius: 0.6em;
        cursor: pointer;
        display: flex;
        align-self: center;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1;
        margin: 20px;
        padding: 1.2em 2.8em;
        text-decoration: none;
        text-align: center;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;

        &:hover,
        &:focus {
            color: #f76f00a8;
            outline: 0;
        }
    }
    .file-input .btn-file:hover, .file-input .btn-file:focus, .file-input .btn-file:active {
        background: #f75b00;
    }

    .modal .btn-submit {
        border-radius: 25px;
        background: #f77000;
        border-color: #f77000;
    }
    .modal .btn-submit:hover, .modal .btn-submit:focus, .modal .btn-submit:active {
        background: #f75b00;
    }
    .modal .btn-cancel {
        border-radius: 25px;
    }
    .file-caption-name{
        display: none;
    }
</style>
<!--/HEADER-->
<div class="uk-container uk-container-small">
    <hr class="uk-margin-remove">
</div>
<!--ARTICLE-->
<h2 class="uk-heading-line uk-text-center"><span>Form Keberatan Atas Permohonan Informasi</span></h2>
<section class="uk-section uk-article">
    <div class="uk-container uk-container-small">
        <form class="uk-form-stacked" action="{{ route('keberatan.store') }}" method="POST" enctype="multipart/form-data" id="formSubmitKeberatan">
            @csrf
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">NIK Pemohon</label>
                <div class="uk-form-controls">
                    <input class="uk-input filter_nik" id="form-stacked-text" type="number" name="filter_nik">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-select" required>Permohonan Informasi</label>
                <div class="uk-form-controls">
                    <select class="uk-select select2 id_informasi" id="form-stacked-select id_informasi" name="id_informasi" disabled></select>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Tujuan Penggunaan Informasi</label>
                <div class="uk-form-controls">
                    <textarea class="uk-input tujuan" id="form-stacked-text" name="tujuan" rows="7" readonly></textarea>
                </div>
            </div>
            <hr>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Identitas Pemohon</label>
                <div class="uk-form-controls">
                    <input class="identitas_pemohon" id="form-stacked-text" type="checkbox" name="identitas_pemohon" value="1" checked>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                <div class="uk-form-controls">
                    <input class="uk-input nama_pemohon" id="form-stacked-text" type="text" name="nama_pemohon" readonly>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                <div class="uk-form-controls">
                    <textarea class="uk-input alamat_pemohon" id="form-stacked-text" name="alamat_pemohon" rows="3" readonly></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Pekerjaan</label>
                <div class="uk-form-controls">
                    <input class="uk-input pekerjaan_pemohon" id="form-stacked-text" type="text" name="pekerjaan_pemohon" readonly>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">No Telepon/Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input kontak_pemohon" id="form-stacked-text" type="text" name="kontak_pemohon" readonly>
                </div>
            </div>
            <hr>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Identitas Kuasa Pemohon</label>
                <div class="uk-form-controls">
                    <input class="identitas_kuasa" id="form-stacked-text" type="checkbox" name="identitas_kuasa" value="1">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Nama</label>
                <div class="uk-form-controls">
                    <input class="uk-input nama_kuasa" id="form-stacked-text" type="text" name="nama_kuasa" readonly>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                <div class="uk-form-controls">
                    <textarea class="uk-input alamat_kuasa" id="form-stacked-text" name="alamat_kuasa" rows="3" readonly></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">No Telepon/Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input kontak_kuasa" id="form-stacked-text" type="text" name="kontak_kuasa" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="uk-form-label" for="form-stacked-text">Surat Kuasa</label>
                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true">
                        <input type="file" class="form-control" name="surat_kuasa" id="surat_kuasa" accept=".jpg,.jpeg,.png">
                    </div>
                </div>
            </div>
            <hr/>
		    <div class="form-group">
		    	<label for="alasan_pengajuan" class=" control-label">
					Alasan Pengajuan Keberatan
				</label>
		    </div>
            <div class="form-group">
		    	<div class="checkbox">
					<label for="ajuan_keberatan1" class="control-label">
						<input type="checkbox" id="ajuan_keberatan1" name="ajuan_keberatan[]" value="1">
						Permohonan Informasi Di Tolak
					</label><br/>
					<label for="ajuan_keberatan2" class="control-label">
						<input type="checkbox" id="ajuan_keberatan2" name="ajuan_keberatan[]" value="2">
						Informasi Berkala Tidak Disediakan
					</label><br/>
					<label for="ajuan_keberatan3" class="control-label">
						<input type="checkbox" id="ajuan_keberatan3" name="ajuan_keberatan[]" value="3">
						Permintaan Informasi Tidak Ditanggapi
					</label><br/>
					<label for="ajuan_keberatan4" class="control-label">
						<input type="checkbox" id="ajuan_keberatan4" name="ajuan_keberatan[]" value="4">
						Permintaan Informasi Ditanggapi Tidak Sebagaimana Yang Diminta
					</label><br/>
					<label for="ajuan_keberatan5" class="control-label">
						<input type="checkbox" id="ajuan_keberatan5" name="ajuan_keberatan[]" value="5">
						Permintaan Informasi Tidak Dipenuhi
					</label><br/>
					<label for="ajuan_keberatan6" class="control-label">
						<input type="checkbox" id="ajuan_keberatan6" name="ajuan_keberatan[]" value="6">
						Biaya Yang Dikenakan Tidak Wajar
					</label><br/>
					<label for="ajuan_keberatan7" class="control-label">
						<input type="checkbox" id="ajuan_keberatan7" name="ajuan_keberatan[]" value="7">
						Informasi Disampaikan Melebihi Jangka Waktu Yang Ditentukan
					</label>
				</div>
		    </div>
            {{-- <div>{!! NoCaptcha::display(['data-theme' => 'light','data-size'=>'normal']) !!}</div> --}}
            {{-- @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif --}}
            <div class="uk-margin">
                <button class="uk-button uk-button-primary" id="submitKeberatan">Kirim Permintaan</button>
                <span id="pesanKeberatan"></span>
            </div>
        </form>

    </div>
</section>

@include('frontend.inc.footer')