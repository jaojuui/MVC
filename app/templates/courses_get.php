
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-center {
            margin-left: 15%;
            max-width: 70%;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #28a745;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .table th {
            background-color: #d4edda;
            text-align: center;
        }
        .btn-register {
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>



<div class="container-center">
    <h1>รายวิชาที่เปิดให้ลงทะเบียน</h1>
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <tr>
                <th>รหัสวิชา</th>
                <th>ชื่อวิชา</th>
                <th>อาจารย์ผู้สอน</th>
                <th>ลงทะเบียน</th>
            </tr>
        </thead>
        <tbody>
        <?php
// ตรวจสอบว่ามีข้อมูลใน $data['result_course'] หรือไม่
if (isset($data['result_course']) && $data['result_course']->num_rows > 0) {
    // เริ่มวนลูปเพื่อแสดงข้อมูล
    while ($row = $data['result_course']->fetch_object()) {
    ?>
        <tr>
            <!-- แสดงข้อมูลจากฐานข้อมูล -->
            <td><?= htmlspecialchars($row->course_code) ?></td>
            <td><?= htmlspecialchars($row->course_name) ?></td>
            <td><?= htmlspecialchars($row->instructor) ?></td>
            <td>
            <a href="/register?course_id=<?= $row->course_code ?>" class="btn btn-warning btn-sm remove-course" onclick="return confirmSubmission()">ลงทะเบียน</a>

            </td>
        </tr>
    <?php
    }
} else {
    // ถ้าไม่มีข้อมูลให้แสดง
    ?>
    <tr><td colspan="5" class="text-center">ไม่พบรายวิชา</td></tr>
<?php
}
?>
        </tbody>
    </table>
</div>

</body>
<script>
    function confirmSubmission() {
        return confirm("ยืนยันที่จะลงทะเบียนเรียนรายวิชานี้จริงๆหรือไม่?");
    }
</script>

</html>
