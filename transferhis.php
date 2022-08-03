<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>TSF Pay Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Ubuntu:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color : #E6E6FA;">
 <section>
  <nav class="navbar navbar-expand-md " style="background-color: #C39BD3;">
  <a class="navbar-brand" href="logo1.php" style="color:black "><img src="logo1.png" alt="Logo" width="40" style="margin-left:20px;"> <b style="top:100%;">TSF Pay Bank</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php" style="color : black;"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Customers.php" style="color : black;"><b>Customers</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transfermoney.php" style="color : black;"><b>Transfer Money</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transferhis.php" style="color : black;"><b>Transaction history</b></a>
          </li>
      </div>
   </nav>
</section>
        <h2 class="text-center pt-4">Transaction History</h2><br>
    <table class="table" style="width:90%;margin-left:50px;text-align: center;">
        <thead>
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="SELECT * FROM transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2">Rs. <?php echo $rows['balance']; ?> /-</td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>

        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>


<section id="contact" style="margin-top:100px;">
  <p style="color:black;">© Copyright 2022 TSF Pay Bank</p>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
