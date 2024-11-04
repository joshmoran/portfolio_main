<?php

        try {
            //session_destroy();
            session_start();
            session_destroy();

            setcookie("customer_id", $row['customer_id'], time() -  3600 );
			setcookie('basket_id', $basketID, time() - 3600);
			setcookie('username', $$_POST['username'], time() - 3600);
			setcookie("loggedIn", true, time() - 3600);
			setcookie("admin", false, time() - 3600);


            header('Location: index.php');
            
        } catch (Exception $e) {
        }
        //header("Location: index.php");
