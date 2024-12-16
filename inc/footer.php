<?php

$file = basename($_SERVER['SCRIPT_FILENAME']);

if ( $file =='moredetails.php'){
    echo '<link rel="stylesheet" href="../../../css/footer.css" type="text/css" />';
} else {
    echo '<link rel="stylesheet" href="../css/footer.css" type="text/css" />';
}

?>

<div id="footer">
    <h3>&#169; Josh Kelly <?php echo Date('Y') ?></h3>
    <ul class="contact">
        <li><a href="mailto:josh@lovingfamily.co.uk" target="_blank"><img src="/img/footer/pngkey.com-mail-white-png-4297053.png" class="contactMethod" /></a></li>
        <li><a href="https://github.com/joshmoran" target="_blank"><img src="/img/footer/github.svg" class="contactMethod" /></a></li>
        <li><a href="https://teamtreehouse.com/profiles/joshkelly4" target="_blank"><img src="/img/footer/treehouse.png" class="contactMethod" /></a></li>
        <li><a href="https://www.linkedin.com/in/joshua-kelly-92a321310/" target="_blank"><img src="/img/footer/linkedin.svg" class="contactMethod" /></a></li>
    </ul>
</div>

<script src="../js/other_pages.js"></script>