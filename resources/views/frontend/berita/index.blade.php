@include('frontend.layout.layout')
@include('frontend.inc.header')

		<!--CONTENT-->
		<div class="uk-section uk-section-default">
			<div class="uk-container">
				<div class="uk-grid" data-ukgrid>
					<div class="uk-width-2-3@m">
						<h4 class="uk-heading-line uk-text-bold"><span>Berita Terbaru</span></h4>
                        @if(count($data_berita) > 0)
                        @foreach($data_berita as $berita)
                        <article class="uk-section uk-section-small uk-padding-remove-top">
							<header>
								<h2 class="uk-margin-remove-adjacent uk-text-bold uk-margin-small-bottom"><a href="{{ route('berita.show',$berita->slug) }}" class="uk-link-reset">{{$berita->title}}</a></h2>
								<p class="uk-article-meta">Posted on {{date("d F Y", strtotime($berita->created_at))}}</p>
							</header>
							<figure>
								<img data-src="{{ $berita->image }}" width="800" height="300"  alt="Alt text" class="lazy" data-uk-img>
							</figure>
							<p>{{ strtok(strip_tags(htmlspecialchars_decode($berita->content)), ".") }}.</p>
							<a href="{{ route('berita.show',$berita->slug) }}" title="Read More" class="uk-button uk-button-default uk-button-small">READ MORE</a>
							<hr>
						</article>
                        @endforeach
                        {{$data_berita->links()}}
                      @else
                        <p>Belum ada berita.</p>
                      @endif

					</div>
					<div class="uk-width-1-3@m">
						<h4 class="uk-heading-line uk-text-bold"><span>Archive</span></h4>
						<ul class="uk-list">
							<li><a href="">March</a></li>
							<li><a href="">February</a></li>
							<li><a href="">January</a></li>
							<li><a href="">December <small>(2017)</small></a></li>
							<li><a href="">November <small>(2017)</small></a></li>
							<li><a href="">October <small>(2017)</small></a></li>
							<li><a href="">September <small>(2017)</small></a></li>
							<li><a href="">August <small>(2017)</small></a></li>
						</ul>
						<h4 class="uk-heading-line uk-text-bold"><span>About Us</span></h4>
						<div class="uk-tile uk-tile-small uk-tile-muted uk-border-rounded">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in.
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/CONTENT-->

        @include('frontend.inc.footer')
