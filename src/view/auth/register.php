<?php 

    $formClass = isset($this->error) ? 'error' : '';

    $firstnameData = isset($this->formData['firstname']) ? $this->formData['firstname'] : '';
    $lastnameData = isset($this->formData['lastname']) ? $this->formData['lastname'] : '';
    $emailData = isset($this->formData['email']) ? $this->formData['email'] : '';
    $passwordData = isset($this->formData['password']) ? $this->formData['password'] : '';
    $confirmPasswordData = isset($this->formData['confirm_data']) ? $this->formData['confirm_data'] : '';
    
    $firstnameErr = isset($this->error['firstname']) ? 'is-invalid' : '';
    $lastNameErr = isset($this->error['lastname']) ? 'is-invalid' : '';
    $emailErr = isset($this->error['email']) ? 'is-invalid' : '';
    $passwordErr = isset($this->error['password']) ? 'is-invalid' : '';
    $confirmPasswordErr = isset($this->error['confirm_password']) ? 'is-invalid' : '';

    $nameErrorMsg = isset($this->error['name_err']) ? $this->error['name_err'] : '';
    $lastNameErrorMsg = isset($this->error['lastname_err']) ? $this->error['lastname_err'] : '';
    $emailErrorMsg = isset($this->error['email_err']) ? $this->error['email_err'] : '';
    $passwordErrorMsg = isset($this->error['password_err']) ? $this->error['password_err'] : '';
    $confirmPasswordErrorMsg = isset($this->error['confirm_password_err']) ? $this->error['confirm_password_err'] : '';

?>

<section>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create An Account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?php echo URL; ?>auth/doRegister" method="POST" name="myForm">

                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="firstname" class="form-control form-control-lg <?= $firstnameErr ?>"  value="<?= $firstnameData ?>">
                    <span class="invalid-feedback"><?= $nameErrorMsg ?></span>
                </div>
 

                <div class="form-group">
                    <label for="name">Last Name: <sup>*</sup></label>
                    <input type="text" name="lastname" class="form-control form-control-lg <?= $lastNameErr ?>"  value="<?= $lastnameData ?>">
                    <span class="invalid-feedback"><?= $lastNameErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?= $emailErr ?>" value="<?= $emailData ?>">
                    <span class="invalid-feedback"><?= $emailErrorMsg ?></span>
                </div>        
                

                <div class="form-group">
                    <label for="name">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?= $passwordErr ?>" value="<?= $passwordData ?>">
                    <span class="invalid-feedback"><?= $passwordErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?= $confirmPasswordErr ?>" value="<?= $confirmPasswordData ?>">
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
</section>
<div class="mb-5"></div>