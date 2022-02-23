<!DOCTYPE html>
<html lang="{{ config("app.locale") ?? "en" }}">
<head>
    @include('templates.metadata')
</head>
<body>
    @yield('content')
</body>
</html>