<?php
$hashedPassword = password_hash("allaswt", PASSWORD_DEFAULT);
echo "Hashed Password: " . $hashedPassword;
?>