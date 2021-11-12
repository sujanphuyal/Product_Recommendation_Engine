<?php 
include("header.php");
include("db.php");

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add_user.php">Add Users</a>
            
        </h2>
    </div>
    <div class="panel-body">
        <table class="table table-stripped">
            <th>Username</th>
            <th>Add Products</th>
            <th>Show Products</th>
            <th>Show Recommendation</th>

            <?php $result=mysqli_query($con, "select * from users");
            while($row=mysqli_fetch_array($result))
            {
            ?>
           <tr> <td> <?php echo $row['username']; ?></td> 
            <td> 
               <form action="add_products.php">
                   <input type="submit" name="add_products" class="btn btn-primary" value="Add Products">
                   <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
               </form>
           </td> 

        <td> 
               <form action="show_products.php">
                   <input type="submit" name="show_products" class="btn btn-primary" value="Show Products">
                   <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
               </form>
           </td>
           
           <td> 
               <form action="user_recom.php">
                   <input type="submit" name="show_products" class="btn btn-primary" value="Show Recommendation">
                   <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
               </form>
           </td>

        </tr>

            <?php } ?>

        </table>
    </div>
</div>