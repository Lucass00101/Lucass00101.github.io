<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Mostrar Comentarios</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #444;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        textarea {
            resize: vertical;
        }

        button {
            justify-content: center;
            display: inline-block;
            background-color: #5cb85c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .btn {
            display: inline-block;
            background-color: #5bc0de;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            position: relative;
        }


        .btn:hover {
            background-color: #0d7797;
            transform: rotate(5deg) scale(1.05);
        }

     



        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .material-symbols-outlined {
            padding: 10px 10px 10px 10px;
            border-radius: 12px;
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 32px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
            color: white;
            background-color: red;
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }

        .btninicio {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registros</h1>
        <?php
        include 'conexion.php';

        $sql = "SELECT * FROM registros";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nombre</th><th>Comentario</th><th>Fecha</th><th>Archivo</th><th>Acción</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["comentario"] . "</td>
                        <td>" . $row["fecha"] . "</td>
                        <td><a href='uploads/" . $row["archivo"] . "'>" . $row["archivo"] . "</a></td>
                        <td><a href='javascript:confirmarEliminacion(" . $row["id"] . ")'>
                                <span class='material-symbols-outlined'>delete</span>
                            </a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
        <div class="btninicio">
            <a class="btn" href="index.php">INICIO</a>
        </div>
    </div>
    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'eliminar.php?id=' + id;
                }
            });
        }
    </script>
</body>

</html>