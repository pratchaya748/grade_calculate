<html lang="en">
<style>
body {
  background-image: url("BG11.jpg");
  background-image:opacity: 0.5;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GPA SDU</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>
<body>

<div class="contrainer-fluid bg-success text-light">
    <div class="jumbotron bg-warning text-light pt-3 pb-3 ">
        <img src="n.png" class="rounded mx-auto d-block" >
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-warning ">
  <div class="container-fluid">
    <a class="navbar-brand text-black" href="http://regis.dusit.ac.th/home/">REGIS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php">คำนวณเกรด</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="22.pdf">คู่มือการใช้งาน</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-10">
            <p>ขั้นตอนการใช้งาน <br>
                1.ศึกษาวิธีการใช้งานจากคู่มือการใช้งาน<br>
                2.พิมพ์รหัสวิชาจำนวน 7 หลัก (ในช่องรหัสวิชา) แล้วกดค้นหาวิชา<br>
                3.เลือกเกรดที่ต้องการ (A - F)<br>
                4.พิมพ์ข้อมูล CAX , CGX ภาคการศึกษาล่าสุด (ตรวจสอบจากมสด.29)<br>
                5.กดปุ่มคำนวณผลแล้วโปรแกรมจะคำนวณเกรดเฉลี่ยอัตโนมัติ<br>
                6.หากต้องคำนวณผลเกรดเฉลี่ยใหม่ให้กดย้อนกลับ<br>
                7.ทำแบบประเมินความพึงพอใจการใช้ระบบ</p>
            </div>
                
            <div class="col-md-2 pt-5">
                <div class="container">
                <!-- ส่งค่าไปคำนวน--------------------------------------------------------------------------->
                <div class="pb-3">   
                <label class="text-center text-dark"  >จำนวนผู้เข้าใช้งาน</label>          
                <a href="https://www.freecounterstat.com" title="web counter">
                <img src="https://counter8.stat.ovh/private/freecounterstat.php?c=jhxpr86jj96zucg4w2q6tlcewdjyde6r" border="0" title="web counter" alt="web counter"></a>
                </div>        
                        <div class="form-group row pb-2">
                            <label for="cax" class="col-sm-3 col-form-label">CAX</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cax" name="cax">
                            </div>
                            <label for="cgx" class="col-sm-3 col-form-label">CGX</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cgx" name="cgx">
                            </div>
                            <!-- <div class="col-sm-9 pt-2">
                                <input type="button" class="form-control btn btn-warning" id="calculate" value="คำนวณ" >
                            </div> -->
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- หาวิชา---------------------------------------------------------------------------------->
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead id="head">
                        <tr class="bg-warning text-black">
                         <th class="text-center"> <input type="image" id="delete" value="Delete" src="15.png" width= "25px" height="25px"> </th>
                            <th class="text-center">รหัสวิชา</th>
                            <th class="text-center">ชื่อวิชา</th>
                            <th class="text-center">หน่วยกิต</th>
                            <th class="text-center">เกรด</th>
                        </tr>
                    </thead>
                <form method="post" action="index.php" name="searchS" id="searchS">
                    <tbody id="sub">
                      
                    </tbody>
                    <tfoot id="foot">
                        <tr>
                            <td colspan ="5" class="text-center">
                                    <input type="text" name="txtSearch" id="txtSearch" maxlength="7">
                                    <input type="submit" value="ค้นหาวิชา">
                                    <input type="button"id="calculate" value="คำนวณ" >
                            </td>
                        </tr>
                </form>   
                    </tfoot>
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
            var r = 1;
            $('form#searchS').submit(function(event) {
                event.preventDefault();
                // รับค่าจากฟอร์ม
                
                var Search = $('input#txtSearch').val();
                
                // ส่งค่าไป search_result.php ด้วย jQuery Ajax
                $.ajax({
                    url: 'search_result.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        Search: Search,
                    },
                    success: function(data) {
                        if (data.length != 0) {
                            // กรณีมีข้อมูล
                            // กำหนดตัวแปรเก็บโครงสร้างแถวของตาราง
                            var trstring = "";
                            // วนลูปข้อมูล JSON ลงตาราง
                                $.each(data, function(key, value) {
                                    // แสดงค่าลงในตาราง
                                    trstring += `
                                        <tr id ="oo" class="bg-light">
                                            <td class="text-center">
                                                <div>
                                                    <input type="checkbox" name="choose">
                                                </div>
                                            </td>
                                            <td class="text-center" id="subID">${value.subject_id}</td>
                                            <td class="text-center" id="name">${value.subject_name}</td>
                                            <td class="text-center" id="credit">${value.subject_credit}</td>
                                            <td class="text-center"><select name="grade"id="grade">
                                                <option value="">เกรด</option>
                                                <option value="4">A</option>
                                                <option value="3.5">B+</option>
                                                <option value="3">B</option>
                                                <option value="2.5">C+</option>
                                                <option value="2">C</option>
                                                <option value="1.5">D+</option>
                                                <option value="1">D</option>
                                                <option value="0">F</option>
                                            </td>
                                        </tr>`;
                                        $("table tbody#sub").append(trstring);
                                        
                                });
                        } else {
                            alert('ไม่พบวิชาที่ค้นหา');
                        }
                    }
                });
                $('input#txtSearch').val('');
             });


            // ============================================================================
            $('table #foot #calculate').click(function (event){
            // เก็บค่า หน่วยกิจ,เกรด
                var allcre = [];
                var allgrade = [];
                var allid =[];
                var allname =[];
                var gp = [];
                var allcax =[];
                var allcgx =[];
                var cax = parseFloat($('#cax').val());
                var cgx = parseFloat($('#cgx').val());
                var rowR = "";
                var NRH ="";
                var NRF = "";
                var sumgp = 0;
                var sumcre = 0;
                var sumgrade = 0;
                var crforax = 0;
                var showgrad = [];

                if (isNaN(cax)  ) {
                    alert("โปรดใส่ cax");
                }
                else if (isNaN(cgx)){
                    alert("โปรดใส่ cgx");
                }
                else{
                    
                    $('#sub #oo').each(function (i){
                        allcre[i] = parseFloat($(this).find("#credit").text());
                        allgrade[i] = parseFloat($(this).find("#grade").val());
                        allid[i] = $(this).find("#subID").text();
                        allname[i] = $(this).find("#name").text();

                        if (allcre == "" ){
                        alert("โปรดเลือกวิชา");
                        }
                        else{   
                                crforax += allcre[i];
                                sumgrade += allgrade[i];
                                gp[i] = allcre[i] * allgrade[i];
                                sumgp += gp[i];
                                cax += allcre[i];
                                allcax[i] = cax.toFixed(2);
                                cgx += gp[i]; 
                                allcgx[i] = cgx.toFixed(2);

                                if (allgrade[i] == 4) {
                                    showgrad[i] = "A";
                                }
                                else if (allgrade[i] == 3.5) {
                                    showgrad[i] = "B+";
                                }
                                else if (allgrade[i] == 3) {
                                    showgrad[i] = "B";
                                }
                                else if (allgrade[i] == 2.5) {
                                    showgrad[i] = "C+";
                                }
                                else if (allgrade[i] == 2) {
                                    showgrad[i] = "C";
                                }
                                else if (allgrade[i] == 1.5) {
                                    showgrad[i] = "D+";
                                }
                                else if (allgrade[i] == 1) {
                                    showgrad[i] = "D";
                                }
                                else if (allgrade[i] == 0) {
                                    showgrad[i] = "F";
                                }
                        }
                        // alert(r);
                        r ++;
                        rowR += `
                                <tr id ="Result" class="bg-dark text-light">
                                    <td class="text-center" id="RID"> ${allid[i]} </td>
                                    <td class="text-center" id="Rname">${allname[i]}</td>
                                    <td class="text-center" id="Rcredit">${allcre[i]}</td>
                                    <td class="text-center">${showgrad[i]}</td>
                                    <td class="text-center">${gp[i]}</td>
                                    <td class="text-center">${allcax[i]}</td>
                                    <td class="text-center">${allcgx[i]}</td>
                                </tr>`;
                        
                        NRH = ` <tr class="bg-warning text-dark ">
                                    <th class="text-center">รหัสวิชา</th>
                                    <th class="text-center">ชื่อวิชา</th>
                                    <th class="text-center">หน่วยกิต</th>
                                    <th class="text-center">เกรด</th>
                                    <th class="text-center">GP</th>
                                    <th class="text-center">CAX</th>
                                    <th class="text-center">CGX</th>
                                    </tr>
                                `;

                        if (allgrade[i] == 0) {
                            allcre[i] = null;
                        }
                        sumcre += allcre[i];
                    });
                    var gpax = cgx / cax;
                    var gpa = (sumgp) / (crforax);
                    

                        NRF = ` <tr class="bg-warning text-dark">
                                    <th class="text-center" colspan = "8">หน่วยกิจประจำภาค : ${sumcre} หน่วยกิต</th>
                                    </tr>
                                    <tr class="bg-warning text-dark">
                                    <th class="text-center" colspan = "8">เกรดเฉลี่ยประจำภาค : ${gpa.toFixed(2)}</th>
                                    </tr>
                                    <tr class="bg-warning text-dark">
                                    <th class="text-center" colspan = "8">เกรดเฉลี่ยสะสม : ${gpax.toFixed(2)}</th>
                                    </tr>
                                    <tr class="bg-warning text-dark">
                                    <th class="text-center" colspan = "4">
                                        <a class="btn btn-dark text-light" data-bs-toggle="collapse" href="index.php" role="button" >
                                            ย้อนกลับ
                                        </a>
                                    </th>
                                    <th class="text-center" colspan = "4">
                                    <a href="poll.php" class="btn btn-success bg-dark text-light" role="button" data-bs-toggle="button">ประเมินความพึงพอใจการใช้โปรแกรม</a>
                                    </th>
                                    </tr>
                                `;
                    if (allcre == "" ){
                        alert("โปรดเลือกวิชา");
                    }
                    else if(isNaN(sumgrade)){
                        alert("โปรดใส่เกรดให้ครบ");
                        allcre = [];
                        allgrade = [];
                        allid =[];
                        allname =[];
                        gp = [];
                        allcax =[];
                        allcgx =[];
                        cax = 0;
                        cgx = 0;
                        rowR = "";
                        NRH ="";
                        NRF = "";
                        sumgp = 0;
                        sumcre = 0;
                        sumgrade = 0;
                        crforax = 0;
                        r = 1;
                    }
                    else {
                        // alert(allcre + " / " + allgrade + " / " + allname + " / " + allid);
                        // alert(cax + " / " + cgx); 
                        // alert("gp" + gp); 
                        // alert("allcax" + allcax + " / " + "allcgx" + allcgx); 
                        $("table thead#head").replaceWith(NRH);        
                        $("table tbody#sub").replaceWith(rowR);
                        $("table tfoot#foot").replaceWith(NRF);
                    }

                }
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
                $("table tbody").find('input[name="choose"]').each(function(i) {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                    }
                });
            });
        });
    </script>
  <!-- <h3>จำนวนผู้เข้าใช้งาน</h3>          
<a href="https://www.freecounterstat.com" title="hit counter">
<img src="https://counter8.stat.ovh/private/freecounterstat.php?c=xysct2wbjrp298h7ktpw18djup22695c" border="0" title="hit counter" alt="hit counter"></a> -->
<footer class="text-center">
  <div>
    <p class="text-muted small mb-0 pt-4">
      ติดต่อสอบถาม : สำนักส่งเสริมวิชาการและงานทะเบียน มหาวิทยาลัยสวนดุสิต<br>
      295 ถ.นครราชสีมา เขตดุสิต กรุงเทพฯ 10300 โทร.02-244-5172-4 email : registsdu@gmail.com
    </p>
  </div>
</footer>
<script type="text/javascript">
      window.onbeforeunload = function() {
          return "Did you save your stuff?"
      }
    </script>
<!----ลิ้งสำหรับไว้ดูผู้เข้า(https://www.freecounterstat.com/geozoom.php?c=jhxpr86jj96zucg4w2q6tlcewdjyde6r&base=counter8)----->
</html>