<div class="form-container">
            <div class="form-title">
                <h1 data-before="masyarakat">Sign in</h1>
            </div>
            <form action="" method="post">
                <div class="text-input">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="text-input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                    <div class="p-small">
                        <p>Belum punya akun. klik <a href="<?= BASE_URL . 'masyarakat/signup'?>">di sini.</a></p>
                    </div>
                </div>

                <div class="input-button">
                    <button type="submit" name="submit">Sign in</button>
                </div>
            </form>
        </div>