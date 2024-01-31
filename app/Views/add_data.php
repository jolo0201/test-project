<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Codeigniter 4 Crud Application</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <h2 class="text-center mt-4 mb-4">Test Project</h2>

        <?php

        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Add Data</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("test-project/public/add_validation")?>">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" />
                        <?php
                        if($validation->getError('lastname'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('lastname').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" />
                        <?php
                        if($validation->getError('firstname'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('firstname').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name="middlename" class="form-control" />
                        <?php
                        if($validation->getError('middlename'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('middlename').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" />
                        <?php
                        if($validation->getError('age'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('age').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" />
                        <?php
                        if($validation->getError('birthdate'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('birthdate').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">Select</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>

                        <?php

                        if($validation->getError('status'))
                        {
                            echo '<div class="alert alert-danger mt-2">
                            '.$validation->getError("status").'
                            </div>';
                        }

                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>