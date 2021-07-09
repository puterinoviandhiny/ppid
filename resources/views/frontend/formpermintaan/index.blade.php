@extends('frontend.layout.layout')
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
@if(isset($flag) && $flag === 1)
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Terima kasih telah mengisi formulir permintaan informasi</p>
</div>
@endif
<div id="successMessage"></div>
<div id="errorMessage"></div>
<!--ARTICLE-->
<h2 class="uk-heading-line uk-text-center"><span>Form Permintaan Informasi</span></h2>
<section class="uk-section uk-article">
    <div class="uk-container uk-container-small">
        <form class="uk-form-stacked" action="{{ route('permintaan.store') }}" method="POST" enctype="multipart/form-data" id="formSubmitPermintaan">
            @csrf
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-select" required>SKPD Tujuan</label>
                <div class="uk-form-controls">
                    <select class="uk-select select2" id="form-stacked-select" name="id_skpd">
                        @foreach ($skpd as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Nama Pemohon</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="pemohon">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-label">Jenis Kelamin</div>
                <div class="uk-form-controls">
                    <label><input class="uk-radio" type="radio" name="kelamin" value="l">Laki-laki</label>
                    <label><input class="uk-radio" type="radio" name="kelamin" value="p">Perempuan</label>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Usia</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="number" name="usia">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Nomor KTP</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="number" name="noktp">
                </div>
            </div>
            <div class="form-group">
                <label class="uk-form-label" for="form-stacked-text">Scan KTP</label>
                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true">
                        <input type="file" {{--onchange="browseFile(this)"--}} class="form-control" name="scan_ktp" id="scanKTP" accept=".jpg,.jpeg,.png">
                        {{-- <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled> --}}
                    </div>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" name="alamat"></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Pekerjaan</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="pekerjaan">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Telepon</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="telepon">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Fax</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="fax">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="email">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Informasi Yang Diminta</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" name="informasi_diminta"></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Alasan Permintaan Informasi</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" name="alasan"></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Cara Penyampaian Informasi</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="cara">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-select" required>Tindak Lanjut</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="form-stacked-select" name="id_tindak_lanjut">
                        <option value="1">Telepon</option>
                        <option value="2">Fax</option>
                        <option value="3">Email</option>
                    </select>
                </div>
            </div>
            <!--div>{--!! NoCaptcha::display(['data-theme' => 'light','data-size'=>'normal']) !!}</div-->
            {{-- @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif --}}
            <div class="uk-margin">
                <button class="uk-button uk-button-primary" type="submit" id="submitPermintaan">Kirim Permintaan</button>
                <span id="pesanPermintaan"></span>
            </div>
        </form>

    </div>
</section>

@include('frontend.inc.footer')