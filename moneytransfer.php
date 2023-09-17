
<!-- ************************************************************************************************************************************ -->
<!--***********************************************This Page is for Money Transfer Gateway*********************************************** -->
<!-- ************************************************************************************************************************************ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <link rel="shortcut icon" href="./Images/favicon-32x32.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/style1.css">
</head>
<body>

<!--************************************************   Navigation Bar  ****************************************************************** -->

<div class="nav-bar">
    <div class="profile">
      <a href="#"><img src="./Images/logo.png" alt="Person" width="60" height="60"></a>
    </div>
    <ul class="nav-bar-list">
      <li class="nav-item"><a href="./homepage.php">Home</a></li>
      <li class="nav-item"><a href="./customers.php">Customers</a></li>
      <li class="nav-item"><a href="./history.php">Transcations</a></li>
      <li class="nav-item"><a href="./support.html">Support</a></li>
    </ul>
  </div>
<!-- ******************************************************ENDS************************************************************************* -->
<!-- ****************************************************** Heading ******************************************************************** -->
  <div class="head">
    <h1>Money Transfer</h1>
    <h6>Please fill in the following Details</h6>
  </div>
<!-- ****************************************************** ENDS ******************************************************************** -->
  <?php
    include 'connection.php';

        if(isset($_POST['submit']))
            {
                $from = $_GET['Id'];
                $to = $_POST['to'];
                $amount = $_POST['amount'];

                $sql = "SELECT * from `customers` where Id=$from";

                $query = mysqli_query($conn,$sql);
                $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

                $sql = "SELECT * from `customers` where Id=$to";
                $query = mysqli_query($conn,$sql);
                $sql2 = mysqli_fetch_array($query);

// ************************************************   Entered Amount Conditions  **********************************************************
                if (($amount)<0 || ($amount) == 0)
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("ERROR: Enter a Valid amount to transfere")';
                    echo '</script>';
                }
                else if($amount > $sql1['Balance']) //Insufficient Balance
                {

                    echo '<script type="text/javascript">';
                    echo ' alert("ERROR: Insufficient Balance : CHECK YOUR BALANCE")'; 
                    echo '</script>';
                }
                else {
                    // SENDERS BALANCE AFTER TRANSACTION
                    $newBalance = $sql1['Balance'] - $amount;
                    $sql = "UPDATE `customers` set Balance=$newBalance where Id=$from";
                    mysqli_query($conn,$sql);

                    // Receviers Balance after transaction
                    $newBalance = $sql2['Balance'] + $amount;
                    $sql = "UPDATE `customers` set Balance=$newBalance where Id=$to";
                    mysqli_query($conn,$sql);

                    $sender = $sql1['Name'];
                    $receiver = $sql2['Name'];
                    $sql = "INSERT INTO transaction(`sender`, `receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
                    $query=mysqli_query($conn,$sql);

                    if($query){
                        echo "<script> alert('SUCCESS: ₹ ${amount} is Sent to ${receiver} Transaction is Successful!!');
                                window.location='history.php';
                              </script>";
                            }
                            $newBalance= 0;
                            $amount =0;
                }
            }
    ?>


    <!-- form for Transaction -->
    <div style="text-align:center;">

             <?php
                   include 'connection.php';
                   $Id= $_GET['Id'];
                   $sql = "SELECT * FROM  customers where Id=$Id";
                   $result=mysqli_query($conn,$sql);
                   if(!$result)
                   {
                       echo "Error : ".$sql."<br>".mysqli_error($conn);
                   }
                   $rows=mysqli_fetch_assoc($result);
               ?>
               <form method="post" Name="tcredit" class="tabletext" ><br>
                    <div class="container">
                        <table class="customers-table">
                            <tr class="table-head">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Balance</th>
                            </tr>
                            <tr>
                                <td><?php echo $rows['Id'] ?></td>
                                <td><?php echo $rows['Name'] ?></td>
                                <td><?php echo $rows['Email'] ?></td>
                                <td><?php echo $rows['Balance'] ?></td>
                            </tr>
                        </table>
                        </div>
                    <br>
                        <label><b>Send to</b></label>
                        <select Name="to" class="form-control" required>
                            <option value="" disabled selected>--Select the recevier--</option>

                            <?php
                            include 'connection.php';
                            $sid=$_GET['Id'];
                            $sql = "SELECT * FROM `customers` where Id!=$Id";
                            $result=mysqli_query($conn,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($rows = mysqli_fetch_assoc($result)) {
                            ?>

                            <option class="table" value="<?php echo $rows['Id'];?>" >
                                <?php echo $rows['Name'] ;?>
                                (Balance: <?php echo $rows['Balance'] ;?> )
                            </option>
                        <?php
                            }
                        ?>
                    </select>

                    <br>
                            <label><b>Amount</b></label>
                            <input type="number" Name="amount" class="sup-number" required>
                            <br>
                            <br>
                            <div>
                                <button class="mt-btn" Name="submit" type="submit">Transfer Amount</button>
                            </div>
                    </form>
        </div>
</body>
</html>