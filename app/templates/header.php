<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียนเรียน</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color:rgb(157, 200, 79);
        }
        .navbar a {
            color: white !important;
            font-weight: bold;
        }
        .container-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 50%;
            min-width: 400px;
        }
        h1 {
            color:rgb(157, 200, 79);
            font-weight: bold;
        }
        html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.container {
    flex: 1; /* ดัน footer ลงไปด้านล่าง */
}

.footer {
    text-align: center;
    padding: 10px;
    background-color: rgb(157, 200, 79);
    color: white;
    border-radius: 0 0 10px 10px;
    position: relative;
    width: 100%;
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ระบบลงทะเบียนเรียน</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">หน้าแรก</a></li>
                    <li class="nav-item"><a class="nav-link" href="/information">ข้อมูลนักเรียน</a></li>
                    <li class="nav-item"><a class="nav-link" href="/courses">รายวิชา</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </body>