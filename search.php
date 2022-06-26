<?php
require('connect.php');
$txtSubject = $_POST['subject'];


if (!empty($txtSubject)) {
    $sql = "select  *  from  subject where subject_id like '$txtSubject'";
    $qeury = mysqli_query($connect, $sql);

    // กำหนดตัวแปรไว้เก็บข้อมูลที่ค้นหาได้
    $search_data = array();
    // วนลูปค้นหาข้อมูล
    while ($result = mysqli_fetch_assoc($qeury)) {
        // เก็บข้อมูลที่ค้นหาได้ลงตัวแปร
        $search_data[] = $result;
    }
    // แสดงข้อมูลออกเป็น JSON Data
    echo json_encode($search_data);
} ?>


<!-- <?php
require ('connect.php');

// รับค่าจาก jQuery
$txtSubject = $_POST['txtSubject'];

// เช็คว่าทั้ง 3 ช่องต้องไม่เป็นค่าว่าง
if (!empty($fullname) or !empty($nickname) or !empty($province)) {
    $sql = "SELECT * FROM subject WHERE subject_id LIKE '$txtSubject'";
    $qeury = mysqli_query($connect, $sql);

    // กำหนดตัวแปรไว้เก็บข้อมูลที่ค้นหาได้
    $search_data = array();
    // วนลูปค้นหาข้อมูล
    while ($result = mysqli_fetch_assoc($qeury)) {
        // เก็บข้อมูลที่ค้นหาได้ลงตัวแปร
        $search_data[] = $result;
    }

    // ทดสอบแสดงผลลัพธ์ที่ค้นเจอ
    /*
    echo "<pre>";
    print_r($search_data);
    echo "</pre>";
    */

    // แสดงข้อมูลออกเป็น JSON Data
    echo json_encode($search_data);
} ?>  -->