<?php
class mysqlconex{
    public function conex(){
        $enlace=mysqli_connect("localhost","root","Oscar0806","sitio");
        return $enlace;
    }
}
?>