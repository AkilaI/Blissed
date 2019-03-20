<style>
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>






<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    
    <!-- Brand -->
    <a class="navbar-brand">
      <img src="../../Public/Assets/Images/bli.jpg" height="100px" width="200px"  >
    </a>
  
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

      
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect"  href="../../index.php?logged">
             Home
            </a>
          </li>
          <li class="nav-item">
            <div class = "dropdown">
              <a class="nav-link waves-effect">Categories
              <i class="fa fa-caret-dwn"></i></a>
              <div class = "dropdown-content">
                <a href = "../../Functions/categories/Mobile Phones.php?logged">Mobile Phones</a>
                <a href = "../../Functions/categories/Laptops.php?logged">Laptops</a>
                <a href = "../../Functions/categories/Clothes.php?logged">Clothes</a>
                <a href = "../../Functions/categories/Accessories.php?logged">Accesories</a>
                <a href = "../../Functions/categories/Home Appliances.php?logged">Home Appliances</a>
                <a href = "../../Functions/categories/Furniture.php?logged">Furniture</a>
                <a href = "../../Functions/categories/Books.php?logged">Books</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href = "../../Public/html/AboutUs.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href = "../../Public/html/AboutUs.html">Help</a>
          </li>
        </ul>

        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
          <form class="form-inline" action="../../Functions/main/search.php?logged" method="POST">
       
       <input class="form-control" name="search" placeholder="Search" aria-label="Search" width = "300px" >
       <button type="submit" style = "padding:5px">
       <i class="fa fa-search rounded-circle" aria-hidden="false"></i>
       </button>
            </form>
          </li>
        </ul>

        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
          <?php
            echo '<a class = "nav-link waves-effect" href = "../users/userhome.php?user='.$_SESSION['id'].'&subtype='.$_SESSION['subtype'].'"> '.$_SESSION['username'].'</a>';?>
          </li>
          <li class="nav-item">
            <a class = "nav-link waves-effect" href ="../main/logout.php?logout">Log Out</a>
          </li>
        </ul>
      
      </div>

    </div>
  </nav>