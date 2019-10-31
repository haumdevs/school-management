<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <form action="<?php echo URLROOT; ?>/Logins/login" method="post">
                <div class="form-group">
                    <label for="user_email">Email:</label>
                    <input type="email" name="user_email" class="form-control form-control-lg <?php echo (!empty($data['user_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_email']; ?>">
                    <span class="invalid-feedback">
                        <?php echo $data['user_email_err']; ?>
                    </span>
                </div>  

                <div class="form-group">
                    <label for="user_password">Password:</label>
                    <input type="password" name="user_password" class="form-control form-control-lg <?php echo (!empty($data['user_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user_password']; ?>">
                    <span class="invalid-feedback">
                        <?php echo $data['user_password_err']; ?>
                    </span>
                </div>  
                
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>