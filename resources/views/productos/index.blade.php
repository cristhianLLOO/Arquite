<!-- resources/views/productos/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa; /* Fondo claro */
            color: #333; /* Texto oscuro */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente */
        }
        .navbar {
            background-color: #2c3e50; /* Azul oscuro */
            color: #fff; /* Texto blanco */
        }
        .navbar-brand, .navbar-text {
            color: #fff; /* Color de texto y enlaces del navbar */
        }
        .form-control {
            width: 300px; /* Ancho del campo de búsqueda */
        }
        .jumbotron {
            background: linear-gradient(to right, #3498db, #2980b9); /* Degradado azul */
            color: #fff; /* Texto blanco */
            padding: 2rem 1rem; /* Espaciado interior */
            margin-bottom: 2rem; /* Margen inferior */
            border-radius: 1rem; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
            animation: fadeIn 2s; /* Animación */
            text-align: center; /* Centrar texto */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .table {
            background-color: #ffffff; /* Fondo de la tabla */
            border-radius: 1rem; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Sombra */
            overflow: hidden; /* Para mantener los bordes redondeados */
            animation: slideUp 1s ease-out; /* Animación */
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .table th, .table td {
            border: none; /* Sin bordes internos */
        }
        .thead-dark th {
            background-color: #2c3e50; /* Fondo de encabezado de tabla */
            color: #fff; /* Color de texto del encabezado de tabla */
        }
        .btn-outline-light {
            border-color: #2c3e50; /* Color del borde del botón */
            color: #2c3e50; /* Color del texto del botón */
        }
        .btn-outline-light:hover {
            background-color: #2c3e50; /* Fondo del botón al pasar el mouse */
            color: #fff; /* Color del texto del botón al pasar el mouse */
        }

        .input {
            max-width: 190px;
            padding: 12px;
            border: none;
            border-radius: 4px;
            box-shadow: 2px 2px 7px 0 rgb(0, 0, 0, 0.2);
            outline: none;
            color: dimgray;
        }

        .input:invalid {
            animation: justshake 0.3s forwards;
            color: red;
        }

        @keyframes justshake {
            25% {
                transform: translateX(5px);
            }

            50% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }

            100% {
                transform: translateX-(5px);
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="ruta_a_tu_logo.png" alt="Logo de la empresa" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mx-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar productos..." aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Control de Productos</h1>
            <p class="lead">Lista de productos del cliente.</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>{{ $producto->cantidad }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
