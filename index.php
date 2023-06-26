<?php
// session_start();
require './database.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
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
                        <h4>Student details</h4>
                        <a href="./student-create.php" class="btn btn-primary float-end">Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>ID: </td>
                                    <td>Name: </td>
                                    <td>Email: </td>
                                    <td>Phone: </td>
                                    <td>Course: </td>
                                    <td>Acction: </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM students";
                                $sql = mysqli_query($conn, $query);
                                if (mysqli_num_rows($sql) > 0) {
                                    foreach ($sql as $row) {
                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['course'] ?></td>
                                    <td class="d-flex justify-content-evenly">
                                        <a href="./student-view.php?id=<?= $row['id'] ?>"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="./student-edit.php?id=<?= $row['id']; ?>"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <form action="./functions.php" method="POST">
                                            <button class="btn btn-danger btn-sm" type="submit" name="delete_student"
                                                value="<?= $row['id']; ?>">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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