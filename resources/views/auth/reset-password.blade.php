<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">Correo Electrónico</label>
        <input id="email" name="email" type="email" required>
        <label for="password">Nueva Contraseña</label>
        <input id="password" name="password" type="password" required>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required>
        <button type="submit">Restablecer Contraseña</button>
    </form>
</body>
</html>
