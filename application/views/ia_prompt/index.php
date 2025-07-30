<h2>Generador de Prompts de IA para Reglamentos</h2>
<form method="post" action="<?php echo site_url('IaPrompt/generar_prompt'); ?>">
    <label>Selecciona Reglamento:</label>
    <select name="idreglamento">
        <?php foreach($reglamentos as $r): ?>
            <option value="<?= $r->idreglamento ?>"><?= $r->nombre ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Artículo (ej: 1, 2, 3):</label>
    <input type="text" name="numeroarticulo" required><br>

    <button type="submit">Generar Prompt IA</button>
</form>

