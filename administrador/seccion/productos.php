<?php include("../template/cabecera.php"); ?>

<?php include("../../conexion/conexion.php");
$getmysql=new mysqlconex();
$getconex=$getmysql->conex();


$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";

try {
    $enlace;
    if($getconex){echo"conectado";}
}catch (exception $ex){
    echo $ex->getMessage();
}

switch ($accion) {

    case 'Agregar':

        $query="INSERT INTO libros (id,nombre,imagen) VALUES (NULL, $txtNombre, $txtImagen)";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        break;

    case 'Modificar':
        echo"Presionado boton modificar";
        break;

    case 'Cancelar':
        echo"Presionado boton cancelar";
        break;    
    
}

?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de libros
        </div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txtID">ID</label>
            <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
        </div>

        <div class="form-group">
            <label for="txtNombre">Nombre: </label>
            <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="txtImagen">Imagen</label>
            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="imagen">
        </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
            
        </div>
        </div>

    </div>

</div>

<div class="col-md-7">
   <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
  
    <tbody>    
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    </tbody>
   </table>
</div>

<?php include("../template/pie.php"); ?>