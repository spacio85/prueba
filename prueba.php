<?php
$conexion=mysqli_init();
mysqli_ssl_set($conexion,NULL,NULL, "ssl/BaltimoreCyberTrustRoot.crt.pem",NULL,NULL);
mysqli_real_connect($conexion,"prueba-fina.mysql.database.azure.com","efrain","Kaybo#0710","base_datos_prueba",3306
, MYSQLI_CLIENT_SSL) or die ("ERROR al conector" . mysqli_error());

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO cliente (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        $message = "Nuevo cliente registrado exitosamente";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Clientes</h1>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="prueba.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>