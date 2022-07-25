    <div class="smol-box">
        <h2>BUSCA UNA CUENTA</h2>
        <!-- Selección de la tabla en donde se filtrara la búsqueda. -->

            <div class="contenedor-inputs">
                <select class="input-100" name="table">
                    <option value="<?php if(isset($_SESSION['state']['navegate'])){echo $_SESSION['state']['navegate'];}?>">-</option>
                    <option value="`login`">Usuarios registrados</option>
                    <option value="`user-record`">Registros de operaciones</option>
                </select>
                <input class="btn-enviar input-100" type="submit" formaction="admin.php" value="Seleccionar">
            </div>

        <?php
        #Mostrar campos según la tabla seleccionada.
            if($_SESSION['state']['navegate']=="`login`"){
                ?>
                <div class="contenedor-inputs">
                    <input class="input-48" type="text" name="fname" placeholder="Nombre">
                    <input class="input-48" type="text" name="lname" placeholder="Apellido">
                </div>
                <input class="input-100" type="email" name="email" placeholder="Correo electrónico">
                <div class="contenedor-inputs">
                    <input class="input-48" type="number" name="id-user" placeholder="Id de usuario">
                    <select class="input-48" name="admin">
                        <option value=""></option>
                        <option value="false">Usuario</option>
                        <option value="1">Administrador</option>
                    </select>
                </div>
                <?php
            }   
            if($_SESSION['state']['navegate']=="`user-record`"){
                ?>
                <div class="contenedor-inputs">
                    <input class="input-48" type="number" name="id-record" placeholder="Id de registro">
                    <input class="input-48" type="number" name="id-user" placeholder="Id de usuario">
                </div>
                <input class="input-100" type="date" name="date">
                <?php
            }
            ?>
            <input class="btn-enviar input-100" formaction="admin.php" type="submit" value="Buscar">
            <?php
        ?>
    </div>

<div>
    <?php
        include("filter-engine.php");
    ?>
</div>


