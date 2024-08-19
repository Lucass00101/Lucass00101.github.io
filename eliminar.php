<?php
include 'conexion.php';

$id = $_GET['id'];


$sql = "SELECT archivo FROM registros WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$archivo = $row['archivo'];


if ($archivo != "" && file_exists("uploads/" . $archivo)) {
    unlink("uploads/" . $archivo);
}


$sql = "DELETE FROM registros WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            window.onload = function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Registro eliminado',
                    text: 'El registro ha sido eliminados exitosamente',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            };
          </script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
