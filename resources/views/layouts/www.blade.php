<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Default') - Kingston Developers</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/web.css') }}">
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
    </script>

</head>
<body>
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="/">
            <img src="/img/logo_k.svg" style="height: 100%; max-width: 30px;">
        </a>
        <a class="py-2 d-none d-md-inline-block" href="/events">Events</a>
        <a class="py-2 d-none d-md-inline-block" href="/jobs">Job Board</a>
        <a class="py-2 d-none d-md-inline-block" target="_blank" href="http://slack.kingstondevelopers.ca"><i class="fa fa-slack"></i> Slack</a>
    </div>
</nav>

@yield('content')
</body>
</html>
