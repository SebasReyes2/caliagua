<?php
class Conexion
{
        public static function con()
        {
                $conexion = mysqli_connect("localhost","Caliagua","123", "caliaguadhp");
		mysqli_query($conexion,"SET CHARACTER SET 'utf8'");
                return $conexion;
        }
}
?>
