<?php include('header.php'); ?>

<section class="form-signin">
    <form method="POST" action="checklog.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required id="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required id="password"/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</section><!-- content -->
<?php include('footer.php'); ?>
 

