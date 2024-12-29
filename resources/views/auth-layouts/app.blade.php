<!DOCTYPE html>

<html lang="en">
	<head><base href="../../"/>
		<title>Sportshup App - @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="description" content="Sportshub" />
		<meta name="keywords" content="Sportshub" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Sportshub" />
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="app-blank">
		<script>
            var defaultThemeMode = "light";
            var themeMode;
            if ( document.documentElement ){
                if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if ( localStorage.getItem("data-bs-theme") !== null ) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
        </script>
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
							<a href="{{ route('home') }}" class="py-2 py-lg-20">
								<h1 class="text-white">Sportshub</h1>
							</a>
							<h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-5 pb-md-10">
                                {{ __('messages.welcome_to_sportshub')}}
                            </h1>
							<p class="d-none d-lg-block fw-semibold fs-2 text-white">
                            Sportshub'a hoş geldiniz! Favori sporlarınızı keşfedin, maçlara katılın ve yeni arkadaşlarla tanışın.
                            <br />
                            Sporu eğlenceyle birleştiren topluluğumuza katılmak için hemen başlayın!
                            </p>
						</div>
						<div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                             style="background-image: url(assets/media/sportshub.webp)"></div>
					</div>
				</div>
				@yield('content')
			</div>
		</div>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
        @yield('auth-specific-scripts')
	</body>
</html>
