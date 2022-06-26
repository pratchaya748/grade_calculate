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
    <div class="container-fluid">
        <div class="row">
            <!-- ส่งค่าไปคำนวน-->
            <div class="col-md-4">
                <div class="container">
                    <form name="cal" method="POST" action="search_result.php">
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">CAX</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cax" name="cax">
                            </div>
                            <label for="fullname" class="col-sm-3 col-form-label">CGX</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cgx" name="cgx">
                            </div>
                            <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary text-center" id="cal" name="cal" value="คำนวน">
                            </div>
                        </div>
                    </form>

                    <form name="search_user" id="search_user" method="POST" action="index.php">
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-3 col-form-label">รหัสวิชา</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fullname" name="fullname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="province" class="col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="ค้นหา">
                                <input type="button" class="btn btn-primary" id="resetform" name="resetform" value="ล้างข้อมูลการค้นหา">
                            </div>
                        </div>
                    </form>
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
                            <th class="text-center">
                                <input type="submit" id="delete" value="ลบตาราง">
                            </th>
                            <th class="text-center">รหัสวิชา</th>
                            <th class="text-center">ชื่อวิชา</th>
                            <th class="text-center">หน่วยกิจ</th>
                            <th class="text-center">เกรด</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- การส่งข้อมูลด้วย jQuery AJAX เพื่อค้นหา ไปที่ไฟล์ search_result.php-->
    <script>
        $(function() {
            $('form#search_user').submit(function(event) {
                event.preventDefault();
                // รับค่าจากฟอร์ม
                var fullname = $('input#fullname').val();
                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'search_result.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        fullname: fullname,
                    },
                    success: function(data) {
                        if (data.length != 0) {
                            // กรณีมีข้อมูล
                            $.each(data, function(key, value) {
                                // แสดงค่าลงในตาราง
                                trstring += `
                                    <tr>
                                    <th class="text-center">
                                        <div>
                                            <input type="checkbox" name="choose">
                                        </div>
                                    </th>
                                        <td class="text-center">${value.subject_id}</td>
                                        <td class="text-center">${value.subject_name}</td>
                                        <td class="text-center">${value.subject_credit}</td>
                                    </tr>`;
                                $("table tbody").append(trstring);
                                countrow++;
                            });
                        } else {
                            alert('ไม่พบข้อมูลที่ค้นหา');
                        }
                    }
                });
            });
            // ============================================================================
            // เมื่อกดปุ่มล้างข้อมูลการค้นหา
            $('input#resetform').click(function() {
                // ล้างค่าในฟอร์มทั้งหมด
                $("#search_user").trigger('reset');
                // โฟกัสช่องชื่อ
                $('input#fullname').focus();
            });

            // ลบตาราง
            $("#delete").click(function() {
                $("table tbody").find('input[name="choose"]').each(function() {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                    }
                });
            });
        });
    </script>

</html>