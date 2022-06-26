
<?php
require ('sduCon.php');

if(isset($_POST['insert']))
{
    $likeing = $_POST['likeing'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO poll (likeing,comment) VALUES ('$likeing','$comment')";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        '<script type="text/javascript">alert("บันทึกข้อมูลสำเร็จ")</script>';
    }
    else
    {
        '<script type="text/javascript">alert("บันทึกข้อมูลไม่สำเร็จ")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบสอบถาม</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>
<div class="contrainer-fluid bg-success text-light">
    <div class="jumbotron bg-light text-light pt-3 pb-3 ">
        <img src="n.png" class="rounded mx-auto d-block" >
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-primary ">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="http://www.dusit.ac.th/">SDU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
          <a class="nav-link text-light" href="index.php">คำนวณเกรด</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="22.pdf">วิธีใช้งาน</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-md pt-5">
    <div class="align-middle">
        <!-- โพล -->
        <form action="poll.php"method="POST" class="text-center">
            <label class="form-check-label ">ระดับความพึงพอใจ</label><br>
            <!-- <input type="radio" name="likeing" value="Best"/>ดีมาก
            <input type="radio" name="likeing" value="Good"/>ดี
            <input type="radio" name="likeing" value="Moderate"/>พอใช้
            <input type="radio" name="likeing" value="Bad"/>ปรับปรุง -->
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="likeing" id="flexRadioDefault1" value="Best">
              <label class="form-check-label" for="flexRadioDefault1">
                ดีมาก
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="likeing" id="flexRadioDefault2" value="Good">
              <label class="form-check-label" for="flexRadioDefault2">
                ดี
              </label>
            </div>  
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="likeing" id="flexRadioDefault3" value="Moderate">
              <label class="form-check-label" for="flexRadioDefault3">
              พอใช้
              </label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="likeing" id="flexRadioDefault6" value="NOT GOOD">
              <label class="form-check-label" for="flexRadioDefault6">
              น้อย
              </label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="likeing" id="flexRadioDefault4" value="Bad">
              <label class="form-check-label" for="flexRadioDefault4">
              ปรับปรุง
              </label>
            </div> <br><br>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">ความคิดเห็น</label>
                <textarea class="form-control form-control-md mb-3" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="โปรดแสดงความคิดเห็น"></textarea>
            </div>
            <div class="position-absolute bottom-50 end-50">
                <input type="submit" name="insert" class="btn btn-success" value="ยืนยัน"/>
            </div>
           
        </form>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>