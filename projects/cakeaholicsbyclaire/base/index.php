<?php 
    include 'inc/variables.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Josh Kelly">
        <meta name="description" content="Index Page for Cakeaholics by Claire
" />
        <link rel="icon" type="image/x-icon" href="img/favicon.jpg" />
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title><?php echo $websiteName; ?> - Index</title>

    </head>

    
    <body>
        <div id="container">
            <?php include 'inc/header.php'; ?>
            <div id="content">
                <img src="img/banner.jpg" alt="<?php echo $websiteName; ?> Banner" id="banner">
                <p>Bespoke cupcakes and celebration cakes. Works with you to create designs and flavours to suit. Gift boxes and cake decorating classes. Message to book! Local delivery available. </p>
            </div>
            <?php include 'inc/footer.php'; ?>
        </div>
    </body>
</html>