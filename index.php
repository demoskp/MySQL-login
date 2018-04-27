<?php
session_start();
 ?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    </head>
    <body>
        <section class="bg-image mt-5">
            <div class="container">
                <?php
                  if(isset($_SESSION['u_id'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                      <button action="submit" name="submit" class="btn btn-danger">Logout</button>
                    </form>';
                  } else {
                    echo '<form action="includes/login.inc.php" method="post">
                        <div class="row">
                            <div class="col-md-6 offset-md-3 form-group">
                                <label for="username">Username/Email</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter email or Username">
                            </div>
                            <div class="col-md-6 offset-md-3 form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" name="submit" class="mt-2 btn btn-primary">Login</button>
                                <a href="signup.php" class="mt-2 btn btn-secondary">Sign Up</a>
                            </div>
                        </div>
                    </form>' ;
                  }
                 ?>


                <?php if(isset($_SESSION['u_id'])) { echo "<p>You are logged in<p/>"; } ?>
            </div>
        </section>
    </body>
</html>
