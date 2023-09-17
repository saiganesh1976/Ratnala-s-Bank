
<!-- ************************************************************************************************************************************ -->
<!--***********************************************This Page is for Transaction History ************************************************ -->
<!-- ************************************************************************************************************************************ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
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
        <li class="nav-item"><a href="#">Transcations</a></li>
        <li class="nav-item"><a href="./support.html">Support</a></li>
        </ul>
    </div>

<!-- ****************************************************** Heading ******************************************************************** -->
    <div class="head">
      <h1 style="margin-top: 100px;">Transactions History </h1>
    </div>

<!--************************************************   Table Creation ****************************************************************** -->

    <div class="container">

        <table class="customers-table">
            <thead>
                <tr class="table-head">
                    <th>S.No.</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Time Stamp</th>
                </tr>
            </thead>
            <tbody>

            <?php
                include 'connection.php';
                $sql ="SELECT * FROM `transaction`";
                $query =mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($query))
                {
                ?>
                <!-- html -->
                <tr>
                <td><?php echo $rows['sno']; ?></td>
                <td><?php echo $rows['sender']; ?></td>
                <td><?php echo $rows['receiver']; ?></td>
                <td> &#8377; <?php echo $rows['balance']; ?> /-</td>
                <td><?php echo $rows['Time_Stamp']; ?> </td>
                <!-- html -->
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

</body>
</html>