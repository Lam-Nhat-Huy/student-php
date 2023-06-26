<?php
$conn = mysqli_connect('localhost', 'root', '', 'studentdb');
if (!$conn) {
    die("Could not connect to database");
}
