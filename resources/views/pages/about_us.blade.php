@extends('frontend.layout.layout')
		<!--HEADER-->
@include('frontend.inc.header')
		<!--/HEADER-->
		<div class="uk-container uk-container-small">
			<hr class="uk-margin-remove">
		</div>
	<!--ARTICLE-->

    <section class="uk-section uk-article">
        <div class="uk-container uk-container-small">
            <h2 class="uk-text-bold uk-h1 uk-margin-remove-adjacent uk-margin-remove-top">{{ $page->title }}</h2>
            <p class="uk-text-lead">{!! $page->content !!}</p>

        </div>
    </section>
@include('frontend.inc.footer')
