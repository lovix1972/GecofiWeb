<!DOCTYPE html>   
   <head>
      <title>Login</title>
            
   </head>
   <link rel="stylesheet" href="./CSS/Style_login.css">
   <body bgcolor = "#FFFFFF">
	<h1>Gestione Contabilità Finanziaria</h1>
   <h3>..:: Accesso al sistema ::..</h3>
   <form class="login-form" method="post" action="login.php">
  <!-- Campi di input -->
  <input type="text" name="utente" placeholder="utente" required>
  <input type="password" name="password" placeholder="Password" required>

  <!-- Pulsante di submit -->
  <input type="submit" value="Accedi">

  <!-- Eventuale messaggio di errore -->
  <p class="error-message">Credenziali non valide. Riprova.</p>

  <!-- Link "Password dimenticata" o "Registrati" -->
  <p><a href="password_dimenticata.php">Password dimenticata</a></p>
  <p><a href="registrati.php">Registrati</a></p>
</form>
</html>