<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label for="email">Correo Electrónico</label>
        <input id="email" name="email" type="email" required autofocus>
        <button type="submit">Enviar enlace de restablecimiento</button>
    </form>
</body>
</html>
