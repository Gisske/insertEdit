<?php
session_start();
// remove all session variables
//session_unset();

// destroy the session
session_destroy();
?>
<script>
window.location.href = 'form01.php'
</script>