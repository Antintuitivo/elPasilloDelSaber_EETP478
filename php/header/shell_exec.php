<?php
if ($_POST['codes'] != 'Seleccionar'){
    $shell_comand = 'sh ..\..\shell';
    $shell_comand .= $_POST['codes'];
    $shell_result = shell_exec($shell_comand);
    if (isset($shell_result)){
            if ($shell_result)
            $message = "Relé accionado.";
            ?>
            <span class="message"><?php echo $message;?></span>
            <?php
    }else {
        $message = "Verificar resultado.";
        ?>
        <span class="error"><?php echo $message;?></span>
        <?php
    }
}
    if($_POST['codes'] != 'Seleccionar'){
        ?>
        <textarea class="input-100" name="input">
            <?php
                include '..\shell' . $_POST['codes'];
            ?>
        </textarea>
        <?php
    }
?>