<?php 
require_once('../../connection/dbconnection.php');
session_start();

if(!isset($_SESSION['username']))
	{
		header('location:../../index.php');
		exit;
	}
	
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>User Home</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../Public/css/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../Public/css/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../../Public/css/css/style.min.css" rel="stylesheet">
  <link href="../../Public/css/customstyles.css" rel="stylesheet">

  <script type="text/javascript">

function view(id)
{
  if(confirm('Mark as Viewed?'))
  {
    alert(id);

    window.location='Viewnotifications.php?msgid='+id
  }
}

function del(id)
{
  if(confirm('Delete Message?'))
  {
    alert(id);

    window.location='Deletenotifications.php?msgid='+id
  }
}
</script>

  <style>

    .msg
    {
    font-size: 30px;

    padding: 10px;
    margin-left: 200px;

    }
    table {
        margin: auto;
        font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
        font-size: 12px;
    }

    h1 {
        margin: 25px auto 0;
        text-align: center;
        text-transform: uppercase;
        font-size: 17px;
    }

    table td {
        transition: all .5s;
    }
    
    /* Table */
    .data-table {
        border-collapse: collapse;
        font-size: 14px;
        min-width: 800px;
    }

    .data-table th, 
    .data-table td {
        border: 1px solid #e1edff;
        padding: 7px 17px;
    }
    .data-table caption {
        margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
        background-color: #2F4F4F;
        color: #FFFFFF;
        border-color:black !important;
        text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
        color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
        text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
        background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
        background-color: #008080;
        border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
        background-color: #2F4F4F;
        text-align: right;
    }
    .data-table tfoot th:first-child {
        text-align: left;
    }
    .data-table tbody td:empty
    {
        background-color: #ffcccc;
    }



    </style>
</head>

<body>
<?php
    include('../../components/usertopnavbar.php');?>

    <main style="padding-top: 150px"> 
    <?php  

        $uname=$_GET['name'];
        $id = $_GET['user'];

        $count=0;
        $query="SELECT * FROM notifications WHERE user='$uname'";
        $Rows=mysqli_query($conn,$query);
        $query1="SELECT * FROM notifications WHERE user='$uname' AND viewStatus = 'No'";
        $Rows1=mysqli_query($conn,$query1);
        $count= mysqli_num_rows($Rows1);



  

        if($count==0){
            echo "<br><br>";
            echo "<h1 style='font-size:30px;color:green'>";
            echo "You Have Not Any New Notification Now";
            echo "</h1>";
        }

        if($count>0){

        echo "<script> alert('You Have $count New Notification');</script>";

 
        echo'<table  style="width:200px;height:500px;border:2px solid black" class="data-table">
        <thead>
            <tr> 
                <th>Message ID</th>  
                <th>Message</th>
                <th>Mark as Read</th>
                <th>Delete Message</th>   
            </tr>
        </thead>

        <tbody>';

            while ($row=mysqli_fetch_array($Rows)){

            echo "<tr>";
            

            echo "<td>";
            echo $row['msgID'];
            echo "</td>";

            echo "<td>";
            echo $row['message'];
            echo "</td>";

            echo "<td>";
            if($row['viewStatus']=='No'){?>
            <a href="javascript:view(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/seen.png"  width="50px" height="50px"  alt="seen" /> </a>

            <?php }
   
            echo "</td>";

            echo "<td>";
            ?>
            <a href="javascript:del(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/delete.png"  width="50px" height="50px"  alt="delete" /> </a>

            <?php 
        
            echo "</td>";

        }
    }
    ?>
    </main>

</body>
 

</html>


