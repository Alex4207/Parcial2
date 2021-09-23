<!doctype html>
<html lang="en">
  <head>
    <title>Productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    
      <h1>Formulario Productos</h1>
      <div class="container">
          <form class="d-flex" action="crud_productos.php" method="post">
            <div class="col">
            <div class="mb-3">
                <label for="lbl_id" class="form-label"><b>ID</b></label>
                <input type="text" name="txt_id" id="txt_id" class="form-control" value="0"  readonly>
              </div>
              <div class="mb-3">
                <label for="lbl_Producto" class="form-label"><b>Producto</b></label>
                <input type="text" name="txt_Producto" id="txt_Producto" class="form-control" placeholder="Memorias 000" required>
              </div>
              <div class="mb-3">
                <label for="lbl_id_marca" class="form-label"><b>Id_Marca</b></label>
                <select class="form-select" name="drop_producto" id="drop_producto">
                  <option value=0> ---- Marca ---- </option>
                  <?php 
                   include("conexion.php");
                   $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                   $db_conexion -> real_query ("SELECT idMarca as id,marca FROM Marcas;");
                  $resultado = $db_conexion -> use_result();
                  while ($fila = $resultado ->fetch_assoc()){
                    echo "<option value=". $fila['id'].">". $fila['marca']."</option>";

                  }
                  $db_conexion ->close();

                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="lbl_descripcion" class="form-label"><b>Descripcion</b></label>
                <input type="text" name="txt_descripcion" id="txt_descripcion" class="form-control" placeholder="Descripcion: Memoria de 128GB SSD" required>
              </div>
              <div class="mb-3">
                <label for="lbl_precio_costo" class="form-label"><b>Precio Costo</b></label>
                <input type="number" name="txt_precio_costo" id="txt_precio_costo" class="form-control" placeholder="Precio Costo: 800" required>
              </div>
              <div class="mb-3">
                <label for="lbl_precio_venta" class="form-label"><b>Precio Venta</b></label>
                <input type="number" name="txt_precio_venta" id="txt_precio_venta" class="form-control" placeholder="Precio Venta: 1000" required>
              </div>
              <div class="mb-3">
                <label for="lbl_Existencia" class="form-label"><b>Existencia</b></label>
                <input type="number" name="txt_Existencia" id="txt_Existencia" class="form-control" placeholder="Existencia: 10" required>
              </div>
              <div class="mb-3">
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value = "Agregar">
                <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value = "Modificar">
                <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" onclick="javascript:if(!confirm('¿Desea Eliminar?'))return false" value = "Eliminar">
              </div>
            </div>
          </form>
    <table class="table table-striped table-inverse table-responsive">
      <thead class="thead-inverse">
        <tr>
          <th>Producto</th>
          <th>ID_Marca</th>
          <th>Descripcion</th>
          <th>Precio_Costo</th>
          <th>Precio_Venta</th>
          <th>Existencia</th>
        </tr>
        </thead>
        <tbody id="tbl_productos">
         <?php 
         include("conexion.php");
         $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
         $db_conexion -> real_query ("SELECT e.idProducto as id,e.Producto,p.idMarca,e.Descripcion,e.Precio_costo,e.Precio_venta,e.Existencia FROM productos as e inner join marcas as p on e.idMarca = p.idMarca;");
        $resultado = $db_conexion -> use_result();
        while ($fila = $resultado ->fetch_assoc()){
          echo "<tr data-id=". $fila['id']." data-idp=". $fila['idMarca'].">";
          echo "<td>". $fila['Producto']."</td>";
          echo "<td>". $fila['idMarca']."</td>";
          echo "<td>". $fila['Descripcion']."</td>";
          echo "<td>". $fila['Precio_costo']."</td>";
          echo "<td>". $fila['Precio_venta']."</td>";
          echo "<td>". $fila['Existencia']."</td>";
          echo "</tr>";

        }
        $db_conexion ->close();
         ?>
        </tbody>
    </table>
          
      </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function limpiar(){
        $("#txt_id").val(0);
        $("#txt_Producto").val('');
        $("#drop_producto").val(1);
        $("#txt_descripcion").val('');
        $("#txt_precio_costo").val('');
        $("#txt_precio_venta").val('');
        $("#txt_Existencia").val('');
        
    }
    $('#tbl_productos').on('click','tr td',function(evt){
        var target,id,idp,Producto, Descripcion, Precio_costo, Precio_venta, Existencia;
        target = $(event.target);
        id = target.parent().data('id');
        idp = target.parent().data('idp');
        Producto = target.parent("tr").find("td").eq(0).html();
        Descripcion = target.parent("tr").find("td").eq(2).html();
        Precio_costo =  target.parent("tr").find("td").eq(3).html();
        Precio_venta = target.parent("tr").find("td").eq(4).html();
        Existencia = target.parent("tr").find("td").eq(5).html();
        $("#txt_id").val(id);
        $("#txt_Producto").val(Producto);
        $("#txt_descripcion").val(Descripcion);
        $("#txt_precio_costo").val(Precio_costo);
        $("#txt_precio_venta").val(Precio_venta);
        $("#txt_Existencia").val(Existencia);
        $("#drop_producto").val(idp);
        $("#modal_productos").modal('show');
        
    });
</script>
  </body>
</html>