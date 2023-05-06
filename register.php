<?php session_start();
require "database.php" ?>


<?php require "header.php" ?>

<body>
    <form action="./Authenticate.php" method="POST">
        <div class="form-group w-50">
            <label for="email-signup">Email address</label>
            <input type="text" class="form-control mb-3" placeholder="Username" name="new-username">
            <input type="password" class="form-control mb-3" placeholder="Password" name="new-password">
            <input type="password" class="form-control mb-3" placeholder="Repeat password">
            <button class="btn btn-primary">Sign up</button>
    </form>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>