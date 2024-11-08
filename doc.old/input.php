<?php 
$date = date("Y-m-d");
$timeH = date("H-i-s");
$timeS = date("H:i:s");
$uploads_dir = "/var/www-joshkelly/doc/images/" . $date . "/";

if ( !is_dir( $uploads_dir )) {
    mkdir( $uploads_dir, 0755 , true);
    chown($uploads_dir, "www-data");
    chmod($uploads_dir, 0755);
}

require "db.php";

if ( $_POST['title'] != null || $_POST['topics'] != null || $_POST['learnt'] != null || $_POST['comment'] || $_FILES['cover'] != "") {
    $sqlDoc = "insert into documentation (date, languages, learnt, comment, title ) values ( '";

    $title = html_entity_decode(strip_tags(html_entity_decode($_POST["title"])));
    $topics = html_entity_decode(strip_tags(html_entity_decode($_POST["topics"])));
    $learnt = html_entity_decode(strip_tags(html_entity_decode($_POST["learnt"])));
    $comment = html_entity_decode(strip_tags(html_entity_decode($_POST["comment"])));

    $sqlDoc .= $date . ' ' . $timeS . "', '" . $topics . "', '" . $learnt ."', '". $comment ."', '" . $comment . "')";

    $pdo->query( $sqlDoc );
}
    foreach ($_FILES["pictures"]["error"] as $key => $error) {
        if ( !is_dir( $uploads_dir )) {
            if (!mkdir ( $uploads_dir) ) {
                echo 'there has been a problem';
            }
        }

        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = $timeH . '-' . $key . '.png';
            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $caption = $_POST['captions'][$key];
            
            $sqlFile = "insert into captions (date, filename, caption ) values ( '";
            $sqlFile .=  $date . ' ' . date("H:i:s") . "', '" . $timeS . '-' . $key . "', '" . $caption . "' )";

            echo $sqlFile;
            $inputFileSql = $pdo->query($sqlFile);
        }
    }

    $coverTmp =  $_FILES['cover']['tmp_name'];
    $newCover = $timeH . '-cover.png';

    move_uploaded_file($coverTmp, $uploads_dir/$newCover);
?> 



<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="title">Title: </label>
            <input type="text" name="title" />
            <br />
            <label for="topics">Topics: </label>
            <input type="text" name="topics" />
            <br />
            <label for="learnt">Learnt: </label>
            <textarea type="text" name="learnt" rows="8" cols="100">

            </textarea>
            <br />
            <label for="comment">Comment: </label>
            <textarea type="text" name="comment" rows="8" cols="100">

            </textarea>
            <h2>Attachments</h2>
            <label for="cover">Cover Photo</label>
            <input type="file" name="cover">
            <br>
            <br>
            <label for="pictures">Choose files to upload</label>
            <p>
            <input type="file" name="pictures[]">
            <input type="text" name="captions[]">
            </p>
            <p>
            <input type="file" name="pictures[]">
            <input type="text" name="captions[]">
            </p>
            <p>
            <input type="file" name="pictures[]">
            <input type="text" name="captions[]">
            </p>
            <p>
            <input type="file" name="pictures[]">
            <input type="text" name="captions[]">
            </p>
            <p>
            <input type="file" name="pictures[]">
            <input type="text" name="captions[]">
            </p>
            <p>
            <input type="file" name="pictures[]">
            <input type="text" name="captions[]">
            </p>


            <br />

            <input type="submit" value="Send" />

        </form>
    </body>
<html>