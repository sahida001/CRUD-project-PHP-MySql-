
<?php
  
  include './db.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<?php

if(isset($_POST['add_student'])){

    #get form values

    $name = $_POST ['name'];
    $roll = $_POST ['roll'];
    $dept = $_POST ['dept'];

    if (empty($name) || empty($roll) || empty($dept)) {

        $msg = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        <p>All fields are required!</p>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>" ;
        
    }else {
       
        $connection -> query("INSERT INTO students(name, roll, dept) VALUES('$name', '$roll', '$dept' )");
        $msg = "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <p>Data Stable!</p>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>" ;
    
    }

   

}   

?>

<div class="containr  my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h2>Create your account</h2>
                    <?php echo $msg ?? '';?> 
                    <hr>
                    <form action="" method="POST">
                    <div class="my-3">
                        <label for="">Name</label>
                        <input name = "name" type="text"class="form-control">
                        </div>

                        <div class="my-3">
                        <label for="">Roll</label>
                        <input name = "roll" type="text"class="form-control">
                        </div>

                        <div class="my-3">
                            <label for="name">Dept.</label>
                            <select class="form-control" name="dept" id="">
                                <option value="">--Select--</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="BBA">BBA</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </div>

                        <div class="my-3">
                        <input type="submit" name="add_student" class="btn btn-primary w-100" value="Add New Student">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="containr  my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-body">
                    <h2>All Students Data</h2>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Roll</th>
                               <th>Dept</th>
                               <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>


                         <?php
                         
                         $data = $connection -> query("SELECT * from students" );
                         echo "Students number = " . $data -> num_rows;
                         $i = 1;
                         while ($student = $data -> fetch_object()): 
                           
                         
                         
                         ?>

                            <tr>
                                <td><?php echo $i; $i++ ?></td>
                                <td><?php echo $student -> name; ?></td>
                                <td><?php echo $student -> roll; ?></td>
                                <td><?php echo $student -> dept; ?></td>
                              
                                <td>
                                    <a class = "btn btn-sm btn-info" href="#">View</a>
                                    <a class = "btn btn-sm btn-warning" href="#">Edit</a>
                                    <a class = "btn btn-sm btn-danger" href="#">Delete</a>
                                </td>
                            </tr>
                            <?php endwhile ;?>
                         
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>