<?php
error_reporting(0);

if (isset($_POST["email"]) && $_POST["email"] != '') {
    include('mailchimp/Mailchimp.php');

    $MailChimp = new MailChimp('f70fe0934e2ba6f9b6625519d5b0ddae-us12');
    $result    = $MailChimp->call('lists/subscribe', [
      'id'                => '75f998e12a',
      'email'             => [ 'email' => $_POST["email"] ],
      'merge_vars'        => ['FNAME' => $_POST["fname"], 'LNAME' => $_POST["lname"], 'SOURCE' => 'website'],
      'double_optin'      => false,
      'update_existing'   => true,
      'send_welcome'      => true,
  ]);
    $ok = true;
}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta name="viewport" content="width=320.1, initial-scale=1" />
		<meta name="msapplication-tap-highlight" content="no"/>

		<title>Merci Lordi</title>

		<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="lib/css/index.css" type="text/css" media="screen" />

		<link rel="icon" type="image/png" href="lib/img/favicon.png" />

	</head>
	<body>
		<div id="outer"><div id="middle"><div id="wrapper">
		  	<div id="content">
				<p>Nos abonnements seront disponibles très bientôt !</p>
				<?php if ($ok) {
    ?>
			      <p class="green">Merci pour votre inscription ! Beau Tom vous prévient lors de son lancement.</p>
			    <?php

} else {
    ?>
					<p>Laissez vos coordonnées, vous recevrez toutes les informations d’ici quelques semaines.</p>
					<form id="form" action="" method="post">
				    	<input id="lname" class="field" type="text" name="lname" placeholder="Nom" /></br>
						<input id="fname" class="field" type="text" name="fname" placeholder="Prénom" /></br>
						<input id="email" class="field" type="email" name="email" placeholder="E-mail" /></br>
						<input id="sbm" class="sbm" type="submit" value="GO&nbsp;!" />
			    	</form>
		    	<?php

} ?>
		  	</div>
		</div></div></div>
	</body>
</html>
