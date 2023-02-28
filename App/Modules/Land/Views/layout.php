<?php defined('BASE') or header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Yusuf Mambrasar">
  <meta name="generator" content="UchupxEngine">
  <title>{% var title %}</title>
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="{{ SiteUrl('assets/favicons/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ SiteUrl('assets/favicons/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ SiteUrl('assets/favicons/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ SiteUrl('assets/favicons/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ SiteUrl('assets/favicons/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ SiteUrl('assets/favicons/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ SiteUrl('assets/favicons/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ SiteUrl('assets/favicons/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ SiteUrl('assets/favicons/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ SiteUrl('assets/favicons/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ SiteUrl('assets/favicons/favicon-32x32.pn') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ SiteUrl('assets/favicons/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ SiteUrl('assets/favicons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ SiteUrl('assets/favicons/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ SiteUrl('assets/favicons/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

  <!-- Bootstrap core CSS -->
  <link href="{{ SiteUrl('assets/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body>
  <main>
    {% var content %}
  </main>
  <footer class="pt-3 text-muted text-center">
  <small>© Yusuf Mambrasar {{ date('Y') }}</small>
  </footer>
  <script src="{{ SiteUrl('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>