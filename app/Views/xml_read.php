<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>BMG Task</title>
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
                    <div class="col">Read XML</div>
                    <div class="col text-right">
                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("test-project/public/read-xml")?>">
                    <div class="form-group">
                        <label>XML</label>
                        <textarea id="xml_reader" name="xml_reader">
                        
                        </textarea>
                        <?php
                        if($validation->getError('xml_reader'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$validation->getError('xml_reader').'</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Read</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>
<style>
textarea {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

    width: 100%;
}
</style>