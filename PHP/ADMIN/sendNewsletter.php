<?php
require_once('authorize.php');
require_once('../CONFIG/config.php');
require_once('../COMPONENTS/functions.php');
require('../PHPMailer/Exception.php');
require('../PHPMailer/PHPMailer.php');
require('../PHPMailer/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
funnyDebugTool();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("adminHeaderMeta.php"); ?>
<title>Biztosan?</title>
</head>
<body>
<div class="delete-section">
  <div class="delete-card">
<?php
$subject = $_GET['subject'];
$sql = "SELECT email FROM newsletter";
if (!empty($subject)){
    $result = mysqli_query($dbc,$sql);
    $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username  = 'mymusicprodtestemail@gmail.com';              // SMTP felhnev
    $mail->Password  = 'Asd12345qwe';           // SMTP jelszó
    //Recipients
    $mail->setFrom('mymusicprodtestemail@gmail.com');                 //Kitől kapja az üzenetet
    $mail->CharSet = 'UTF-8';
    $mail->Mailer = "smtp";
    $mail->addReplyTo('mymusicprodtestemail@gmail.com', 'Information');         //Kinek válaszoljon
    $mail->addCC('mymusicprodtestemail@gmail.com');
    // EMAIL KÜLDÉS
    $mail->isHTML(true);                          // Set email format to HTML
    $mail->Subject = 'Heti hírlevél';
    $mail->Body = '<h1>Kedves Feliratkozó,</h1> <br>
    Heti hírlevele ... <br>
    My music csapata!';
    $mail->AltBody = 'Köszönjük hogy minket választott'; // ez a body ha nem támogatja a böngésző a html emailt
    while ($row = mysqli_fetch_array($result)) {
        $mail->addAddress($row["email"]);
        $mail->send();
        $mail->clearAllRecipients();
    }
    showDialog("Sikeres levélküldés!", "newsletter.php");
}
else{
  showDialog("Valamilyen probléma lépett fel a levél kiküldése közben.", "newsletter.php");
}
$dbc->close();
?>
</div>
</div>
</body>
<?php echo include_once("COMPONENTS/footer.php");?>
</html>
