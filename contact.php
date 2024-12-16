<?php
$sendTo = 'josh@joshkelly.cc';
$headers = "From: contact@joshkelly.cc";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $txt = $name . '\n\n' . 'Contact Email: ' . $email . '\n\n' . 'Message: ' . $message;

  echo mail( $sendTo, $subject, $txt, $headers);
  
  header( "Location: contact.php?message=sent");
}

if ( !isset( $_GET['message']) ) {
  $error_message = '';
} else {
  if ( $_GET['message'] == 'sent' ) {
    $error_message = 'Message sent!';
  }
}

echo $_GET['message']
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Josh Kelly</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="css/universal.css" />
    <link rel="stylesheet" type="text/css" href="css/contact.css" />
</head>
<body>
    <?php
    include "inc/header.php";
    ?>

    <div id="container" class="flex column">
        <h2>Contact Methods</h2>
        <div id="contactMethod">
          <ul class="contactLinks">
            <li><span>Email: </span><a href="mailto:josh@lovingfamily.co.uk" target="_blank"><img src="/img/footer/pngkey.com-mail-white-png-4297053.png" class="contactMethod" /></a></li>
            <li><span>GitHub: </span><a href="https://github.com/joshmoran" target="_blank"><img src="/img/footer/github.svg" class="contactMethod" /></a></li>
            <li><span>TeamTreeHouse: </span><a href="https://teamtreehouse.com/profiles/joshkelly4" target="_blank"><img src="/img/footer/treehouse.png" class="contactMethod" /></a></li>
            <li><span>LinkedIn: </span><a href="mailto:josh@lovingfamily.co.uk" target="_blank"><img src="/img/footer/linkedin.svg" class="contactMethod" /></a></li>
          </ul>
        </div>
        <div id="contactForm">
          <h3>Contact Form</h3>
          <?php 
            if ( isset($error_message) && $error_message != '' ) {
              echo '<p id="messageSent">';
              echo $error_message;
              echo '</p>';
            }
          ?>
          <form action="contact.php" method="POST" >
            <div id="formContent"class="flex row">
              <div id="formLeft" class="flex column">
                <label for="name">Name</label>
                <label for="email">Email</label>
                <label for="subject">Subject</label>
                <label for="message">Message</label>
              </div>
              <div id="formRight" class="flex column">
                <input type="text" id="name" name="name" placeholder="John Smith" required>
                <input type="email" id="email" name="email" placeholder="johnsmith@provider.co.uk" required>
                <input type="text" id="subject" name="subject" placeholder="Information and advice" required>
                <textarea id="message" name="message" placeholder="I am in need of a website developed for my business. Is this something you can do? Looking forward to hearing from you soon." required></textarea>
                <input type="submit" value="Submit">
              </div>
            </div>

            
          </form>
        </div>


    </div>

    <?php
    include "inc/footer.php";
    ?>
    <script src="js/index.js"></script>
</body>

</html>