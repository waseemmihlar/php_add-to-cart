<?php
include "config.php";
session_start();
?>


<html>
<head>
    <?php
        include "head.php";
    ?> 
</head>
<body>

    <div class="container">
    <h1 class="text-center">Add to cart in php</h1><hr>
       
    <?php

        if(isset($_POST["submit"]))
        {
            if(isset($_SESSION["cart"]))
            {

                $all_id=array_column($_SESSION["cart"],'pid');

                if(!in_array($_GET["id"],$all_id))
                {
                    $index=count($_SESSION["cart"]);
                    $product_info=array(
                        "pid"=>$_GET["id"],
                        "pname"=>$_POST["m_name"],
                        "price"=>$_POST["price"],
                        "qty"=>$_POST["quantity"],
                    );
                    
                    $_SESSION["cart"][$index]=$product_info;

                    echo'<script>alert("product added...")</script>';
                    header("location:viewcart.php");
                }
                else
                {
                    echo'<script>alert("product already selected \nmodify your order")</script>';
                }
            }

            else
            {
                $product_info=array(
                    'pid'=>$_GET["id"],
                    'pname'=>$_POST["m_name"],
                    'price'=>$_POST["price"],
                    'qty'=>$_POST["quantity"],
                );

                $_SESSION["cart"][0]=$product_info;

                echo'<script>alert("product added...")</script>';
                header("location:viewcart.php");
            }

               
        }
            

        if(isset($_GET["id"]))
        {
            $query="select * from mobile_type where pid={$_GET["id"]}";
            //$query='select * from mobile_type where pid='.$_GET['id'].'
            $exec=$con->query($query);

            if($exec->num_rows>0)
            {

                $row=$exec->fetch_assoc();
              
                //print_r($row);
                
            ?>

                <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
                <table>
                    <tr>
                        <td colspan=2>
                        <img src="images/<?php echo $row["image_url"];?>" alt="no image"></img>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right:30px">
                        <p class="text-center">Product Name</p></td>
                        <td><p class="text-center"><strong><?php echo $row["pname"];?></strong></p></td>    
                    </tr>
                    <tr>
                        <td><p>Product Model</p></td>
                        <td><p><?php echo $row['pmodel'];?></p></td>    
                    </tr>
                    <tr>
                        <td><p>Ram</p></td>
                        <td><p><?php echo $row['ram'];?></p></td>    
                    </tr>
                    <tr>
                        <td><p>Storage</p></td>
                        <td><p><?php echo $row['storage'];?></p></td>    
                    </tr>
                    <tr>
                        <td><p>Display</p></td>
                        <td><p><?php echo $row['display'];?></p></td>    
                    </tr>
                    <tr>
                        <td><p>Battery</p></td>
                        <td><p><?php echo $row['battary'];?></p></td>    
                    </tr>
                    <tr>
                        <td><p>Price</p></td>
                        <td><p><?php echo $row['price'];?></p></td>    
                    </tr>

                    <tr>
                        <td><p>Quantity</p></td>
                        <td><input type="number" name="quantity" required>
                        <input type="hidden" name="m_name" value="<?php echo $row['pname'];?>">
                        <input type="hidden" name="price" value="<?php echo $row['price'];?>">
                    </td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Add to cart" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>
              
            <?php
                
            }
            else
            {
                header("location:index.php");
              
            }
        }
        else
        {
            header("location:index.php");
        }
    ?>
    
 </div>
</body>
</html>