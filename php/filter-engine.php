<?php
#Definición de variables según tabla seleccionada.
    $table = $_SESSION['state']['navegate'];

    if ($table=="`login`"){
        if (isset($_POST['fname'])) {
            $fname = $_POST['fname'];
        }
        if (isset($_POST['lname'])) {
            $lname = $_POST['lname'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['id-user'])) {
            $id_user = $_POST['id-user'];
        }
        if (isset($_POST['admin'])) {
            $admin = $_POST['admin'];
        }
    }
    if ($table=="`user-record`"){
        if (isset($_POST['id-record'])) {
            $id_record = $_POST['id-record'];
        }
        if (isset($_POST['id-user'])) {
            $id_user = $_POST['id-user'];
        }
        if (isset($_POST['date'])) {
            $date = $_POST['date'];
        }
    }
?>

    <!-- <input class="input-48" type="number" name="records" placeholder="Entradas">-->
    <?php
        #Seleccionar valores para ordenar según la tabla.
        if($table == "`user-record`"){
            ?>
            <select class="input-48" name="order">
                <option class="select-items" value="None">Ordenar por</option>
                <option class="select-items" value="`id-record`">ID Registro</option>
                <option class="select-items" value="`id-user`">ID Usuario</option>
                <option class="select-items" value="`record-date`">Fecha</option>
                <option class="select-items" value="`record-login`">Ingreso</option>
                <option class="select-items" value="`record-logout`">Egreso</option>
            </select>
            <?php
        } else {
            ?>
            <select class="input-48" name="order">
                <option class="select-items" value="None">Ordenar por</option>
                <option class="select-items" value="`id-user`">ID Usuario</option>
                <option class="select-items" value="`user-email`">Nombre</option>
                <option class="select-items" value="`user-fname`">Apellido</option>
                <option class="select-items" value="`user-lname`">Email de usuario</option>
                <option class="select-items" value="`user-admin`">Tipo de usuario</option>
            </select>
            <?php
        }
    ?>
    <input type="submit" value="Ordenar" class="btn-enviar">

<?php
#Preparar la orden SQL que tomará las variables definidas, o no en caso de estar vacias.
    $query = "SELECT * FROM $table";
    if (!empty($fname)||!empty($admin)||!empty($lname)||!empty($email)||!empty($date)||!empty($id_user)||!empty($id_record)||!empty($date)){
        $query .= " WHERE (";

        #Consulta para tabla "`login`".
        if ($table=="`login`"){
            if(!empty($admin)){
                $query .= "`user-admin` = '$admin'";
            }
            if(!empty($admin) && !empty($fname)){
                $query .= " and ";
            }
            if(!empty($fname)){
                $query .= "`user-fname` = '$fname'";
            }
            if((!empty($fname)||!empty($admin))&&!empty($lname)){
                $query .= " and ";
            }
            if(!empty($lname)){
                $query .= "`user-lname` = '$lname'";
            }
            if((!empty($fname)||!empty($admin)||!empty($lname))&&!empty($email)){
                $query .= " and ";
            }
            if(!empty($email)){
                $query .= "`user-email` = '$email'";
            }
            if((!empty($fname)||!empty($admin)||!empty($lname)||!empty($email)) && !empty($date)){
                $query .= " and ";
            }
            if(!empty($date)){
                $query .= "`record-date` = '$date'";
            }
            if((!empty($fname)||!empty($admin)||!empty($lname)||!empty($email) || !empty($date)) && !empty($id_user)){
                $query .= " and ";
            }
            if(!empty($id_user)){
                $query .= "`id-user` = '$id_user'";
            }
            $query .= ")";
        }

        #Consulta para tabla "`user-record`".
        if ($table=="`user-record`"){
            if(!empty($id_record)){
                $query .= "`id-record` = '$id_record'";
            }
            if(!empty($id_record) && !empty($id_user)){
                $query .= " and ";
            }
            if(!empty($id_user)){
                $query .= "`id-user` = '$id_user'";
            }
            if((!empty($id_record)||!empty($id_user))&&!empty($date)){
                $query .= " and ";
            }
            if(!empty($date)){
                $query .= "`record-date` = '$date'";
            }
            $query .= ")";
        }
    }
    
    if (isset($_POST['order'])){
        $order = $_POST['order'];
        if ($order != "None"){
            $order_by = "ORDER BY " . $order;
            $query .= $order_by;
        }
    }
?>
<!-- Show filtered information. -->
<div style="overflow: auto; max-height: 400px;">
<table>
    <?php
        #Seleccionar nombres de columnas según la tabla.
        if($table == "`user-record`"){
            ?>
            <tr>
                <th class="table-header">ID Regitro</th>
                <th class="table-header">ID Usuario</th>
                <th class="table-header">Email de usuario</th>
                <th class="table-header">Fecha</th>
                <th class="table-header">Ingreso</th>
                <th class="table-header">Egreso</th>
            </tr>            
            <?php
        } else{
            ?>
            <tr>
                <th class="table-header">ID Usuario</th>
                <th class="table-header">Nombre</th>
                <th class="table-header">Apellido</th>
                <th class="table-header">Email de usuario</th>
                <th class="table-header">Tipo de usuario</th>
            </tr>            
            <?php
        }
    ?>
<?php
    #Get data.
    $result = mysqli_query($link, $query);

    #Imprimir registros filtrados de la tabla en filas.
    if($result != false) {
        $rows = mysqli_fetch_array($result);
        if(isset($rows)){
            for($i=0; $i<=$rows; $i++){
                
                #Seleccionar variables definidas a mostrar según la tabla.
                if($table == "`user-record`"){
                    $query_email = mysqli_query($link,"SELECT `user-email` FROM `login` WHERE `id-user`='$rows[1]'");
                    $email = mysqli_fetch_array($query_email);
                    ?>
                        <tr class="table-rows">
                            <td class="id-register"><?php echo $rows['id-record'];?></td>
                            <td class="table-row"><?php echo $rows['id-user'];?></td>
                            <td class="table-row"><?php echo $email['user-email'];?></td>
                            <td class="table-row"><?php echo $rows['record-date'];?></td>
                            <td class="table-row"><?php echo $rows['record-login'];?></td>
                            <td class="table-row"><?php echo $rows['record-logout'];?></td>
                        </tr>
                    <?php
                } else{
                    if($rows['user-admin'] == 1){
                        $rows['user-admin'] = "Administrador";
                    } else{$rows['user-admin'] = "Usuario";}
                    ?>
                        <tr class="table-rows">
                            <td class="id-register"><?php echo $rows['id-user'];?></td>
                            <td class="table-row"><?php echo $rows['user-fname'];?></td>
                            <td class="table-row"><?php echo $rows['user-lname'];?></td>
                            <td class="table-row"><?php echo $rows['user-email'];?></td>
                            <td class="table-row"><?php echo $rows['user-admin'];?></td>
                        </tr>
                    <?php
                }
                $rows = mysqli_fetch_array($result);
            }
    } else{
        ?>
        <tr><td>Sin registros.</td></tr>
        <?php
    }
    } else{
        ?>
        <tr><td>Sin registros.</td></tr>
        <?php
    }
?>
</table>
</div>