<?php
session_start();
require_once './database.php';

// Thêm dữ liệu vào database
if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $update_time = mysqli_real_escape_string($conn, $_POST['update_time']);
    // truy vấn 
    $query = "INSERT INTO students (name, email, phone, course, update_time) VALUES ('$name', '$email', '$phone', '$course', '$update_time')";
    // Khi trường có dữ liệu mới cho truy vấn
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($course) && !empty($update_time)) {
        $sql = mysqli_query($conn, $query);
    }
    // Thông báo khi truy vấn thành công
    if ($sql) {
        $_SESSION['message'] = 'Student Created Successfully';
        header('Location: student-create.php');
        exit(0);
    } else {
        $_SESSION['message'] = 'Student Not Created Successfully';
        header('Location: student-create.php');
        exit(0);
    }
}

// Thay đổi dữ liệu vào database
if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    // truy vấn
    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
    $sql = mysqli_query($conn, $query);
    // Thông báo truy vấn thành công
    if ($sql) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
}

// xóa thông tin sinh viên
if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
    $query = "DELETE FROM students WHERE id = $student_id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $_SESSION['message'] = 'Student Deteled successfully';
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = 'Student Not Deteled successfully';
        header('Location: index.php');
        exit(0);
    }
}
