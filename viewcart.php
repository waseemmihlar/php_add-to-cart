<?php
session_start();
//print_r($_SESSION["cart"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("head.php");
    ?>
</head>
<body>

<div class="container">
        <h1 class="text-center">Add to cart in php</h1><br>
        <a href="index.php" class="btn btn-primary btn-sm" >Home</a><br>
        <!--btn-success,info,danger,warning,primary-->
<?php
    if(!empty($_SESSION["cart"]))
    {
        if(isset($_GET["del"]))
        {
            foreach($_SESSION["cart"] as $keys=>$values)
            {
                if($values['pid']==$_GET['del'])
                {
                    unset($_SESSION["cart"][$keys]);
                }
            }
        }
    }
    ?>

    <table class="table table-bordeded">
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>Price</strong></th>
            <th><strong>Quantity</strong></th>
            <th><strong>Total</strong></th>
            <th><strong>Remove</strong></th>
        </tr>

        <?php
            if(!empty($_SESSION["cart"]))
            {
                $total=0;
                foreach($_SESSION["cart"] as $keys=>$values)
                {

                    $itemtotal=intval($values["price"])*intval($values["qty"]);
                    $total+=$itemtotal;

        ?>
        <tr>
            <td><?php echo $values['pname'];?></td>
            <td><?php echo $values['price'];?></td>
            <td><?php echo $values['qty'];?></td>
            <td><?php echo $itemtotal;?></td>
            <td><a href="<?php echo 'viewcart.php?del=',$values["pid"]?>">Remove</a></td>
        </tr>

        <?php
             }
        ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td><?php echo $total;?></td>
        </tr>

    </table>
                 <?php  
                }
                ?>

            </div>

</body>
</html>



