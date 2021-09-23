<?php
     
     if( !empty($_POST) ){
   
     //print_r( $_POST );
       // echo "<hr/>";
       $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_Producto = utf8_decode($_POST["txt_Producto"]);
        $drop_marca = utf8_decode($_POST["drop_producto"]);
        $txt_Descripcion = utf8_decode($_POST["txt_descripcion"]);
        $txt_Precio_costo = utf8_decode($_POST["txt_precio_costo"]);
        $txt_Precio_venta = utf8_decode($_POST["txt_precio_venta"]);
        $txt_Existencia = utf8_decode($_POST["txt_Existencia"]);
      include("conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO productos(Producto, idMarca, Descripcion, Precio_costo, Precio_venta, Existencia) VALUES ('". $txt_Producto ."','". $drop_marca ."','". $txt_Descripcion ."','". $txt_Precio_costo ."','". $txt_Precio_venta ."','". $txt_Existencia ."');";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update productos set Producto='". $txt_Producto ."',idMarca='". $drop_marca ."',Descripcion='". $txt_Descripcion ."',Precio_costo='". $txt_Precio_costo ."',Precio_venta='". $txt_Precio_venta ."',Existencia='". $txt_Existencia ."' where idProducto = ". $txt_id.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from productos  where idProducto = ". $txt_id.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /examen2');
            //header('Location: index.php');
           
          }else{
            $db_conexion->close();
          
          }

      }
     
    
      
      ?>