<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <div class="container"></div>
    <h2><div class="well text-center">Recommendation Engine</div></h2>
</html>


<?php

include("db.php");
include("recommend.php");

$products= mysqli_query($con,"select * from user_products");

$matrix=array();

while($product=mysqli_fetch_array($products))
{
    $users=mysqli_query($con,"select username from users where id=$product[user_id]");
    $username=mysqli_fetch_array($users);

    $matrix[$username['username']][$product['product_name']]=$product['product_rating'];

}

// echo "<pre>";
// print_r($matrix);
// echo "</pre>";

$users=mysqli_query($con,"select username from users where id=$_GET[id]");
    $username=mysqli_fetch_array($users);

?>



<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-stripped">
            <th>Product Name</th>
            <th>Product Rating</th>

            <?php 
            $recommendation=array();
            $recommendation=getRecommendation($matrix,$username['username']);

            foreach($recommendation as $product=>$rating)
            {
            ?>
           <tr> 
               <td> <?php echo $product; ?></td> 
               <td> <?php echo $rating; ?></td>
           
        </tr>

            <?php } ?>

        </table>    
    </div>   
</div>
<div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add_products.php">Add Product</a>
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>
    </div> 
