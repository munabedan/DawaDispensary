<?php

?>

<?=template_header('login')?>

<div class="login">
        <h1>Login</h1>
        <form action="authenticate.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <br>
            <br>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <br>
            <br>
            <input type="submit" value="Login">
        </form>
</div>

<?=template_footer()?>