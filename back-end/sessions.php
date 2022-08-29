<?php
class Sessions {
    function __construct()
    {
        session_start();
        // $_SESSION['id'] = 1;
        // $this->destroy();
    }
    public function set() {
        if(isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }
    public function destroy() {
        // Remove all session variables
        session_unset();

        if(session_status() == PHP_SESSION_NONE) {
            // Destroy the session
            session_destroy();
        }

    } 
}
$sessions = new Sessions();