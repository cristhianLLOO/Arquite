<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Bootstrap</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="jumbotron animate__animated animate__fadeIn">
            <h1 class="display-4">Bienvenido</h1>
            <p class="lead animate__animated animate__fadeInUp">Quiero: Aprender sobre nuevos materiales y productos para ofrecer mejores recomendaciones a los clientes.</p>
            <hr class="my-4">
            <p class="animate__animated animate__fadeInUp animate__delay-1s">Explora las últimas actualizaciones y tendencias en nuestro sitio.</p>
            <a class="btn btn-primary btn-lg animate__animated animate__fadeIn animate__delay-2s" href="#" role="button">Aprender más</a>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
