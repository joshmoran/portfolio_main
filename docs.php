<?php

if (!isset( $_GET['no'] ) && empty($_GET['no'])){
    $pageNo = 0;
} else {
    $pageNo = htmlspecialchars( $_GET['no'] );
}

$file = file_get_contents('details.json');
$json = (array) array_reverse( json_decode($file, true) );

function createView( ) {

}
// $json = array_reverse($json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/universal.css" />
    <link rel="stylesheet" type="text/css" href="css/doc_items.css" />
    <title>Documentation</title>
</head>
<body>
    <?php
        include "inc/header.php";
    ?>
    <div id="container">
    <?php
        $noOfItems =  count($json);
        $itemsPerPage = 10;
        echo '<div class="pagination">';

        for ( $a = 0; $a <= $itemsPerPage  ; $a++ ){
            echo '<button><a href="?no='. $a . '">Page'. ( $a + 1 ) . '</a></button>';
            
            $noOfItems -= 10;

            if ($noOfItems < 1 ){
                break;
            }
        }
        
        echo '</div>';
        ?>

        
    <div id="docItems">
        <?php
        $working =count($json) + 10; 
        $pages = -1;

        do {
            $working = $working - 10;
            $pages++;
        } while ( $working > 9 );


        if ($pageNo != $pages) {
            $remander = 10;
        } else {
            $remander = $working;
        }

        for( $b = 0 ; $b < $remander; $b++ ) {
            if ( true ) {
                (int)$no = "$pageNo" . "$b";
            } else if ( $pageNo == 0 ){
                (int)$no = 0;
            } else if ( empty($no) || $no == null ){
                break;
            }

            $file = $json[(int)$no];
                $html = '';
                $html .= '<div class="doc">';
                $html .= '<h2>' . $file['heading'] . '</h2>';
                $html .= '<h3>' . $file['date'] . ' - Week ' . $file['week'] . ' - ' . $file['day'] . '</h3>';
                $html .= '<p>' . $file['description'] . '</p>';
                $html .= '<a href="./docs/' . $file['filename'] . '">View Document</a>';
                $html .= '</div>';
                echo $html;
           
         }
         ?>
         </div>
         </div>
         <?php
        include "inc/footer.php";
    ?>
</body>
</html>