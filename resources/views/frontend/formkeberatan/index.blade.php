@extends('frontend.layout.layout')
@include('frontend.inc.header')
<!--/HEADER-->
<div class="uk-container uk-container-small">
    <hr class="uk-margin-remove">
</div>
<!--ARTICLE-->
<h2 class="uk-heading-line uk-text-center"><span>Form Keberatan Atas Permohonan Informasi</span></h2>
<section class="uk-section uk-article">
    <div class="uk-container uk-container-small">
        <form class="uk-grid-small" uk-grid>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="form-stacked-text">Nomor NIK Pemohon </label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="number">
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="form-stacked-text">Nomor NIK Pemohon </label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="number">
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="form-stacked-text">Nomor NIK Pemohon </label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="number">
                </div>
            </div>
            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="form-stacked-text">Nomor NIK Pemohon </label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="number">
                </div>
            </div>
            <div>{!! NoCaptcha::display(['data-theme' => 'light','data-size'=>'normal']) !!}</div>
                            @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                        <div class="uk-margin">
                        <button class="uk-button uk-button-primary">Kirim Permintaan</button>
                        </div>
        </form>

    </div>
</section>

@include('frontend.inc.footer')
