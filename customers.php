<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Images/favicon-32x32.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/style1.css">
    <title>Customers</title>
</head>

<body>
    <div class="nav-bar">
        <div class="profile">
            <a href="#"><img src="./Images/logo.png" alt="Person" width="60" height="60"></a>
        </div>
        <ul class="nav-bar-list">
            <li class="nav-item"><a href="./index.php">Home</a></li>
            <li class="nav-item"><a href="#" active>Customers</a></li>
            <li class="nav-item"><a href="./history.php">Transcations</a></li>
            <li class="nav-item"><a href="./support.html">Support</a></li>
        </ul>
    </div>
    <div class="head">
        <h1 style="margin-top: 100px;">Customers</h1>
        <h6>The customers details available with the user</h6>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="customers-table">
                <thead>
                    <tr class="table-head">
                        <th>Sl. No.</th>
                        <th>Name</th>
                        <th>Account_Number</th>
                        <th>Email ID</th>
                        <th>Bank Balance(in &#8377;)</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $database = "Ratnala_Bank";

                    $connection = new mysqli($server, $user, $pass, $database);
                    if ($connection->connect_error) {
                        die("Connection Failed: " . $connection->connect_error);
                    }

                    $sql = "SELECT * FROM `Customers`";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        echo '<tr>';
                        echo '<td>' . $row["id"] . '</td>';
                        echo '<td>' . $row["Name"] . '</td>';
                        echo '<td>' . $row["Account Number"] . '</td>';
                        echo '<td>' . $row["Email"] . '</td>';
                        echo '<td>' . $row["Balance"] . '</td>';
                        echo "<td>
                            <a class='trans-btn' ' href='moneytransfer.php?Id=$id'>Transfer</a>
                         </td>";
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>