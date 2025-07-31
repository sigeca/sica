<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de IA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mb-4">Respuesta generada por IA:</h3>
        <div class="card bg-light p-3">
            <p style="white-space: pre-wrap;"><?= htmlspecialchars($respuesta) ?></p>
        </div>
        <a href="<?= site_url('Agenteia') ?>" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>
