<?php include 'partial/sidebar.php'; ?>

<div class="col">
    <div class="container">
    

            <h2>Add Category</h2>
            <div class="card card-body bg-light mt-4 mb-5">
            <form action="<?php echo URL; ?>dashboard/addCategory" method="POST">

                <div class="form-group">
                    <label for="title">Category: <sup>*</sup></label>
                    <input type="text" name="category" class="form-control form-control-lg" value="">
                </div>

                <input type="submit" class="btn btn-success" value="Add">
            </form>
            
        </div>
    </div>
</div>








