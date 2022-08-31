<?php
class Sessions {

    function __construct()
    {
        $this->check();
    }

    public function is_set() {
        if(isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function destroy() {
        // Remove all session variables
        session_unset();
        // // Destroy the session
        session_destroy();

    }

    private function check() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get Login Credentials
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if User exists
            $users = new Users();
            if($users->authenticate($username, $password)) {
                $_SESSION['id'] = $users->id;
                header("Location:".APP_DOMAIN."/dashboard/");
            }
        }

        $system = new System();

        if ($system->url[0] == 'logout') {
            $this->destroy();
            header("Location:".APP_DOMAIN);
        }


    }

}
$sessions = new Sessions();