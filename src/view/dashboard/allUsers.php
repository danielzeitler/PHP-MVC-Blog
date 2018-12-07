<?php include 'partial/sidebar.php'; ?>

    <div class="col">
        <div class="container">
            <!-- Breadcrumbs-->
            <h2>Dashboard</h2>

            <!-- DataTables Example -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Login Attempts</th>
                            <th>Permission</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($this->allUsers as $user) : ?>
                        <tr>
                            <td><?= $user->email ?></td>
                            <td><?= $user->login_attempts ?></td>
                            <td>
                                <button class="btn btn-white btn-inline selectInput"><?= $user->permission ?> <i class="fa fa-pencil"></i></button>
                                
                                <div class="d-none">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-8">
                                            <form action="<?= URL ?>dashboard/updatePermission/<?= $user->email ?>" method="POST">
                                                <select class="form-control" name="permission_id">
                                                    <?php foreach($this->allPermissions as $permission) : ?>
                                                        <option value="<?= $permission->id ?>"><?= $permission->permission ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                    <button type="submit" class="btn btn-xs btn-white btn-inline buttonClose"><i class="fa fa-check"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-md-2 col-lg-2">
                                            <button class="btn btn-xs btn-white btn-inline buttonClose"><i class="fa fa-close"></i></button>
                                        </div>


                                        
                                    </div>    
                                </div>
                            </td>
                        
                            
                            <td>  
                            <?php if($user->login_attempts >= 3): ?>
                                <form action="<?=URL?>dashboard/unbanUser/<?= $user->email ?>" method="POST">
                                    <button type="submit" id="btnToggle" name="btnUser" class="btn btn-danger active" aria-pressed="false" autocomplete="off">Unban User</button>
                                </form>
                            </td>
                            <?php else : ?>
                                <form action="<?=URL?>dashboard/banUser/<?= $user->email ?>" method="POST">
                                    <button type="submit" id="btnToggle" name="btnUser" class="btn btn-danger" aria-pressed="false" autocomplete="off">Ban User</button>
                                </form>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


                



    