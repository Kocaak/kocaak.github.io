<?php
if(isset($_POST['email'])) {

    $email_to = "murathkocak@gmail.com";
    $email_subject = "bayebilisim.com Yeni Is Basvurusu";

    $first_name = $_POST['ad_soyad']; // required
    $email_from = $_POST['email']; // required
    $telefon = $_POST['telefon']; // required
    $adres = $_POST['adres']; //  required
    $dogum = $_POST['dogum']; // required
    $medeni = $_POST['medeni']; // required
    $askerlik = $_POST['askerlik']; // required
    $surucu = $_POST['surucu']; // required
    $lise = $_POST['lise']; // required
    $uni = $_POST['uni']; // required
    $sabika = $_POST['sabika']; // required
    $saglik = $_POST['saglik']; // required
    $web = $_POST['web']; // not required
    $yabancidil = $_POST['yabanciDil']; // required
    $progdil = $_POST['progDil']; // required
    $tecrube = $_POST['tecrube']; // required
    $kurs = $_POST['kurs']; // required
    $referans = $_POST['referans']; // not required
    $mesaj = $_POST['mesaj']; // required

    $email_message = "Detaylar Asagidadir.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }


    $email_message .= "Ad Soyad: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telefon: ".clean_string($telefon)."\n";
    $email_message .= "Adres: ".clean_string($adres)."\n";
    $email_message .= "Doğum Yılı ve Tarihi: ".clean_string($dogum)."\n";
    $email_message .= "Medeni Durum: ".clean_string($medeni)."\n";
    $email_message .= "Askerlik Durumu: ".clean_string($askerlik)."\n";
    $email_message .= "Sürücü Belgesi: ".clean_string($surucu)."\n";
    $email_message .= "Lise: ".clean_string($lise)."\n";
    $email_message .= "Üniversite: ".clean_string($uni)."\n";
    $email_message .= "Sabıka Kaydı: ".clean_string($sabika)."\n";
    $email_message .= "Sağlık Problemi: ".clean_string($saglik)."\n";
    $email_message .= "Web Sayfa: ".clean_string($web)."\n";
    $email_message .= "Yabancı Dil: ".clean_string($yabancidil)."\n";
    $email_message .= "Bilgisayar Bilgisi: ".clean_string($progdil)."\n";
    $email_message .= "Tecrübeler: ".clean_string($tecrube)."\n";
    $email_message .= "Kurs ve Seminerler: ".clean_string($kurs)."\n";
    $email_message .= "Referanslar: ".clean_string($referans)."\n";
    $email_message .= "Mesaj: ".clean_string($mesaj)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

<?php

}
?>
