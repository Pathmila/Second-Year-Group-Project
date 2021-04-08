<?php 
	require_once('../../config/connect.php');
	// Start the session
    session_start();
	// remove all session variables
    session_unset();
	// destroy the session
    session_destroy();
    header('Location: user_nonhome_page.php');
?>