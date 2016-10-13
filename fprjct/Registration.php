<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>


</head>
<body>
<div id="container">
    <div id="content">
        <section>
            <div class="login">
                <h1>Registration</h1>
                <form id="register" action="RegisterController.php" method="post">
                    <div>
                        <label for="name">Name</label>
                        <input id="first-name" type="text" name="name"/>
                        <p></p>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email"/>
                        <p></p>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="pass"type="password" name="password"/>
                        <p></p>
                    </div>
                    <div>
                        <label for="confirm_password">Repeat password</label>
                        <input id="confirm_password" type="password" name="confirmpassword"/>
                        <p></p>
                    </div>
                    <div>
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
</body>
</html>
