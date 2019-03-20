<?php
include('../../config/detmanage.php');
?>


<html>
  <head>
    <title>
      feedback form
    </title>
    <style type="text/css">
      body{
  margin: 0;
  padding: 0;
  text-align: center;
  background: linear-gradient(rgba(0,0,150,0.5),rgba(0,0,50,0.5)),url(log.jpg);
  background-size: cover;
  background-position: center;
  font-family: sans-serif;

}
.feedback-title
{
  margin-top: 100px;
  color: #fff
  text-transform: uppercase;
  transition: all 4s ease-in-out;
}

form{
  margin-top: 50px;
  transition: all 4s ease-in-out;
}

.form-control{
  width: 600px;
  background: transparent;
  border:none;
  outline: none;
  border-bottom: 1px solid gray;
  color: #fff;
  font-size: 18px;
  margin-bottom: 16px;
}

input{
  height: 45px;

}

form .submit{
  background:#ff5722;
  border-color: transparent;
  color: #fff
  font-size: 20px;
  letter-spacing: 2px;
  height: 50px;
  margin-top: 20px;
}

form .submit:hover
{
  background-color: #f44336;
  cursor: pointer;
}
      
    </style>
  </head>
  <body>
    <form action="feedback.php" method="post">
    <div class="Feedback-title">
      <h1> HELLO </h1>
      <h2> We BLISSED will always be there to listen to you and serve for you as per your wish! </h2>
    </div>
    <div class="feedback-form">
      <form id="feedback-form" method="post" action="">
      <input type="text" name="name" class="form-control" placeholder="Your Name" required>
      <br>
      <textarea name="message" class="form-control" placeholder="Message" row="4"></textarea>
      <br>
      <input type="submit" name = "feed" class="form-control submit" value="SEND MESSAGE">
    </form>
  </body>
</html>