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

function susp(id)
{
  if(confirm('Suspend User?'))
  {
    alert(id);

    window.location='suspenduser.php?uid='+id
  }
}

function lift(id)
{
  if(confirm('Lift the Suspension?'))
  {
    alert(id);

    window.location='liftban.php?uid='+id
  }
}

function del(id)
{
  if(confirm('Remove User?'))
  {
    alert(id);

    window.location='deleteuser.php?uid='+id
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
    include('../../components/admintopnav.php');?>

    <main style="padding-top: 150px"> 
    <?php  

  

    $count=0;
    $query="SELECT * FROM users ";
    $Rows=mysqli_query($conn,$query);

 
     echo'<table  style="width:200px;height:500px;border:2px solid black" class="data-table">
  <thead>
  <tr> 
    <th>User Id</th>  
    <th>User Name</th>
    <th>Email</th>
    <th>Contact</th> 
    <th>Address</th> 
    <th>Subtype</th>
    <th>Status</th>
    <th>Suspend</th>
    <th>Lift</th>
    <th>Delete</th>        
  </tr>
</thead>

<tbody>';

while ($row=mysqli_fetch_array($Rows))
 {

    echo "<tr>";
       

    echo "<td>";
    echo $row['id'];
    echo "</td>";

    echo "<td>";
    echo $row['username'];
    echo "</td>";

    echo "<td>";
    echo $row['email'];
    echo "</td>";

    echo "<td>";
    echo $row['contact'];
    echo "</td>";

    echo "<td>";
    echo $row['address'];
    echo "</td>";

    echo "<td>";
    echo $row['subtype'];
    echo "</td>";

    
    echo "<td>";
    echo $row['status'];
    echo "</td>";

    echo "<td>";
    if($row['status']!='Suspended'){?>
    <a href="javascript:susp(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/suspend.png"  width="50px" height="50px"  alt="suspend" /> </a>

    <?php }
   
    echo "</td>";

    echo "<td>";
    if($row['status']=='Suspended'){?>
    <a href="javascript:lift(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/lift.png"  width="50px" height="50px"  alt="lift" /> </a>

    <?php }
   
    echo "</td>";

    echo "<td>";
    ?>
    <a href="javascript:del(<?php echo $row[0]; ?>)"> <img src="../../Public/Assets/Images/del.png"  width="50px" height="50px"  alt="delete" /> </a>

    <?php 
   
    echo "</td>";

     }

 echo "</form>";
 echo "</tbody>";
   

  


?>
</main>

</body>

</html>


