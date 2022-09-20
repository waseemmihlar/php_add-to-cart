<?php 
    include "config.php"
?>

<html>
    <head>
        <?php 
            include "head.php"
        ?>
    </head>

    <body>
        <div class="container">
        <h1 class="text-center">Add to cart in php</h1><hr>
            <div class="row">
                

                <?php
                    $sqlquery="select * from mobile_type";
                    
                    $execquery=$con->query($sqlquery);

                    if($execquery->num_rows>0)
                    {

                        while($row=$execquery->fetch_assoc())
                        {

                            echo'
                            <div class="col-sm-4 col-md-4 col-lg-3 text-center">
                                <img src="images/'.$row['image_url'].'"></img>
                                <p><strong><a href="@">'.$row['pname'].'</a></strong></p>
                                <h4 class="text-danger">'.$row['price'].'</h4>
                                <p><a href="view.php?id='.$row['pid'].' " class="btn btn-success">View details</a></p>
                            </div>
                            ';
                        }

                    }



                ?>

            </div> 
        </div>
        
    </body>
</html>