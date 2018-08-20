    <?php if(!(Session::get('user')['admin'])) :  ?>
        <h2>You're not authorized to access this web page</h2>
    <?php else : ?>
        <h2>Add Category</h2>
        <p>Create a new category with this form</p>
        <form action="<?php echo URL; ?>category/addCategory" method="POST">

            <div class="form-group">
                <label for="title">Category: <sup>*</sup></label>
                <input type="text" name="category" class="form-control form-control-lg" value="">
            </div>

            <input type="submit" class="btn btn-success" value="Add">
        </form>
    <?php endif; ?>

