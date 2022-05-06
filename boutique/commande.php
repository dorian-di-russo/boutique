<?php
if(isset($_POST['prix']) && !empty($_POST['prix'])) {
  require_once('vendor/autoload.php');
  $prix = (float)$_POST['prix'];
  \Stripe\Stripe::setApiKey('sk_test_51KwArZADaBeUb39AEhnVEdGwpkQi9hV2IdQxeehixvKGpIL7CHHTYdJI7BWHe4g1hIQJosFdS6tGZjpyCM002gER004ZPaXy4e');


 $intent = \Stripe\PaymentIntent::create([
    'amount' => $prix*100, // prix
    'currency' => 'eur', //
 ]);
 echo '<pre>';
 var_dump($intent);
 echo '<pre>';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
      <label for="number">number</label>
      <input type="number" name="prix">
      <input type="submit" value="envoyer">
  </form>
</body>
</html>