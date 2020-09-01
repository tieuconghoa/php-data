<div class="login">
    <div class="wrapper">
        <div class="container">
            <h1>Welcome</h1>
            <span class="error"><?=isset($data['error']) ? $data['error'] :'' ?></span>
            <form class="form" method="POST">
                <input type="text" name="username" placeholder="Username" value="<?=isset($_POST['username']) ? $_POST['username'] :'' ?>" autofocus required>
                <input type="password" name="password" placeholder="Password" required>
                <span class="show-password"></span>
                <button type="submit" name="submit" value="submit" id="login-button">Login</button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>