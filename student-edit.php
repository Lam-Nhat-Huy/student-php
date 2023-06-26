<?php
session_start();
require './database.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <?php
        include './message.php';
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Student Edit </h4>
                        <a href="./index.php" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">
                        <?php

                        // Lấy id student 
                        $student_id = mysqli_real_escape_string($conn, $_GET['id']);



                        $query = "SELECT * FROM students WHERE id='$student_id'";
                        $sql = mysqli_query($conn, $query);
                        if (mysqli_num_rows($sql) > 0) {
                            $student = mysqli_fetch_array($sql);
                        ?>
                        <form action="./functions.php" method="post">
                            <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                            <div class="mb-3">
                                <label for="">Student Name: </label>
                                <input type="text" class="form-control" name="name" value="<?= $student['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Student Email: </label>
                                <input type="email" class="form-control" name="email" value="<?= $student['email'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Student Phone: </label>
                                <input type="text" class="form-control" name="phone" value="<?= $student['phone'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Student Course: </label>
                                <input type="text" class="form-control" name="course" value="<?= $student['course'] ?>">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit" name="update_student">Update
                                    Student</button>
                            </div>
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>