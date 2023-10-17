<?php
// user_form.php
?>
<h2>Formulario de Usuario</h2>
<form action="index.php?route=create-user" method="post">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Crear Usuario">
</form>