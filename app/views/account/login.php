<main class="login-container">
    <div class="login-box">
        <h2>Đăng Nhập</h2>
        <form action="?page=login" method="POST">
            <div class="input-group">
                <label for="username">Tài Khoản</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="input-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div class="actions">
                <button type="submit" class="btn login">Đăng Nhập</button>
                <a href="#" class="forgot-password">Quên mật khẩu?</a>
            </div>
            
            <p class="or">Hoặc đăng nhập với</p>

            <div class="social-login">
                <button class="btn google"><img src="../public/icon/google.png" alt="" />Google</button>
                <button class="btn facebook"><img src="../public/icon/facebook.png" alt="" />Facebook</button>
            </div>
            <div class="register-link">
                <p>Bạn chưa có tài khoản? <a href="?page=register">Đăng ký</a></p>
            </div>
        </form>
    </div>
</main>