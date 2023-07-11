<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Rider
Product Version: 1.1.2
Purchase: https://keenthemes.com/products/rider-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/rider-html-pro/?page=authentication/sign-in/basic by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Feb 2023 10:03:12 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <meta name="description" content="Rider HTML Pro - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme"/>
    <meta name="keywords"
          content="Rider, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Rider HTML Pro - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/products/rider-html-pro"/>
    <meta property="og:site_name" content="Keenthemes | Rider HTML Pro"/>
    <link rel="canonical" href="https://preview.keenthemes.com/rider-html-pro"/>
    <link rel="shortcut icon" href="{{ asset('public/admin/assets/media/logos/favicon.ico') }}"/>

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('public/admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

    <!--Begin::Google Tag Manager -->
    {{--    <script>(function (w, d, s, l, i) {--}}
    {{--            w[l] = w[l] || [];--}}
    {{--            w[l].push({--}}
    {{--                'gtm.start':--}}
    {{--                    new Date().getTime(), event: 'gtm.js'--}}
    {{--            });--}}
    {{--            var f = d.getElementsByTagName(s)[0],--}}
    {{--                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';--}}
    {{--            j.async = true;--}}
    {{--            j.src =--}}
    {{--                '../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;--}}
    {{--            f.parentNode.insertBefore(j, f);--}}
    {{--        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>--}}
    <!--End::Google Tag Manager -->
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="auth-bg">
<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
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
<!--end::Theme mode setup on page load-->
<!--Begin::Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!--End::Google Tag Manager (noscript) -->

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px bg-primary positon-xl-relative">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <!--begin::Header-->
                <div class="d-flex flex-row-fluid flex-column flex-center text-center p-10 pt-lg-20">
                    <!--begin::Logo-->
                    <a href="index708f.html?page=index" class="py-9 mb-10">
                        <img alt="Logo" src="{{ asset('public/admin/assets/media/logos/logo-compact-light.svg') }}"
                             class="h-70px"/>
                    </a>
                    <!--end::Logo-->

                    <!--begin::Title-->
                    <h1 class="fw-bold fs-2qx pb-5 pb-md-10 text-white">
                        Welcome to Rider
                    </h1>
                    <!--end::Title-->

                    <!--begin::Description-->
                    <p class="text-white fw-semibold fs-2">
                        Discover Simply Amazing Admin Dashboard <br/>
                        With The Stunning Design System
                    </p>
                    <!--end::Description-->
                </div>
                <!--end::Header-->

                <!--begin::Illustration-->
                <div class="d-flex flex-row-auto flex-center">
                    <img src="{{ asset('public/admin/assets/media/illustrations/dozzy-1/2.png') }}" alt=""
                         class="h-200px h-lg-350px mb-10"/>
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--begin::Aside-->

        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">

                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"
                          data-kt-redirect-url="{{ route('login') }}" action="{{ route('login') }}">
                        @csrf

                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">
                                Sign In to Rider HTML Pro </h1>
                            <!--end::Title-->

                            <!--begin::Link-->
                            <div class="text-gray-400 fw-semibold fs-4">
                                New Here?

                                <a href="{{ route('register') }}" class="link-primary fw-bold">
                                    Create an Account
                                </a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bold text-dark">Email</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                                   autocomplete="off"/>

                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bold text-dark fs-6 mb-0">Password</label>
                                <!--end::Label-->

                                <!--begin::Link-->
                                <a href="index08d9.html?page=authentication/sign-in/password-reset"
                                   class="link-primary fs-6 fw-bold">
                                    Forgot Password ?
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password"
                                   name="password" autocomplete="off"/>
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
            <span class="indicator-label">
                Continue
            </span>

                                <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
                            </button>


                            <!--end::Submit button-->

                            {{--                            <!--begin::Separator-->--}}
                            {{--                            <div class="text-center text-muted text-uppercase fw-bold mb-5">or</div>--}}
                            {{--                            <!--end::Separator-->--}}

                            {{--                            <!--begin::Google link-->--}}
                            {{--                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">--}}
                            {{--                                <img alt="Logo"--}}
                            {{--                                     src="{{ asset('public/admin/assets/media/svg/brand-logos/google-icon.svg') }}"--}}
                            {{--                                     class="h-20px me-3"/>--}}
                            {{--                                Continue with Google--}}
                            {{--                            </a>--}}
                            {{--                            <!--end::Google link-->--}}

                            {{--                            <!--begin::Google link-->--}}
                            {{--                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">--}}
                            {{--                                <img alt="Logo"--}}
                            {{--                                     src="{{ asset('public/admin/assets/media/svg/brand-logos/facebook-4.svg') }}"--}}
                            {{--                                     class="h-20px me-3"/>--}}
                            {{--                                Continue with Facebook--}}
                            {{--                            </a>--}}
                            {{--                            <!--end::Google link-->--}}

                            {{--                            <!--begin::Google link-->--}}
                            {{--                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">--}}
                            {{--                                <img alt="Logo"--}}
                            {{--                                     src="{{ asset('public/admin/assets/media/svg/brand-logos/apple-black.svg') }}"--}}
                            {{--                                     class="theme-light-show h-20px me-3"/>--}}
                            {{--                                <img alt="Logo"--}}
                            {{--                                     src="{{ asset('public/admin/assets/media/svg/brand-logos/apple-black-dark.svg') }}"--}}
                            {{--                                     class="theme-dark-show h-20px me-3"/>--}}
                            {{--                                Continue with Apple--}}
                            {{--                            </a>--}}
                            {{--                            <!--end::Google link-->--}}
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                <!--begin::Links-->
                <div class="d-flex flex-center fw-semibold fs-6">
                    {{--                    <a href="https://keenthemes.com/" class="text-muted text-hover-primary px-2"--}}
                    {{--                       target="_blank">About</a>--}}

                    {{--                    <a href="https://devs.keenthemes.com/" class="text-muted text-hover-primary px-2" target="_blank">Support</a>--}}

                    {{--                    <a href="https://keenthemes.com/products/rider-html-pro" class="text-muted text-hover-primary px-2"--}}
                    {{--                       target="_blank">--}}
                    {{--                        Purchase--}}
                    {{--                    </a>--}}
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Main-->


<!--begin::Javascript-->
<script>
    var hostUrl = "{{ asset('public/admin/assets/index.html') }}";        </script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('public/admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->


<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('public/admin/assets/js/custom/authentication/sign-in/general.js') }}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/rider-html-pro/?page=authentication/sign-in/basic by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Feb 2023 10:03:13 GMT -->
</html>
