<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <form id="user-login" action="<?php echo APP_DOMAIN; ?>" method="POST">
                    <div class="form-group">
                        <label for="user_name">Enter Username</label>
                        <input type="text" name="username" id="user_name" placeholder="Enter Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user_pass">Enter Password</label>
                        <input type="password" name="password" id="user_pass" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>