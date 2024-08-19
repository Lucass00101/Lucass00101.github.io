<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Registros</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #444;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            color: #333;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #5bc0de;
            box-shadow: 0 0 5px rgba(91, 192, 222, 0.5);
            outline: none;
        }

        .form-group input[type="file"] {
            padding: 0;
            border: none;
            background: none;
        }

        .form-group input[type="file"]::-webkit-file-upload-button {
            background-color: grey;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .form-group input[type="file"]::-webkit-file-upload-button:hover {
            background-color: gray;
        }

        input[type="date"] {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="date"]:focus {
            border-color: #5bc0de;
            box-shadow: 0 0 5px rgba(91, 192, 222, 0.5);
            outline: none;
        }

        textarea {
            resize: none;
            /* Evita que el usuario cambie el tamaño manualmente */
            overflow: hidden;
            /* Esconde la barra de desplazamiento */
            transition: height 0.2s ease;
        }

        textarea:focus {
            border-color: #5bc0de;
            box-shadow: 0 0 5px rgba(91, 192, 222, 0.5);
        }

        button {
            display: inline-block;
            border: none;
            background-color: #5cb85c;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            position: relative;
        }

        button:hover {
            background-color: #4cae4c;
            transform: rotate(5deg) scale(1.05);
        }

        .btn {
            display: inline-block;
            background-color: #5bc0de;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 6px;
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
            border: 1px solid #ddd;
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
    </style>

</head>

<body>
    <div class="container">
        <h1>Gestión de Registros</h1>
        <form action="insertar.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea name="comentario" id="comentario" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" required>
            </div>
            <div class="form-group">
                <label for="archivo">Archivo:</label>
                <input type="file" name="archivo" id="archivo" required>
            </div>
            <button type="submit">Enviar</button>
        </form>
        <a class="btn" href="mostrar.php">Mostrar Registros</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.querySelector('textarea');

            textarea.addEventListener('input', function () {
                // Ajusta la altura del área de texto
                this.style.height = 'auto';
                this.style.height = `${this.scrollHeight}px`;
            });
        });
    </script>
</body>
</html>