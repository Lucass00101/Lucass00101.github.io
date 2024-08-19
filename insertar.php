<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];
$fecha = $_POST['fecha'];


$archivo = $_FILES['archivo']['name'];
$archivo_tmp = $_FILES['archivo']['tmp_name'];
$archivo_destino = "uploads/" . $archivo;

if (move_uploaded_file($archivo_tmp, $archivo_destino)) {
    $sql = "INSERT INTO registros (nombre, comentario, fecha, archivo) VALUES ('$nombre', '$comentario', '$fecha', '$archivo')";
    if ($conn->query($sql) === TRUE) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro guardado',
                        text: 'El registro ha sido guardado exitosamente',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php';
                        }
                    });
                });
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error al subir el archivo";
}

$conn->close();
?>
