<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    <title>TSF Pay Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Ubuntu:ital,wght@1,500&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body >
    <section>
    <nav class="navbar navbar-expand-md " style="background-color: #C39BD3;">
    <a class="navbar-brand"><img src="logo1.png" alt="Logo" width="40" style="margin-bottom:4px;margin-left:20px;"> <b>TSF Pay Bank</b></a>
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
              <a class="nav-link" href="Customers.php" style="color : black;"><b>Transfer Money</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transactionhis.php" style="color : black;"><b>Transaction history</b></a>
            </li>
        </div>
     </nav>
   </section>
     <section style="background-color: #E6E6FA;">
     <div style="background-color: #E6E6FA;">
   <h3 class="text-center pt-4"><b>List of Customers</b></h3>
    <br>
    <table class="table" style="margin-left:50px;margin-right: 20px;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Balance</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "TSFPay";

        $connection = new mysqli($server, $user, $pass, $database);
        if ($connection->connect_error) {
            die("Connection Failed: ". $connection->connect_error);
          }

        $sql = "SElECT * FROM Customers";
        $result = $connection->query($sql);

        if(!$result){
          die("Invalid query: ". $connection->error);
        }

        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          echo '<tr>';
          echo  '<td>' . $row["id"] . '</td>';
          echo  '<td>' . $row["Name"] . '</td>';
          echo   '<td>' . $row["Email"] . '</td>';
          echo  '<td>' . $row["Balance"] . '</td>';
          echo   "<td>
                <a class='btn  btn-sm'style='background-color:#C39BD3 ;' href='transfermoney.php?id=$id'>Transfer</a>
             </td>";
           echo '</tr>';
        }
         ?>
      </tbody>
    </table>
  </div>
  <section id="contact">
    <p style="color:black;">© Copyright 2022 TSF Pay Bank</p>
  </section>
  </body>
</html>
