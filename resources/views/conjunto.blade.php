<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @yield('estilos')
    <style>
        
    </style>
</head>

@yield('body')

<footer id="footer "class="bg-white p-4 footer-container">
        <div class="">
            <div class="row">
                <div class="col-md-4">
                    <!-- Reemplaza las imágenes de Instagram y Facebook con logos de alta calidad -->
                    <i class="fab fa-instagram social-logo"></i>
                </div>
                <div class="col-md-4">
                    <i class="fab fa-facebook social-logo"></i>
                </div>
                <div class="col-md-4">
                    <h4>Información de Contacto</h4>
                    <p>Correo: contacto@sirma.com.mx</p>
                    <p>Teléfono: +52 7711234567</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>