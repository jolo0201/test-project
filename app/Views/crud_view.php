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

        $session = \Config\Services::session();

        if($session->getFlashdata('success'))
        {
            echo '
            <div class="alert alert-success">'.$session->getFlashdata("success").'</div>
            ';
        }

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Data List</div>
                    <div class="col text-right">
                        <a href="<?php echo base_url("test-project/public/add")?>" class="btn btn-success btn-sm">Add</a>
                        <a href="<?php echo base_url("test-project/public/generate-xml")?>" class="btn btn-success btn-sm">Generate XML</a>
                        <a href="<?php echo base_url("test-project/public/reader-xml")?>" class="btn btn-success btn-sm">Read XML</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Age</th>
                            <th>Birthdate</th>
                            <th>Status</th>
                        </tr>
                        <?php

                        if($tbl_data)
                        {
                            foreach($tbl_data as $data)
                            {
                                echo '
                                <tr>
                                    <td>'.$data["lastname"].'</td>
                                    <td>'.$data["firstname"].'</td>
                                    <td>'.$data["middlename"].'</td>
                                    <td>'.$data["age"].'</td>
                                    <td>'.$data["birthdate"].'</td>
                                    <td>'.$data["status"].'</td>
                                </tr>';
                            }
                        }

                        ?>
                    </table>
                </div>
                <div>
                    <?php

                    if($pagination_link)
                    {
                        $pagination_link->setPath('crud');

                        echo $pagination_link->links();
                    }
                    
                    ?>

                </div>
            </div>
        </div>

    </div>
 
</body>
</html>
<style>
.pagination li a
{
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination li.active a {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
</style>