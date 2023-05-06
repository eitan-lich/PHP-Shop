<?php session_start();
require "database.php";
require "header.php"; ?>

<body>
    <form action="authenticate.php" method="POST">
        <div class="form-group w-50">
            <input type="text" placeholder="Username" class="form-control mb-3" name="existing-username">
            <input type="password" placeholder="Password" class="form-control mb-3" name="existing-password">
            <button class="btn btn-success">Login</button>
        </div>
    </form>
    </div>
    <script src="js/script.js"></script>
</body>

</html>