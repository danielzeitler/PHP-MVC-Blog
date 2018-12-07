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

<?php include 'partial/sidebar.php'; ?>

<div class="col">
    <div class="container">
            <h2>Edit Profile</h2>
        

            <div class="card card-body bg-light mt-4 mb-5">


            <form action="<?php echo URL; ?>dashboard/doUpdateUser" method="POST" enctype="multipart/form-data">
               
                <input type="hidden" name="file_id" value="<?= $this->userData['file_id'] ?>">

                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
                </div>

                <div class="form-group inputDnD">
                    <label for="title">Image Upload: <sup>*</sup></label>
                    <input type="file" class="form-control-file text-upload font-weight-bold" name="new_foto" id="inputFile" onchange="readUrl(this)" data-title="Click or Drag and drop a file">
                </div>

                <div class="form-group">
                    <label for="title">Firstname: <sup>*</sup></label>
                    <input type="text" name="firstname" class="form-control form-control-lg <?= $firstnameErr ?>" value="<?= $this->userData['firstname'] ?>">
                    <span class="invalid-feedback"><?= $nameErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="title">Lastname: <sup>*</sup></label>
                    <input type="text" name="lastname" class="form-control form-control-lg <?= $lastNameErr ?>" value="<?= $this->userData['lastname'] ?>">
                    <span class="invalid-feedback"><?= $lastNameErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="title">Email: <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?= $emailErr ?>" value="<?= $this->userData['email'] ?>">
                    <span class="invalid-feedback"><?= $emailErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="title">New Password: <sup>*</sup></label>
                    <input type="password" name="password" Placeholder="Enter your new password" class="form-control form-control-lg <?= $passwordErr ?>">
                    <span class="invalid-feedback"><?= $passwordErrorMsg ?></span>
                </div>

                <div class="form-group">
                    <label for="title">Confirm New Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" Placeholder="Enter your new password" class="form-control form-control-lg <?= $confirmPasswordErr ?>">
                    <span class="invalid-feedback"><?= $confirmPasswordErrorMsg ?></span>
                </div>

                <input type="submit" class="btn btn-success" value="Update">
            </form>
            
        </div>
    </div>
</div>








