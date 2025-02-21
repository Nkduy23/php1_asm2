<main class="login-container">
    <div class="login-box">
        <h2>Đăng Ký</h2>
        <form action="?page=register" method="POST">
            <div class="input-group">
                <label for="hoTen">Họ Tên</label>
                <input type="text" id="hoTen" name="hoTen" required />
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="input-group">
                <label for="username">Tài Khoản Đăng Nhập</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="input-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div class="input-group">
                <label for="confirmPassword">Nhắc Lại Mật Khẩu</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required />
            </div>
            <div class="actions">
                <button type="submit" class="btn login">Đăng Ký</button>
            </div>
        </form>
    </div>
</main>