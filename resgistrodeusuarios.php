<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  // Validar los campos
  if (!empty($name) && !empty($email) && !empty($message)) {
    // Configurar los detalles del correo electrónico
    $to = 'tu-correo@ejemplo.com';
    $subject = 'Nuevo mensaje de ' . $name;
    $body = 'Nombre: ' . $name . "\n\n" . 'Correo electrónico: ' . $email . "\n\n" . 'Mensaje: ' . $message;
    $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    // Enviar el correo electrónico
    if (mail($to, $subject, $body, $headers)) {
      echo 'El mensaje ha sido enviado correctamente.';
    } else {
      echo 'Ha habido un error al enviar el mensaje.';
    }
  } else {
    echo 'Por favor, rellena todos los campos.';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario de contacto</title>
</head>
<body>
  <h1>Formulario de contacto</h1>
  
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name">
    
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email">
    
    <label for="message">Mensaje:</label>
    <textarea id="message" name="message"></textarea>
    
    <button type="submit">Enviar</button>
  </form>
</body>
</html>
