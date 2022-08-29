<?php
class Sessions {
    function __construct()
    {
        session_start();
    }
    public function destroy() {
        // Remove all session variables
        session_unset();

        // Destroy the session
        session_destroy();
    } 
}
$sessions = new Sessions();