<?php 

    $data = $this->data; 

    $nameError = ($data && $data['name_err']) ? $data['name_err'] : null;
    $nameErrorMsg = ($data && $data['name_err']) ? $data['name_err'] : '';

    $lastNameError = ($data && $data['lastname_err']) ? $data['lastname_err'] : null;
    $lastNameErrorMsg = ($data && $data['lastname_err']) ? $data['lastname_err'] : '';

    $emailError = ($data && $data['email_err']) ? $data['email_err'] : null;
    $emailErrorMsg = ($data && $data['email_err']) ? $data['email_err'] : '';

    $passwordError = ($data && $data['password_err']) ? $data['password_err'] : null;
    $passwordErrorMsg = ($data && $data['password_err']) ? $data['password_err'] : '';

    $confirmPasswordError = ($data && $data['confirm_password_err']) ? $data['confirm_password_err'] : null;
    $confirmPasswordErrorMsg = ($data && $data['confirm_password_err']) ? $data['confirm_password_err'] : '';

?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create An Account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?php echo URL; ?>auth/doRegister" method="POST" name="myForm">

                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="firstname" class="form-control form-control-lg <?= ($nameError) ? 'is-invalid' : '' ?>"  value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?= $nameErrorMsg ?></span>
                </div>
 

                <div class="form-group">
                    <label for="name">Last Name: <sup>*</sup></label>
                    <input type="text" name="lastname" class="form-control form-control-lg <?= ($lastNameError) ? 'is-invalid' : '' ?>"  value="<?php echo $data['lastname']; ?>">
                    <span class="invalid-feedback"><?= $lastNameErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?= ($emailError) ? 'is-invalid' : '' ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?= $emailErrorMsg ?></span>
                </div>        
                

                <div class="form-group">
                    <label for="name">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?= ($passwordError) ? 'is-invalid' : '' ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?= $passwordErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?= ($confirmPasswordError) ? 'is-invalid' : '' ?>" value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?= $confirmPasswordErrorMsg ?></span>
                </div>  

                <div class="row">
                    <div class="col">
                    <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                    <a href="<?php echo URL; ?>auth/login" class="btn btn-light btn-block">Have an account? Login</a>
                    </div>
                </div>       
            </form>
        </div>
    </div>
</div>
<div class="mb-5"></div>