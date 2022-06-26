<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery Add / Remove Table Rows Dynamically</title>
    <style>
        form {
            margin: 20px 0;
        }

        form input,
        button {
            padding: 5px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #cdcdcd;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            
            $("form#search_user").submit(function(event) {
               event.preventDefault();

            //    รับค่ารหัสวิชา
               var subject = $("input#subject").val();

                // ส่งต่าไปไฟล์ search.php
                $.ajax({
                    url:'search.php',
                    type:'POST',
                    dataType:'json',
                    data: {
                        subject:"subject"
                    },
                    
                    success:function(data){
                        if (data.length != 0) {
                            $.each(data, function(key, value){
                                // แสดงค่าลงในตาราง
                                Sid = `<td class="text-center">${value.subject_id}</td>`;
                                Sname   = `<td class="text-center">${value.subject_name}</td>`;
                                Scredit = `<td class="text-center">${value.subject_credit}</td>`;
                              
                                
                            });
                        } else {
                            alert('ไม่พบข้อมูลที่ค้นหา');
                        }
                    }
                    

                });

            });

            $("#add_row").click(function () {
                var newrow = `<tr>
                    <th scope="row">
                        <div>
                            <input type="checkbox" name="choose">
                        </div>
                    </th>
                    <td>        </td>
                    <td>        </td>
                    <td>        </td>
                    <td>
                        <div>
                            <select name="gread">
                                <option value="4">A</option>
                                <option value="3.5">B+</option>
                                <option value="3">B</option>
                                <option value="2.5">C+</option>
                                <option value="2">C</option>
                                <option value="1.5">D+</option>
                                <option value="1">D</option>
                                <option value="0">F</option>
                            </select>
                        </div>
                    </td>
                </tr>`;
                $("table tbody").append(newrow);
            });

            // Find and remove selected table rows
            $("#delete").click(function () {
                $("table tbody").find('input[name="choose"]').each(function () {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                    }
                });
            });
        });    
    </script>
</head>

<body>
    <form>
        <input type="button" id="add_row" value="Add Row">
    </form>

    <!-- ของเรา -->
    <table border="2" id="table">
        <thead align="center" id="head">
            <tr>
                <th scope="col">
                    <div>
                        <button type="button" id="delete">Remove</button>
                    </div>
                </th>
                <th scope="col">
                    รหัสวิชา
                </th>
                <th scope="col">
                    ชื่อวิชา
                </th>
                <th scope="col">
                    หน่วยกิต
                </th>
                <th scope="col">
                    เกรด
                </th>
            </tr>
        </thead>
        <tbody align="center" id="body">
          
        </tbody>

        <!-- ส่งหาข้อมูลเกรด -->
        <tfoot align="center" id="foot">

            <form name="search_user" id="search_user" method="POST"   action="testJQ.php">
                <tr>
                    <th>
                        <input type="submit" value="+" id="add_row">
                    </th>
                    <th colspan="4" align="left">
                        <input type="text" name="txtSubject" id="subject" placeholder="พิมพ์รหัสวิชา">
                    </th>
                </tr>
            </form>
        </tfoot>

    </table>
</body>

</html>

<!-- <?php
$txtSubject = $_POST['txtSubject'];
$conn = new mysqli("localhost", "root", "12345678", "gpatest");
$sql = "select  *  from  subject where subject_id like '$txtSubject'";
$result = $conn->query($sql);

print "<table border=1>";
while ($row = $result->fetch_assoc()) {
    print   "<TR><TD>" .  $row['subject_id'] . "</TD>";
    print   "<TD>" .  $row['subject_name'] . "</TD>";
    print   "<TD>" .  $row['subject_credit'] . "</TD></TR>";
}
print "</table>";

?> -->