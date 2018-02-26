<?php include('header.php'); ?>
    <div class="container">
        <div class="intro-text">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <form id="form-regis" name="form" method="POST" action="insert_regis.php">
                            <h2>REGISTER</h2>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="NAME" tabindex="1">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="LastName" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="3">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="4">
                            </div>
                            <div class="form-group">
                                <textarea name="address" id="address" class="form-control input-lg" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="tel" id="tel" class="form-control input-lg" placeholder="Tel" tabindex="4">
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                    </div>
                                </div>
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <a href="log_in.php" class="btn btn-success btn-block btn-lg">Sign In</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>