<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Prompts de IA para Reglamentos</title>
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
        <h2 class="mb-4">Generador de Prompts de IA para Reglamentos</h2>
        <form method="post" action="<?php echo site_url('Agenteia/generar_prompt'); ?>">
            <div class="form-group">
                <label for="idreglamento">Selecciona Reglamento:</label>
                <select name="idreglamento" id="idreglamento" class="form-control">
                    <?php foreach($reglamentos as $r): ?>
                        <option value="<?= $r->idreglamento ?>"><?= htmlspecialchars($r->nombre) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="numeroarticulo">Número de Artículo (ej: 1, 2, 3):</label>
                <input type="text" name="numeroarticulo" id="numeroarticulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prompt_usuario">Instrucción para la IA:</label>
                <textarea name="prompt_usuario" id="prompt_usuario" class="form-control" rows="3" placeholder="Ej: Resume el contenido en un párrafo conciso." required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Generar Prompt IA</button>
        </form>
    </div>
</body>
</html>
