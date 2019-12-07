<?php include_once('./header.php'); ?>
<div id="login" class="jumbotron">
    <div class="row text-center h-100">
        <div class="col-md-3 text-center my-auto">
            <div class="card card-block d-flex">
                <?php if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "invalid"): ?>
                    <div class="alert alert-warning" role="alert">
                        Usuario y/o passsword incorrectos!!.
                    </div>
                <?php endif; ?>
                <div class="card-body align-items-center d-flex justify-content-center">
                    <form class="form-signin" method="POST" action="login-validation.php">
                        <h3 class="form-signin-heading">Sing In</h3>

                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="text" id="inputEmail" name="email" class="form-control"
                                   placeholder="Nombre de usuario" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name="password" class="form-control"
                                   placeholder="Password" required>
                            <div class="checkbox"></div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('./footer.php'); ?>
<script type="text/javascript"></script>