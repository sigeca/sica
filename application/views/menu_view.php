<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Vertical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background-color: #202123;
            color: #fff;
            padding: 10px;
        }
        .sidebar a {
            text-decoration: none;
            color: #fff;
            padding: 10px 15px;
            display: block;
            border-radius: 4px;
            transition: background-color 0.2s ease-in-out;
        }
        .sidebar a:hover {
            background-color: #3c3c3c;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center py-3">Menú</h4>
        <a href="#inicio">Inicio</a>
        <a href="#funciones">Funciones</a>
        <a href="#configuracion">Configuración</a>
        <a href="#ayuda">Ayuda</a>
    </div>

    <div class="content">
        <h1>Bienvenido</h1>
        <p>Aquí va el contenido principal.</p>
    </div>
</body>
</html>

