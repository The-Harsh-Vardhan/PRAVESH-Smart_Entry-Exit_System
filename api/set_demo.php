<?php
// One-time helper: sets the admin demo password
// Visit this URL once, then delete this file for security
require 'connectDB.php';

$newPass = password_hash('password', PASSWORD_DEFAULT);
$email = 'pravesh@gmail.com';

$sql = "UPDATE admin SET admin_pwd=? WHERE admin_email=?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ss", $newPass, $email);
mysqli_stmt_execute($stmt);

echo "<h2>✅ Done! Admin password set to: <code>password</code></h2>";
echo "<p>Login at <a href='login.php'>login.php</a></p>";
echo "<p><strong>Delete this file immediately after use!</strong></p>";
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>