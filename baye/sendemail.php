<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Basvuru icin tesekkurler. En kisa surede donus saglayacagiz. '
	);

    $name = @trim(stripslashes($_POST['ad_soyad']));
    $email = @trim(stripslashes($_POST['email']));
    $telefon = @trim(stripslashes($_POST['telefon']));
    $adres = @trim(stripslashes($_POST['adres']));
		$dogum = @trim(stripslashes($_POST['dogum']));
		$medeni = @trim(stripslashes($_POST['medeni']));
		$askerlik = @trim(stripslashes($_POST['askerlik']));
		$surucu = @trim(stripslashes($_POST['surucu']));
		$lise = @trim(stripslashes($_POST['lise']));
		$uni = @trim(stripslashes($_POST['uni']));
		$sabika = @trim(stripslashes($_POST['sabika']));
		$saglik = @trim(stripslashes($_POST['saglik']));
		$web = @trim(stripslashes($_POST['web']));
		$yabancidil = @trim(stripslashes($_POST['yabancidil']));
		$progdil = @trim(stripslashes($_POST['progdil']));
		$tecrube = @trim(stripslashes($_POST['tecrube']));
		$kurs = @trim(stripslashes($_POST['kurs']));
		$referans = @trim(stripslashes($_POST['referans']));
		$mesaj = @trim(stripslashes($_POST['mesaj']));
		$subject = 'Yeni Is Basvurusu';

    $email_from = $email;
    $email_to = 'murathkocak@gmail.com';

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $mesaj;

    $success = mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;
