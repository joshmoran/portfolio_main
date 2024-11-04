<?php 
include 'inc/variables.php';
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
        <link type="text/css" rel="stylesheet" href="css/about.css" />
        <title><?php echo $websiteName;?> - About</title>
    </head>
    <body>
        <div id="container">
            <?php include 'inc/header.php'; ?>
            <div id="content">
                <div id="row">
                    <div id="leftShop">
                        <img src="img/shop_1.jpg" class="shop" alt="" />
                    </div>
                    <div id="rightShop">
                        <img src="img/shop_2.jpg" class="shop" alt="" />
                    </div>
                </div>
                <div id="row">
                    <div id="left">
                        <h2>Description</h2>
                    </div>
                    <div id="right">
                        <h2>Our objectives, values and hopes</h2>
                        <p>Description</p>
                        <br>
                        <h2>Who We Are</h2>
                        <p>Description</p>
                    </div>
                </div>
                <div id="openingRow">
                        <div id="left">
                            <h2>Opening Times</h2>
                        </div>
                        <div id="right">
                        <table>
                            <tr>
                                <th>Day of the Week</th>
                                <th>Opening Times</th>
                            </tr>
                            <tr>
                                <td>Monday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>09.00 to 17.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            
                <div id="row">
                    <div id="left">
                        <h2>Reviews and Ratings</h2>
                        <p>Rating (based on 90 reviews)</p>
                        <div id="rating">
                            <img src="img/star.svg" alt="A star in the ratings" />
                            <img src="img/star.svg" alt="A star in the ratings" />
                            <img src="img/star.svg" alt="A star in the ratings" />
                            <img src="img/star.svg" alt="A star in the ratings" />
                            <img src="img/star.svg" alt="A star in the ratings" />
                        </div>
                        <p><a href="https://www.facebook.com/cakeaholicsbyclaire/reviews">Read our reviews here.</a></p>
                    </div>
                    <div id="right">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fangela.tucker.18041%2Fposts%2Fpfbid037HkMaALWkcXhzAV7NVoqQHCZqjrvTFZM14qWLhmFb4gnyRVBHvCjb3NYARv43Srkl&show_text=true&width=500" width="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="false" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fjools.logan%2Fposts%2Fpfbid032a4tGGyJGA214esBwfvuCLV6qp21Q6yiJnYukunJVpdReMmSWxRKzaotvCopbR5ml&show_text=true&width=500" width="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="false" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fsharon.lake.9406%2Fposts%2Fpfbid02S4Twf1q2wedpNDdJG7vBpWYNVZucn188YP2dU7rPkEnjFqWNjXoF97SHME86sMZPl&show_text=true&width=500" width="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="false" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
                
            </div>
            <?php include 'inc/footer.php'; ?>
        </div>
    </body>
</html>

