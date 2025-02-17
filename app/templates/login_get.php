<!-- <section>
    <h1>Login</h1>
    <form action="login" method="post">
        <input type="submit" value="Assume That Login Success !!!">
    </form>
</section> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #d4ed91;
            padding: 10px;
        }
        .logo {
            font-weight: bold;
            color: black;
            text-decoration: none;
            font-size: 18px;
        }
        .logo:hover {
            text-decoration: underline;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .login-box {
            background-color: #ddd;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-btn {
            background-color: #c8ea7d;
            border: none;
            width: 100%;
        }
        .login-btn:hover {
            background-color:rgb(157, 200, 79);
        }
    </style>
</head>
<body>


    <!-- Login Form -->
    <div class="login-container">
        <div class="login-box">
            <h3 class="text-center">Login</h3>
            <form action="login" method="POST">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn login-btn">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
