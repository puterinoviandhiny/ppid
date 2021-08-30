@include('frontend.layout.layout')
@include('frontend.inc.header')
<!--/HEADER-->
<div class="uk-container uk-container-small">
    <hr class="uk-margin-remove">
</div>
<!--ARTICLE-->
<h2 class="uk-heading-line uk-text-center"><span>Form Permintaan Informasi</span></h2>

@if(isset($flag) && $flag === 1)
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Terima kasih telah mengisi formulir permintaan informasi</p>
</div>
@endif
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
                <label class="uk-form-label" for="form-stacked-select" required>Kategori Pemohon</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="form-stacked-select" name="kategori_pemohon">
                        <option value="Perorangan">Perorangan</option>
                        <option value="Lembaga / Organisasi">Lembaga / Organisasi</option>
                    </select>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Nama Pemohon</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="nama">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-label">Jenis Kelamin</div>
                <div class="uk-form-controls">
                    <label><input class="uk-radio" type="radio" name="jeniskelamin" value="pria">Pria</label>
                    <label><input class="uk-radio" type="radio" name="jeniskelamin" value="wanita">Wanita</label>
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
                    <input class="uk-input" id="form-stacked-text" type="number" name="nik">
                </div>
            </div>
            <div class="form-group">
                <label class="uk-form-label" for="form-stacked-text">Scan KTP</label>
                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true">
                        <input type="file" onchange="browseFile(this)" name="file_ktp">
                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                    </div>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Scan Akta</label>
                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true">
                        <input type="file" onchange="browseFile(this)" name="file_akta">
                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
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
                <label class="uk-form-label" for="form-stacked-text">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="email" name="email">
                </div>
            </div>
            @php
                $today = date("Ymd");
                $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
                $value = $today . $rand;
                //var_dump($value);
            @endphp
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" name="kode_permohonan" value="{{ $value }}" hidden>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Informasi Yang Diminta</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" name="rincian"></textarea>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Alasan Permintaan Informasi</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" name="tujuan"></textarea>
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
                    <select class="uk-select" id="form-stacked-select" name="tindak_lanjut">
                        <option value="Telepon">Telepon</option>
                        <option value="Fax">Fax</option>
                        <option value="Email">Email</option>
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
                        <button class="uk-button uk-button-primary" type="submit">Kirim Permintaan</button>
                        </div>
                    </div>
        </form>

    </div>
</section>

@include('frontend.inc.footer')
