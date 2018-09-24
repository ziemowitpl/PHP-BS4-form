<?php

// Walidacja
if ($_POST['submit']) {
	// czy urzytkownik wprowadzil imie
	if (!$_POST['name']) {
		// jeśli nie ma zrob cos
		$error="<br>- Proszę wprowadź swoje imię i nazwisko";
	}
	if (!$_POST['email']) {
		// jeśli nie ma zrob cos
		$error.="<br>- Proszę wprowadź swój email";
	}
	if (!$_POST['message']) {
		// jeśli nie ma zrob cos
		$error.="<br>- Proszę wprowadź swoją wiadomość";
	}
	if (!$_POST['check']) {
		// jeśli nie ma zrob cos
		$error.="<br>- Proszę potwierdź że jesteś człowiekiem";
	}
	if ($error) {
		$result='<div class="alert alert-danger" role="alert"><strong>Oops, błąd</strong>. Proszę popraw następujące pola: '.$error.'</div>';
	} else {
		// WYSYLANIE NA MAILA TEKSTU FORMULARZA + POTWIERDZENIE NADANIA
		mail("roninrallegro@gmail.com", "Contact message form", "Name: ".$_POST['name']."
		Email: ".$_POST['email']."
		Message: ".$_POST['message']);
		
		{
			// RESET FORMULARZA
			$_POST = array();
			// KLASA ALERT Z BOOTSTRAP 4 i WIADOMOSC KONCOWA
		$result='<div class="alert alert-success" role="alert">Dziękuję w krótce się odezwiemy</div>';
		}
	}
}



?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
			  <h1>Skontaktuj się z nami</h1>
			  <!-- Wyświetlanie wiadomości z PHP -->
			  <?php echo $result;?>
			  <p>Wyślij wiadomość za pomocą formularza poniżej</p>

			  <form method="post" role="form">
				  <div class="form-group">
					  <input type="text" name="name" class="form-control" placeholder="Twoje imię i nazwisko" value="<?php echo $_POST['name']; ?>">
				  </div>
				  <div class="form-group">
					  <input type="email" name="email" class="form-control" placeholder="Podaj swój email" value="<?php echo $_POST['email']; ?>">
				  </div>
				  <div class="form-group">
					  <textarea name="message" class="form-control" rows="5" placeholder="Twoja wiadomość"><?php echo $_POST['message']; ?></textarea>
				  </div>
				  <div class="checkbox">
					  <label>
						  <input type="checkbox" name="check">Im a human
					  </label>
					  <div class="text-center">
					  	<input type="submit" name="submit" class="btn btn-secondary" value="send message">
					  </div>
				  </div>
			  </form>

		  </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>