<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";

    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient Balance.
    else if($amount > $sql1['Balance'])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {

                // deducting amount from sender's account
                $newBalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE customers set Balance=$newBalance where id=$from";
                mysqli_query($conn,$sql);


                // adding amount to reciever's account
                $newBalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE customers set Balance=$newBalance where id=$to";
                mysqli_query($conn,$sql);

                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transferhis.php';
                           </script>";
                }
                $newBalance= 0;
                $amount =0;
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta Name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="favicon.ico">
    <title>TSF Pay Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Ubuntu:ital,wght@1,500&display=swap" rel="stylesheet">
<style media="screen">
table, th, td,tr {
  border: 1px solid black;
  border-collapse: collapse;
  width: auto;
  right: 100%;


}
</style>
</head>

<body style="background-color :#E6E6FA;">
  <section>
  <nav class="navbar navbar-expand-md " style="background-color: #C39BD3;">
  <a class="navbar-brand" href="logo.php" style="color:black"><img src="logo1.png" alt="Logo" width="40" style="margin-bottom:4px;"> <b>TSF Pay Bank</b></a>
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

   <div style="width:90%; margin:0px 60px 0px 50px;">
           <h2 class="text-center pt-4">Transaction</h2>
               <?php
                   include 'config.php';
                   $id= $_GET['id'];
                   $sql = "SELECT * FROM  customers where id=$id";
                   $result=mysqli_query($conn,$sql);
                   if(!$result)
                   {
                       echo "Error : ".$sql."<br>".mysqli_error($conn);
                   }
                   $rows=mysqli_fetch_assoc($result);
               ?>
               <form method="post" Name="tcredit" class="tabletext" ><br>
           <div>
               <table class="table">
                   <tr>
                       <th style="background-color:#C39BD3;" class="text-center">Id</th>
                       <th style="background-color:#C39BD3 ;" class="text-center">Name</th>
                       <th style="background-color:#C39BD3 ;" class="text-center">Email</th>
                       <th  style="background-color:#C39BD3;"class="text-center">Balance</th>
                   </tr>
                   <tr>
                       <td class="py-2"><?php echo $rows['id'] ?></td>
                       <td class="py-2"><?php echo $rows['Name'] ?></td>
                       <td class="py-2"><?php echo $rows['Email'] ?></td>
                       <td class="py-2"><?php echo $rows['Balance'] ?></td>
                   </tr>
               </table>
           </div>
           <br>
           <label style="margin-left:20px;"><b>Transfer To:</b></label>
           <select Name="to" class="form-control" required>
               <option value="" disabled selected>Choose</option>
               <?php
                   include 'config.php';
                   $sid=$_GET['id'];
                   $sql = "SELECT * FROM customers where id!=$id";
                   $result=mysqli_query($conn,$sql);
                   if(!$result)
                   {
                       echo "Error ".$sql."<br>".mysqli_error($conn);
                   }
                   while($rows = mysqli_fetch_assoc($result)) {
               ?>
                   <option class="table" value="<?php echo $rows['id'];?>" >

                       <?php echo $rows['Name'] ;?>
                    (Balance: <?php echo $rows['Balance'] ;?> )

                   </option>
               <?php
                   }
               ?>
               <div>
           </select>
           <br>
           <br>
               <label style="margin-left:20px;"><b>Amount:</b></label>
               <input type="number" class="form-control" Name="amount" required>
               <br><br>
                   <div class="text-center" >
               <button class="btn mt-3" Name="submit" type="submit" style="background-color:#C39BD3 ;">Transfer Amount</button>
               </div>
           </form>
       </div>
       <section id="contact" style="margin-top:30px; color:black;">
          <p>© Copyright 2022 TSF Pay Bank</p>
        </section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
