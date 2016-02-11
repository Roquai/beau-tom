<?php
error_reporting(0);

if (isset($_POST["email"]) && $_POST["email"] != '') {
    include('mailchimp/Mailchimp.php');

    $MailChimp = new MailChimp('f70fe0934e2ba6f9b6625519d5b0ddae-us12');
    $result    = $MailChimp->call('lists/subscribe', [
      'id'                => '75f998e12a',
      'email'             => [ 'email' => $_POST["email"] ],
      'merge_vars'        => ['FNAME' => $_POST["fname"], 'LNAME' => $_POST["lname"], 'POINTURE' => $_POST["pointure"], 'SIZESHIRT' => $_POST["sizeshirt"], 'SIZEBOXER' => $_POST["sizeboxer"], 'SOURCE' => 'website'],
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

        <!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
mixpanel.init("5ce45ea78d05084b39c9e44545dac81a");</script><!-- end Mixpanel -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                mixpanel.track_forms("#form", "Sign up");
            });
        </script>

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
						<input id="email" class="field" type="email" name="email" placeholder="E-mail" /></br></br>

                        <span class="title">Pointure:</span></br>
                        <label class="radio-wrapper">
                            <input type="radio" name="pointure" class="radio" /><span class="custom-radio"></span><span class="size">41-42</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="pointure" class="radio" /><span class="custom-radio"></span><span class="size">43-44</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="pointure" class="radio" /><span class="custom-radio"></span><span class="size">45-46</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="pointure" class="radio" /><span class="custom-radio"></span><span class="size">47-48</span>
                        </label>

                    </br></br>

                        <span class="title">Taille de boxer:</span></br>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeboxer" class="radio" /><span class="custom-radio"></span><span class="size">S</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeboxer" class="radio" /><span class="custom-radio"></span><span class="size">M</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeboxer" class="radio" /><span class="custom-radio"></span><span class="size">X</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeboxer" class="radio" /><span class="custom-radio"></span><span class="size">XL</span>
                        </label>

                    </br></br>

                        <span class="title">Taille de chemise:</span></br>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">38</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">39</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">40</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">41</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">42</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">43</span>
                        </label>
                        <label class="radio-wrapper">
                            <input type="radio" name="sizeshirt" class="radio" /><span class="custom-radio"></span><span class="size">44</span>
                        </label>

                    </br></br>

						<input id="sbm" class="sbm" type="submit" value="GO&nbsp;!" />
			    	</form>
		    	<?php

} ?>
		  	</div>
		</div></div></div>
	</body>
</html>
