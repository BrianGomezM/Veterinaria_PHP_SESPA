<!DOCTYPE html>
<?php
include("conexion.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mi sitio</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#pais').change(function(){
                    var id=$('#pais').val();
                    $('#estados').load('ajax.php?id='+id);
                });    
            });
        </script>
    </head>
    <body>
        <?php
        $consulta=mysql_query("select id,pais from paises order by pais ASC");
        echo "<select name='pais' id='pais'>";
        while ($fila=mysql_fetch_array($consulta)){
            echo "<option value='".$fila[0]."'>".utf8_encode($fila[1])."</option>";
        }
        echo "</select>";
        ?>
        <div id="estados">
            <select name="edo">
                <option value="">Seleccione un pais</option>
            </select>
        </div>
    </body>
</html>
    