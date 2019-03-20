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
      <img src="./Public/Assets/Images/bli.jpg" height="100px" width="200px"  >
     
    </a>

    <div class="container">

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link waves-effect" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
            <div class = "dropdown">
              <a class="nav-link waves-effect">Categories
              <i class="fa fa-caret-dwn"></i></a>
              <div class = "dropdown-content">
                <a href = "./Functions/categories/Mobile Phones.php">Mobile Phones</a>
                <a href = "./Functions/categories/Laptops.php">Laptops</a>
                <a href = "./Functions/categories/Clothes.php">Clothes</a>
                <a href = "./Functions/categories/Accessories.php">Accesories</a>
                <a href = "./Functions/categories/Home Appliances.php">Home Appliances</a>
                <a href = "./Functions/categories/Furniture.php">Furniture</a>
                <a href = "./Functions/categories/Books.php">Books</a>
              </div>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href = "./Public/html/AboutUs.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href = "./Public/html/help.html">Help</a>
        </li>
      </ul>

      <ul class="navbar-nav mx-auto">
      <li class="nav-item">
      <form class="form-inline" action="./Functions/main/search.php" method="POST">
       
          <input class="form-control" name="search" placeholder="Search" aria-label="Search" width = "300px" >
          <button type="submit" style = "padding:5px">
          <i class="fa fa-search rounded-circle" aria-hidden="false"></i>
          </button>
        
      </form>
      </li>
      </ul>
      


      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">

         <li class="nav-item">
          <a class="nav-link waves-effect" href = "./Functions/main/signup.php">
           Sign Up
          </a>
        </li>
        
        <li class="nav-item">
        <a class = "nav-link waves-effect" href = "./Functions/main/signin.php">Sign In</a>
        </li>
       
        
      </ul>

    </div>

  </div>
</nav>