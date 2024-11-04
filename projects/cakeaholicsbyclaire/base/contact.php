<?php 
include 'inc/variables.php';

$category =  array(
    'General Questions',
    'Product Information',
    'Allergies and ingredients',
    'Feedback',
    'Complaints'
);

function sanitizeInput($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}

function checkEmail($str)
{
    return (preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? true : false;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( isset($_POST['submit'])){
        $errors = 0;
        $reason = array();

        $to = 'josh@lovingfamily.co.uk';

        $type = sanitizeInput($_POST['category']);
        $name = sanitizeInput($_POST['name']);
        $email =sanitizeInput($_POST['email']);
        $number = sanitizeInput($_POST['phone']);
        $subject = sanitizeInput($_POST['subject']);
        $body = sanitizeInput($_POST['message']);
        
        // Category validation
        if ( $type == 0 ) {
            $errors++;
            $reason[] = 'Please select a category';
        }
        // Name validation
        if ( empty($name) ) {
             $errors++;
             $reason[] = 'Name is required.';
        }

        // Email and phone validation validation
        if ( empty($email) && empty($number)) {
            $errors++;
            $reason[] = 'Either your email or phone number are required.';
         }
         
         if ( !empty($number) && strlen($number) == 11){

            if (preg_match("~^0\d+$~", $number) == false) {
                $errors++;
                $reason[] = 'Phone number must start with a 0';
            } 
         } else {
            $errors++;
            $reason[] = 'Phone number must be 11 digits.';
        }
         
         if ( !empty($email) && checkEmail($email) == false ) {
                $errors++;
                $reason[] = 'Please enter a valid email address.';
         }

        // Subject validation
        if ( empty($subject) ) {
             $errors++;
             $reason[] = 'Subject is required.';
        }

        // Message validation
        if ( empty($body) ) {
             $errors++;
             $reason[] = 'Message is required.';
        }

        if ( $errors == 0 ){
            $error_message = true;

            $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "Content-type:text/html;" . "charset=iso-8859-1" . "\r\n";

	        // More headers
	        $headers .= 'From: <webmaster@lovingfamily.co.uk>' . "\r\n";

            $message = 'Category: '. $type. '<br>';
            $message .= '<br>';
            $message .= 'Name: ' . $name . '<br>';
            $message .= 'Email: '. $email. '<br>';
            $message .= 'Phone: '. $number. '<br>';
            $message .= '<br>';
            $message .= 'Subject: '. $subject. '<br>';
            $message .= 'Message: <br>'. $body. '<br>';

            if ( mail( $to, 'Website Contact Page', $message, $headers )){
                $error_message = 'Message sent!';
            } else {
                $error_message = 'There was a problem sending your message. Please try again later, or if the problem continues please contact the administrator..';
            }
        } else {
            $error_message = 'Please correct the following errors: ';
        }

        $_POST['submit'] = null;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Josh Kelly">
        <link rel="icon" href="img/favicon.jpg">
        <link type="text/css" rel="stylesheet" href="css/basics.css" />
        
        <link type="text/css" rel="stylesheet" href="css/contact.css" />
        <title><?php echo $websiteName;?> - Contact</title>
    </head>
    <body>
        <div id="container">
            <?php include 'inc/header.php'; ?>
            <div id="content">
                <div id="message">
                    <?php
                    if ( isset( $error_message )){
                        echo '<h3>' . $error_message . '</h3>';
                        if (isset($reason)) {
                            echo '<ul id="reasons">';
                            foreach ( $reason as $error ) {
                                echo '<li>'. $error. '</li>';
                            }
                            echo '</ul>';
                        }
                    }
                    ?>
                </div>
                <h1>Contact Us</h1>
                <p>We aim to provide you with a high level of customer service. If you have any questions or suggestions, please feel free to contact us.</p>

                <h2>Requirements:</h2>
                <ul>
                    <li>Category</li>
                    <li>Name</li>
                    <li>Email or Phone Number</li>
                    <li>Subject</li>
                    <li>Message</li>
                </ul>
                
                <form method="post" action="contact.php" name="contactUs">
                    <label for="category"><strong>Category</strong></label>
                    <select name="category" id="category">
                        <option value="0">Please select a category</option>
                    <?php

                        foreach ( $category as $item){
                            echo '<option value="' . $item . '"';
                            if ( isset($_POST['category']) && $item == $_POST['category'] ){
                                echo ' selected>';
                            } else {
                                echo '>';
                            }
                            echo $item . '</option>';
                        }
                    ?>
                    </select>
                    <!-- <input name="category" id="category" type="text" value="<?php if (isset($_POST['subject'])) { echo $_POST['subject']; };?>"> -->
                    <br>
                    <label for="name"><strong>Name</strong></label>
                    <input name="name" id="name" type="text"  value="<?php if (isset($_POST['name'])) { echo $_POST['name']; }?>" placeholder="John Smith" required>
                    <br>
                    <label for="email"><strong>Email</strong></label>
                    <input name="email" id="email" type="text" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; }?>" placeholder="johnsmith@emailprovider.co.uk">
                    <br>
                    <label for="phone"><strong>Phone Number</strong></label>
                    <input name="phone" id="phone" type="number" value="<?php if (isset($_POST['phone'])) { echo $_POST['phone']; }?>" maxlength="11" placeholder="07123456789">
                    <br>
                    <label for="subject"><strong>Subject: </strong></label>
                    <input name="subject" id="subject" type="text" value="<?php if (isset($_POST['subject'])) { echo $_POST['subject']; }?>" placeholder="Information on products" required>
                    <br>
                    <label for="message"><strong>Message: </strong></label>
                    <textarea name="message" id="message" cols="30" rows="10" value="<?php if (isset($_POST['message'])) { echo $_POST['message']; }?>" placeholder="Do you work with any ingredients that are made with lactose" required></textarea>
                    <br>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
            <?php include 'inc/footer.php'; ?>
        </div>
        <script>
            // Error Div Styling
            $errorDiv = document.getElementById('message');

            if ( $errorDiv.clientHeight > 0 ){
                $errorDiv.style.backgroundColor = 'tomato';
                $errorDiv.style.border = '10px solid red';
            } else {
                $errorDiv.style.backgroundColor = 'white';
                $errorDiv.style.border = '0px solid darkred';
            }

            // Input fields Styling from error
            reasons = document.getElementById('reasons');

            email = document.getElementsByName('email')[0].value;
            phone = document.getElementsByName('phone')[0];
            subject = document.getElementsByName('subject')[0].value;
            message = document.getElementsByName('message')[0].value;

            // Category validation 
            if ( reasons.innerText.search('category') != -1) {
                document.getElementsByName('category')[0].style.border = '5px solid red';
            } else {
                document.getElementsByName('category')[0].style.border = '1px solid grey';
            }

            // Name validation 
            if ( reasons.innerText.search('Name') != -1) {
                document.getElementsByName('name')[0].style.border = '5px solid red';
            } else {
                document.getElementsByName('name')[0].style.border = '1px solid grey';
            }

            // Email and phone validation 
            if ( reasons.innerText.search('email') != -1 || reasons.innerText.search('phone') != -1 ) {
                phone.style.border = '5px solid red';
                document.getElementsByName('email')[0].style.border = '5px solid red';
            } else {
                if ( reasons.innerText.search('Phone') != -1 && reasons.innerText.search('email') == -1 ) {
                    document.getElementsByName('phone')[0].style.border = '5px solid red';
                } else {
                    document.getElementsByName('phone')[0].style.border = '1px solid grey';
                }
            }

            // Phone validation when incorrect
            

            // Subject validation 
            if ( reasons.innerText.search('Subject') != -1) {
                document.getElementsByName('subject')[0].style.border = '5px solid red';
            } else {
                document.getElementsByName('subject')[0].style.border = '1px solid grey';
            }

            // Message validation 
            if ( reasons.innerText.search('Message') != -1) {
                document.getElementsByName('message')[0].style.border = '5px solid red';
            } else {
                document.getElementsByName('message')[0].style.border = '1px solid grey';
            }
        </script>
    </body>
</html>