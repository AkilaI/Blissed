<?php 
include('../../config/detmanage.php');


$keys = array_keys($err);
$desired_keys = array('bname','desc','sdate','edate','price','img','quan','cat','date');

foreach($desired_keys as $desired_key){
   if(in_array($desired_key, $keys)) continue;  // already set
   $err[$desired_key] = '';
}

 ?>


<head>
 <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}

</style>
</head>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post" action="sellitem.php" enctype="multipart/form-data">
                    
                    <div class="form-group ">
                        <label class="control-label requiredField" for="brand">
                            Item Brand
                            <span class="asteriskField">
                            *
                            </span>
                        </label>
                        <input class="form-control" id="brand" name="brand" placeholder="Item Brand"  type="text"/>
                        <?php 
                            echo '<span style = "color:red;">'; echo $err['bname']; echo '</span>';
                        ?>
                    </div>
                    <div class="form-group ">
                        <label class="control-label " for="model">
                         Item Model
                        </label>
                        <input class="form-control" name="model" type="text"/>
                    </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="desc">
                    Description
                    <span class="asteriskField">
                    *
                    </span>
                    </label>
                    <textarea class="form-control" cols="40" id="desc" name="desc" placeholder="Add item details.." rows="10"></textarea>
                    <?php 
                        echo '<span style = "color:red;">'; echo $err['desc']; echo '</span>';
                    ?>
                </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="sprice">
                    Price
                    <span class="asteriskField">
                    *
                    </span>
                    </label>
                    <input class="form-control" id="price" name="price" placeholder="Price" type="text"/>
                    <?php 
                        echo '<span style = "color:red;">'; echo $err['price']; echo '</span>';
                    ?>
                </div>
                <div class="form-group ">
                    <label class="control-label " for="quantity">
                    Quantity
                    <span class="asteriskField">
                    *
                    </span>
                    </label>
                    <input class="form-control" id="quantity" name="quantity" placeholder="Quantity" type="text"/>
                    <?php 
                        echo '<span style = "color:red;">'; echo $err['quan']; echo '</span>';
                    ?>
                </div>
                <div class="form-group ">
                    <label class="control-label " for="mprice">
                    Image
                    </label><span class="asteriskField">
                    *
                    </span>
                    <input class="form-control" id="image" name="image" type="file"/>
                    <?php 
                        echo '<span style = "color:red;">'; echo $err['img']; echo '</span>';
                    ?>
                </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="sdate">
                    Start Date
                    <span class="asteriskField">
                    *
                    </span>
                    </label>
                    <input class = "form-control" id="sdate" name="sdate" type="date"> 
                    <?php 
                        echo '<span style = "color:red;">'; echo $err['sdate']; echo '</span>';
                    ?>
                </div>

                <div class="form-group ">
                    <label class="control-label requiredField" for="edate">
                    End Date
                    <span class="asteriskField">
                    *
                    </span>
                    </label>
                    <input class = "form-control" id="edate" name="edate" type="date"> 
      
                    <?php 
                        echo '<span style = "color:red;">'; echo $err['edate']; echo '</span>';
                        echo '<span style = "color:red;">'; echo $err['date']; echo '</span>';
                    ?>
                </div>


 <label class="control-label requiredField" for="duration">
       Category
       <span class="asteriskField">
        *
       </span>
      </label>
          <select class="select form-control" id="category" name="category">
       <option value="Mobile Phones">
        Mobile Phones
       </option>
       <option value="Laptops">
        Laptops
       </option>
       <option value="Clothes">
        Clothes
       </option>
       <option value="Accessories">
        Accesories
       </option>
       <option value="Home Appliances">
        Home Appliances
       </option>
       <option value="Furniture">
        Furniture
       </option>
       <option value="Books">
        Books
       </option>


      </select>
      <?php 
         echo '<span style = "color:red;">'; echo $err['cat']; echo '</span>';
      ?>
      <br>
      



     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="sell_item" type="submit">
        Sell Item
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>



