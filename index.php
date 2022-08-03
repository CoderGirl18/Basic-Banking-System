<?php
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TSF Pay Bank</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Ubuntu:ital,wght@1,500&display=swap" rel="stylesheet">

</head>
<body >
  <section>
  <nav class="navbar navbar-expand-md " style="background-color: #C39BD3;">
  <a class="navbar-brand"><img src="logo1.png" alt="Logo" width="40" style="margin-bottom:2px;"> <b>TSF Pay Bank</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php" style="color : black; "><b>Home</b></a>
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
 </section>
 <section id="mid">
  <div class="container" style="height:480px; width:1100px; margin-left: 100px;">
    <div class="clearfix">
     <img class="image" src="bg.png" height="480px" width="700px" style="margin-top:-100px;">
     <h2 class="bigheading" style="font-family:serif; margin-left:10px; margin-top:100px;"><b><u>Welcome<br>To<br>TSF Pay Bank</b></u></h2>
    </div>
  </div>
   </section>

   <section id="abt">
      <div class="about" style="height:280px; width:960px; margin-left: 100px;">
        <div class="row activity text-center">
          <div class="col-md act">
            <img src="User.png" class="img-fluid" style="width: 58%; margin-top: 30px;">
            <br>
            <a href="Customers.php" class="w3-button w3-black" style="border-radius: 15px;margin-top: 20px;">View Customers</button></a>
          </div>
          <div class="col-md act">
            <img src="transfer.png" class="img-fluid" style="margin-top:5px;">
            <br>
          <a href="Customers.php" class="w3-button w3-black" style="border-radius:15px; margin-top:20px;">Make a transaction</button></a>
          </div>
          <div class="col-md act">
            <img src="transferhistory.png" class="img-fluid">
            <br>
            <a href="transferhis.php" class="w3-button w3-black" style="margin-top:15px; border-radius: 32px;">Transaction History</button></a>
          </div>
        </div>
  </div>
  </section>

  <section id="contact">
      <p class="copyright" style="color:black;">© Copyright 2022 TSF Pay Bank</p>
  </section>

</body>

</html>
