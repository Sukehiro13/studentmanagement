
        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">View Form</label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Login
            </div>
            <form action="users.php" class="login__form" method="POST">
               <div class="data">
                  <label>User</label>
                  <input type="username" class="login__input" id="username" placeholder="Username" name="username" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" class="login__input" id="password" placeholder="Password" name="password" required>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit">login</button>
               </div>
            </form>
      </div>
   </body>
</html>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Popup Login Form Design | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Login
            </div>
            <form action="#">
               <div class="data">
                  <label>User</label>
                  <input type="username" class="login__input" id="username" placeholder="Username" name="username" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" id="password" placeholder="Password" name="password" required>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit">login</button>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>