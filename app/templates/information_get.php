<?php
getConnection();
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-box {
            margin-top: 20px; /* ลดช่องว่างด้านบน */
            margin-left: 20%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th {
            background-color: #d4edda;
        }
        .remove-course {
            color: red;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="container">
        <div class="container-box">
            <h1>ข้อมูลนักเรียน</h1>
            <table class="table table-bordered">
    <?php
    if (isset($data['result_student']) && $data['result_student']->num_rows > 0) {
        while ($row = $data['result_student']->fetch_object()) {
    ?>
        <tr><th>ชื่อ</th><td><?= $row->first_name ?></td></tr>
        <tr><th>นามสกุล</th><td><?= $row->last_name ?></td></tr>
        <tr><th>วันเกิด</th><td><?= $row->date_of_birth ?? '-' ?></td></tr>
        <tr><th>เบอร์โทรศัพท์</th><td><?= $row->phone_number ?></td></tr>
    <?php
        }
    } else {
    ?>
        <tr><td colspan="2" class="text-center">ไม่พบข้อมูลนักเรียน</td></tr>
    <?php
    }
    ?>
</table>


            <h2 class="mt-4">วิชาที่ลงทะเบียนเรียน</h2>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th>อาจารย์ผู้สอน</th>
                        <th>วันที่ลงทะเบียน</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    if (isset($data['result_course']) && $data['result_course']->num_rows > 0) {
        while ($row = $data['result_course']->fetch_object()) {
    ?>
        <tr>
            <td><?= $row->course_code ?></td>
            <td><?= $row->course_name ?></td>
            <td>Prof. Smi</td>
            <td>2025-02-17</td>
            <td><a href="/remove_course?id=<?= $row->course_id ?>" class="remove-course" onclick="return confirmSubmission()">ถอนรายวิชา</a></td>
        </tr>
    <?php
        }
    } else {
    ?>
        <tr><td colspan="5" class="text-center">No courses found</td></tr>
    <?php
    }
    ?>
</tbody>


            </table>
        </div>
    </div>


</body>
<script>
    function confirmSubmission() {
        return confirm("ยืนยันที่จะถอนรายวิชานี้จริงๆหรือไม่?");
    }
</script>
</html>
