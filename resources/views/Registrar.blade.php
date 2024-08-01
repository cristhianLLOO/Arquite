<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/butons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <form class="form_container" method="POST" action="/register">
        @csrf <!-- Token de seguridad para formularios en Laravel -->
        <div class="title_container">
            <p class="title">Registrar</p>
        </div>

        <div class="input_container">
            <label class="input_label" for="full_name">Nombre </label>
            <i style='font-size:24px' class='fas'>&#xf406;</i>
            <input placeholder="Nombre Completo" title="Nombre Completo" name="full_name" type="text" class="input_field" id="full_name">
        </div>

        <div class="input_container">
            <label class="input_label" for="last_name">Apellidos</label>
            <i style='font-size:24px' class='fas'>&#xf406;</i>
            <input placeholder="Apellidos" title="Apellidos" name="last_name" type="text" class="input_field" id="last_name">
        </div>

        <div class="input_container">
            <label class="input_label" for="email">Correo Electrónico</label>
            <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg" class="icon">
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#141B34" d="M7 8.5L9.94202 10.2394C11.6572 11.2535 12.3428 11.2535 14.058 10.2394L17 8.5"></path>
                <path stroke-linejoin="round" stroke-width="1.5" stroke="#141B34" d="M2.01577 13.4756C2.08114 16.5412 2.11383 18.0739 3.24496 19.2094C4.37608 20.3448 5.95033 20.3843 9.09883 20.4634C11.0393 20.5122 12.9607 20.5122 14.9012 20.4634C18.0497 20.3843 19.6239 20.3448 20.7551 19.2094C21.8862 18.0739 21.9189 16.5412 21.9842 13.4756C22.0053 12.4899 22.0053 11.5101 21.9842 10.5244C21.9189 7.45886 21.8862 5.92609 20.7551 4.79066C19.6239 3.65523 18.0497 3.61568 14.9012 3.53657C12.9607 3.48781 11.0393 3.48781 9.09882 3.53656C5.95033 3.61566 4.37608 3.65521 3.24495 4.79065C2.11382 5.92608 2.08114 7.45885 2.01576 10.5244C1.99474 11.5101 1.99475 12.4899 2.01577 13.4756Z"></path>
            </svg>
            <input placeholder="correo@dominio.com" title="Correo Electrónico" name="email" type="email" class="input_field" id="email">
        </div>

        <div class="input_container">
            <label class="input_label" for="phone">Teléfono</label>
            <i class="material-icons">&#xe0b0;</i>
            <input placeholder="Número de Teléfono" title="Teléfono" name="phone" type="tel" class="input_field" id="phone">
        </div>

        <div class="input_container">
            <label class="input_label" for="password">Contraseña</label>
            <i style='font-size:24px' class='fas'>&#xf502;</i>
            <input placeholder="Min. 8 caracteres" title="Contraseña" name="password" type="password" class="input_field" id="password">
        </div>
        
        <br>
        <button type="submit">
            <div class="svg-wrapper-1">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                    </svg>
                </div>
            </div>
            <span>Enviar</span>
        </button>
    </form>
</body>
</html>
