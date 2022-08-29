<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card text-bg-light mt-5 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="<?php assets_img_url(); ?>/login-img.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 p-4">
                            <form id="user-login" action="<?php echo APP_DOMAIN; ?>/" method="POST">
                                <div class="mb-3">
                                    <label for="user_name">Enter Username</label>
                                    <input type="text" name="username" id="user_name" placeholder="Enter Username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="user_pass">Enter Password</label>
                                    <input type="password" name="password" id="user_pass" placeholder="Enter Password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>