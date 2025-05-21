<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DietaApp - Datos del cuerpo</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet" />
</head>
<body>
<?php
  session_start();
  if (!isset($_SESSION['id_cliente'])) {
    header("Location: login.php");
    exit();
  }
?>

<div class="container-c">
  <?php include "../components/navbar.php"; ?>
</div>

<main class="main-content">
  <h1>Datos del cuerpo</h1>

  <div class="form-container">
    <form method="POST" action="../controllers/guardarDatosCliente.php">
      <label for="peso">Peso (kg):</label>
      <input type="number" id="peso" name="peso" step="0.1" required>

      <label for="altura">Altura (cm):</label>
      <input type="number" id="altura" name="altura" required>

      <label for="edad">Edad:</label>
      <input type="number" id="edad" name="edad" required>

      <label for="sexo">Sexo:</label>
      <select id="sexo" name="sexo" required>
        <option value="">Selecciona...</option>
        <option value="hombre">Hombre</option>
        <option value="mujer">Mujer</option>
      </select>

      <label for="actividad">Actividad física:</label>
      <select id="actividad" name="actividad" required>
        <option value="">Selecciona...</option>
        <option value="sedentario">Sedentario</option>
        <option value="ligero">Ligero</option>
        <option value="moderado">Moderado</option>
        <option value="intenso">Intenso</option>
      </select>

      <button type="submit" class="btn">Guardar</button>
    </form>
  </div>
</main>

<?php include "../components/footer.html"; ?>
<script src="https://kit.fontawesome.com/6209fab7df.js" crossorigin="anonymous"></script>
</body>
</html>
