<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon-pontianak.png') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pontianak') }}</title>
		<!-- CSS FILES -->
		<link rel="stylesheet" type="text/css" href="css/uikit.css">
		<link rel="stylesheet" type="text/css" href="css/marketing.css">
        <style>

.informasi-item {
  display: block;
  background: #FFF;
  padding-top: 20px;
  padding-bottom: 0px;
  height: 100%;
  -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  -webkit-transition: .35s ease-in-out;
  -o-transition: .35s ease-in-out;
  transition: .35s ease-in-out;
}

.informasi-item > img {
  display: block;
  height: 80px;
  margin-left: auto;
  margin-right: auto;
}

.informasi-item:hover {
  background: #015198;
  text-decoration: none;
}

.informasi-item:hover > h4 {
  color: #FFF;
}

        </style>
	</head>
	<body>
        <!--HEADER-->
        <header id="header" style="background-color: #fff; border-bottom: 4px solid #47a3da;" data-uk-sticky="cls-active: uk-background-primary uk-box-shadow-medium; top: 100vh; animation: uk-animation-slide-top">
			<div class="uk-container">
				<nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item uk-padding-remove-horizontal">
                            <a title="Logo" href=""><img src="{{ asset ('img/ppid1.png') }}" alt="Logo" width="300px" height="80px"></a>
                        </div>
                    </div>
                    <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav uk-visible@s">
                            <li class="uk-active uk-visible@m"><a href="{{ route('home') }}" data-uk-icon="home"></a></li>
                            @foreach(\Backpack\MenuCRUD\app\Models\MenuItem::getTree() as $item)
                            @if($item->children->isEmpty())
                            <li>
                                <a href="{{$item->url()}}">
                                    <span>{{$item->name}}</span>
                                </a>
                            </li>
                        @else
                        <li class="uk-parent">
                            <a href="{{$item->url()}}" data-uk-icon="chevron-down">
                                <span>{{$item->name}}</span>
                            </a>
                            <div class="uk-navbar-dropdown">
                                @foreach($item->children as $i => $child)
                               <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li>
                                            <a href="{{$child->url()}}"  @if ($child->children->isNotEmpty()) data-uk-icon="chevron-down" @endif>
                                                <span>{{$child->name}}</span>
                                            </a>
                                            @if ($child->children->isNotEmpty())

                                            <div class="uk-nav-sub uk-navbar-dropdown">
                                                @foreach ($child->children as $child)

                                            <ul class="uk-nav uk-navbar-dropdown-nav">

                                                    <li>
                                                    <a href="{{ $child->url() }}" >{{ $child->name }}</a>
                                                    </li>

                                            </ul>
                                            @endforeach
                                            </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            </li>

                        @endif
                        @endforeach
                        </ul>
                        <a href="{{ route('backpack.auth.login') }}"><button class="uk-button uk-button-primary uk-button-small">Login</button></a>
                    </div>
                </nav>
			</div>
		</header>

      <!-- HERO -->
		<section class="uk-section uk-section-small">
			<div class="uk-container">
				<div data-uk-slider="center: true ; autoplay: true">
					<div class="uk-position-relative">
						<div class="uk-slider-container">
							<ul class="uk-slider-items uk-grid">
								<li>
									<div class="uk-panel">
										<img src="img/slider/slider-1.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="uk-panel">
										<img src="img/slider/slider-2.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="uk-panel">
										<img src="img/slider/slider-3.jpg" alt="">
									</div>
								</li>
								<li>
									<div class="uk-panel">
										<img src="img/slider/slider-4.jpg" alt="">
									</div>
								</li>
							</ul>
						</div>
						<div class="uk-hidden@l uk-light">
							<a class="uk-position-center-left uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
						<div class="uk-visible@l">
							<a class="uk-position-center-left-out uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
							<a class="uk-position-center-right-out uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
						</div>
					</div>
                    <div class="uk-position-bottom-center uk-position-medium uk-position-z-index uk-text-center">
                        <a href="#content" data-uk-scroll="duration: 500" data-uk-icon="icon: arrow-down; ratio: 2"></a>
                    </div>
					<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"><li></li></ul>
				</div>
		</section>
        <section id="content" class="uk-section uk-section-default">

			<div class="uk-container uk-container-xsmall uk-text-center uk-section uk-padding-remove-top">
				<h2 class="uk-margin-remove uk-h1">Informasi Publik</h2>
			</div>
            <div class="uk-container">
				<header class="uk-text-center">
					<p class="uk-width-1 uk-margin-auto">
                        Setiap Badan Publik mempunyai kewajiban untuk membuka akses atas Informasi Publik yang berkaitan dengan Badan Publik tersebut untuk masyarakat luas. Lingkup Badan Publik dalam Undang-undang ini meliputi lembaga eksekutif, yudikatif, legislatif, serta penyelenggara negara lainnya yang mendapatkan dana dari Anggaran Pendapatan dan Belanja Negara (APBN)/Anggaran Pendapatan dan Belanja Daerah (APBD) dan mencakup pula organisasi nonpemerintah, baik yang berbadan hukum maupun yang tidak berbadan hukum, seperti lembaga swadaya masyarakat, perkumpulan, serta organisasi lainnya yang mengelola atau menggunakan dana yang sebagian atau seluruhnya bersumber dari APBN/APBD, sumbangan masyarakat, dan/atau luar negeri.
					</p>
				</header>
            </div>
        </section>
		<!-- HERO -->
			<!-- FEATURED -->
		<div class="uk-container">
			<h4 class="uk-heading-line uk-text-bold"><span>Info Terbaru</span></h4>
			<div data-uk-slider="velocity: 5">
				<div class="uk-position-relative">
					<div class="uk-slider-container">
						<ul class="uk-slider-items uk-child-width-1-2@m uk-grid uk-grid-medium news-slide">
                            @if(count($data_berita) > 0)
                            @foreach($data_berita as $berita)
							<li>
								<div class="uk-card uk-card-default uk-card-body uk-card-small uk-flex uk-flex-middle uk-card-default uk-border-rounded">
									<div class="uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid>
										<div class="uk-width-1-3@s uk-width-2-5@m uk-height-1-1">
											<img src="{{ $berita->image }}" alt="">
										</div>
										<div class="uk-width-2-3@s uk-width-3-5@m">
											<h3 class="uk-card-title uk-margin-small-top uk-margin-remove-bottom">
											<a class="uk-link-reset" href="{{ route('berita.show',$berita->slug) }}" class="uk-link-reset">{{$berita->title}}</a>
											</h3>
											<span class="uk-article-meta">Posted on {{date("d F Y", strtotime($berita->created_at))}}</span>
											<p class="uk-margin-small">{{ strtok(strip_tags(htmlspecialchars_decode($berita->content)), ".") }}.</p>
										</div>
									</div>
								</div>
							</li>
                            @endforeach
                            {{$data_berita->links()}}
                          @else
                            <p>Belum ada berita.</p>
                          @endif
                            </ul>
					</div>
					<div class="uk-hidden@l uk-light">
						<a class="uk-position-center-left uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
						<a class="uk-position-center-right uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
					</div>
					<div class="uk-visible@l">
						<a class="uk-position-center-left-out uk-position-small" href="#" data-uk-slidenav-previous data-uk-slider-item="previous"></a>
						<a class="uk-position-center-right-out uk-position-small" href="#" data-uk-slidenav-next data-uk-slider-item="next"></a>
					</div>
				</div>
				<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"><li></li></ul>
			</div>
		</div>
		<!-- /FEATURED -->

		<!-- BOTTOM -->
		<section class="uk-section uk-section-default">

			<div class="uk-container uk-container-xsmall uk-text-center uk-section uk-padding-remove-top">
				<h2 class="uk-margin-remove uk-h1">PPID Pontianak</h2>
			</div>
			<div class="uk-container uk-container-small">
                <div class="uk-grid-large uk-child-width-1-3@s uk-flex-center uk-text-center" uk-grid>
                    <div>
                        <a class="informasi-item" href="{{ url('/tata-cara-memperoleh-informasi') }}">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/book.png" data-uk-img alt="Image" width="80px" height="80px">
						<h4 class="uk-text-bold">Tata Cara Memperoleh Informasi</h4></a>
					</div>
                    <div>
                        <a class="informasi-item" href="{{ route('permintaan.index') }}">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/checklist.png" data-uk-img alt="Image" width="80px" height="80px">
						<h4 class="uk-text-bold">Form Permintaan Informasi</h4></a>
					</div>
                    <div>
                        <a class="informasi-item" href="#">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/customer.png" data-uk-img alt="Image" width="80px" height="80px">
						<h4 class="uk-text-bold">Form Pernyataan Keberatan</h4></a>
					</div>
                    <div>
                        <a class="informasi-item" href="#">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/newspaper.png" data-uk-img alt="Image" width="80px" height="80px">
                        <h4 class="uk-text-bold">Daftar Informasi Publik</h4></a>
					</div>
                    <div>
                        <a class="informasi-item" href="https://data.pontianakkota.go.id/">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="img/shipping-and-delivery.png" data-uk-img alt="Image" width="80px" height="80px">
                        <h4 class="uk-text-bold">Satu Data</h4></a>
					</div>
				</div>
			</div>
           </section>
		<!-- BOTTOM -->
        <div id="content" data-uk-height-viewport="expand: true">
			<div class="uk-container uk-text-center">
                <h4 class="uk-heading-line uk-text-bold"><span>Statistik Pengunjung</span></h4>
				<div class="uk-grid uk-grid-divider uk-grid-medium uk-child-width-1-2 uk-child-width-1-4@l uk-child-width-1-5@xl" data-uk-grid>
					<div>
						<span class="uk-text-small"><span class="uk-margin-small-right uk-text-primary"></span>Pengunjung Hari Ini</span>
						<h1 class="uk-heading-primary uk-margin-remove  uk-text-primary">{{ $visitor_today }}</h1>

					</div>
					<div>
						<span class="uk-text-small"><span class="uk-margin-small-right uk-text-primary"></span>Pengunjung Bulan Ini</span>
						<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">{{ $visitor_month }}</h1>

					</div>
					<div>

						<span class="uk-text-small"><span class="uk-margin-small-right uk-text-primary"></span>Pengunjung Tahun Ini</span>
						<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">{{ $visitor_year }}</h1>

					</div>
					<div>

						<span class="uk-text-small"><span class="uk-margin-small-right uk-text-primary"></span>Total Pengunjung</span>
						<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">{{ $visitor_all }}</h1>

					</div>
				</div>
            </div>
        </div>
		<!-- LOGOS -->

		<div class="uk-section uk-section-small uk-padding-top">

			<div class="uk-container">
            <h4 class="uk-heading-line uk-text-bold"><span>Link Terkait</span></h4>
            <div uk-slider="sets: true; autoplay: true">

            <div class="uk-position-relative">

                <div class="uk-slider-container uk-light">
                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr.indonesia.jpg" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr_lapor-2017.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr_sikedip_2017.png" ddata-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr_sipikalbar.png"  data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-komisi-informasi-kalbar.png"  data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-komisi-informasi-pusat.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-bengkayangkab.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-ketapangkab.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-kkukab.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-kotapontianak.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-mempawahkab.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-singkawangkota.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-ppid-sintangkab.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/bnr-tpad-2016.png" data-uk-img alt="Image"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/link-terkait/kalbarprov.png" data-uk-img alt="Image"></a>
                                    </li>
                    </ul>
                </div>

                <div class="uk-hidden@s uk-light">
                    <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>

                <div class="uk-visible@s">
                    <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

        </div>
            </div>
        </div>
        </div>
		<!-- /LOGOS -->
		<!-- FOOTER -->
		<footer class="uk-section uk-section-secondary uk-padding-remove-bottom">
			<div class="uk-container">
				<div class="uk-grid uk-grid-large" data-uk-grid>
					<div class="uk-width-1-2@m">
						<h5>PPID KOTA PONTIANAK</h5>
                        <ul class="uk-list">
							<li>Telpon : (0561) 733041</li>
							<li>Email : kominfo@pontianakkota.go.id</li>
                        </ul>
						<div>
							<a href="" class="uk-icon-button" data-uk-icon="twitter"></a>
							<a href="" class="uk-icon-button" data-uk-icon="facebook"></a>
							<a href="" class="uk-icon-button" data-uk-icon="instagram"></a>
						</div>
					</div>
					<div class="uk-width-1-2@m">
						<img src="{{ asset ('img/ppid4.png') }}" alt="Logo" width="400px" height="100px">
					</div>
					</div>

				</div>
			</div>

			<div class="uk-text-center uk-padding uk-padding-remove-horizontal">
				<span class="uk-text-small uk-text-muted">© 2019 PPID Kota Pontianak</span>
			</div>
		</footer>
		<!-- /FOOTER -->

		<!-- JS FILES -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@latest/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@latest/dist/js/uikit-icons.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/cbpHorizontalMenu.min.js"></script>
		<script>
			$(function() {
				cbpHorizontalMenu.init();
			});
		</script>
        <script>
            $.post( "{{url('api/visitor')}}", function( data ) {
            });
        </script>
	</body>
</html>
