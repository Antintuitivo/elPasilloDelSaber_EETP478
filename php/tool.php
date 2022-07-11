<div class="smol-box">    
    <h2>Comandar Raspberry</h2>
    <select class="input-100" name="codes">
        <option>Seleccionar</option>
        <option value="\test-a.sh">Prueba A</option>
        <option value="\test-b.sh">Prueba B</option>
        <option value="\test-c.sh">Prueba C</option>
        <option value="\script-off.sh">Desactivar</option>
        <option value="\script-on.sh">Activar</option>
        <option value="\script-timer.sh">Timer</option>
    </select>
    <input class="btn-enviar" type="submit" formaction="admin.php" value="Activar">
</div>
<?php
    include 'header/shell_exec.php';
?>
