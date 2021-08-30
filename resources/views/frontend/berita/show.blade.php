@include('frontend.layout.layout')
		<!--HEADER-->
@include('frontend.inc.header')
		<!--/HEADER-->
		<div class="uk-container uk-container-small">
			<hr class="uk-margin-remove">
		</div>
		<!--ARTICLE-->

		<section class="uk-section uk-article">
			<div class="uk-container uk-container-small">
				<h2 class="uk-text-bold uk-h1 uk-margin-remove-adjacent uk-margin-remove-top">{{ $data_berita->title }}</h2>
				<p class="uk-article-meta">Pada Tanggal {{date("d F Y", strtotime($data_berita->created_at))}}</p>
                <figure>
                    <img data-src="{{ $data_berita->image }}" width="800" height="300"  alt="Alt text" class="lazy" data-uk-img>
                </figure>
				<p class="uk-text-lead">{!! $data_berita->content !!}</p>

			</div>
		</section>
		<section class="uk-section uk-section-muted">
			<div class="uk-container">
				<h2 class="uk-text-bold">Berita Lainnya</h2>
				<div data-uk-slider="velocity: 5">
					<div class="uk-position-relative">
						<div class="uk-slider-container">
							<ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid uk-grid-medium">
                                @foreach($latest as $lat)
								<li>
									<!-- card -->

									<div>
										<div class="uk-card uk-card-default uk-card-small" style="box-shadow: none;">
											<div class="uk-card-media-top">
												<figure>
                                                    <img data-src="{{ $lat->image }}" width="100%" height="500px"  alt="Alt text" class="lazy" uk-img>
                                                </figure>
                                            </div>
											<div class="uk-card-header">
												<div class="uk-grid-small uk-flex-middle" data-uk-grid>
													<div class="uk-width-expand">
														<h6 class="uk-margin-remove-bottom uk-text-bold">Author Name</h6>
														<p class="uk-text-meta uk-margin-remove-top uk-text-small"><time datetime="2016-04-01T19:00">{{date("d F Y", strtotime($lat->created_at))}}</time></p>
													</div>
												</div>
											</div>
											<div class="uk-card-body">
												<h4 class="uk-margin-small-bottom uk-text-bold">{{ $lat->title }}</h4>
												<span class="uk-text-small">{{ strtok(strip_tags(htmlspecialchars_decode($lat->content)), ".") }}.</span>
												<a class="uk-button uk-button-text uk-text-bold uk-margin-small" href="">READ MORE</a>
											</div>
										</div>
									</div>

									<!-- /card -->
								</li>
                                @endforeach
							</ul>
						</div>
						<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">

						</ul>
						<div class="uk-hidden@m uk-light">
							<a class="uk-position-center-left uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
						<div class="uk-visible@m">
							<a class="uk-position-center-left-out uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right-out uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- BOTTOM BAR -->
		<div class="uk-section uk-section-xsmall uk-section-default uk-position-bottom uk-position-fixed" style="border-top: 1px solid #f2f2f2">
			<div class="uk-container uk-container-small uk-text-small">
				<div class="uk-grid" data-uk-grid>
					<div class="uk-width-expand">
						<a href="#" class="uk-link-reset"><span data-uk-icon="icon: arrow-right"></span> <strong>Berita Selanjutnya</strong>
						<span class="uk-visible@s">- Vivamus hendrerit tristique tortor vel ultricies</span></a>
					</div>
					<div class="uk-width-auto uk-text-right">
						<a href="#" class="uk-icon-link" data-uk-icon="icon: facebook"></a>
						<a href="#" class="uk-icon-link" data-uk-icon="icon: twitter"></a>
						<a href="#" class="uk-icon-link" data-uk-icon="icon: instagram"></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /BOTTOM BAR -->


        @include('frontend.inc.footer')
