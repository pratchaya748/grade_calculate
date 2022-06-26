<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GPA SDU</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="jumbotron bg-primary text-light pt-3 pb-3">
        <h1 class="text-center">GPA SDU</h1>
    </div>
                    <!-- โพล -->
                    <form action="insert.php"method="POST">
                        <label>ระดับความพึงพอใจ</label><br>
                        <input type="radio" name="likeing" value="Best"/>ดีมาก<br>
                        <input type="radio" name="likeing" value="Good"/>ดี<br>
                        <input type="radio" name="likeing" value="Moderate"/>พอใช้<br>
                        <input type="radio" name="likeing" value="Bad"/>ปรับปรุง<br>

                        <label>ความคิดเห็น</label><br>
                        <input type="text" name="comment" placeholder="โปรดแสดงความคิดเห็น"/><br>
                        <div class="col-sm-9">
                            <input type="submit" name="insert" class="btn btn-primary" value="ยืนยัน"/>
                        </div>
                    </form>
                </div>
            </div>
            <!-- สร้างตารางด้วย Bootstrap 4-->
            <div class="col-md-8">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th class="text-center">รหัสวิชา</th>
                            <th class="text-center">ชื่อวิชา</th>
                            <th class="text-center">หน่วยกิจ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- SearchProduct.php -->
<form method="post" action="index1.php">
 ค้นหา :: <input type="text" name="txtSearch">
 <input type="submit" value="Search">
</form>
<?php
   $txtSearch = $_POST['txtSearch'] ;
   print "คำที่ใช้ในการค้นหา :: ". $txtSearch ;
   print "<br>ผลของการค้นหา " ;
   $conn = new mysqli("localhost" , "root" , "12345678" , "gpa" );
   $sql = "select  *  from  subject   where subject_id like '%$txtSearch%'" ;

   $result = $conn->query($sql);
   print "<table border=1>" ;
   print   "<TR><TH>รหัสสินค้า</TH><TH>ชื่อสินค้า</TH><TH>รายละเอียดสินค้า</TH></TR>";
   while ($row = $result->fetch_assoc()) {
    print   "<TR><TD>" .  $row['subject_id'] ."</TD>";
    print   "<TD>" .  $row['subject_name'] ."</TD>";
    print   "<TD>" .  $row['subject_description'] ."</TD></TR>" ;
   }
   print "</table>" ;
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<?php
   $txtid = $_POST['txtid'] ;
   $conn = new mysqli("localhost" , "root" , "12345678" , "gpa" );
   $sql = "select  *  from  subject   where subject_id like 'txtid'" ;
   $result = $conn->query($sql);
   print "<table border=1>" ;
   while ($row = $result->fetch_assoc()) {
    print   "<TR><TD>" .  $row['subject_id'] ."</TD>";
    print   "<TD>" .  $row['subject_name'] ."</TD>";
    print   "<TD>" .  $row['subject_credit'] ."</TD>" ; 
   }
   print "</table>" ;
?>