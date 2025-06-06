<?php
// Secure Login with SQL injection mitigation using prepared statements

// Replace with your 000webhost database details
$host = "localhost";
$dbname = "sqlchecker";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize input
$input_user = trim($_POST['username']);
$input_pass = trim($_POST['password']);

// Reject SQLi manually (extra safety — optional)
function containsInjection($str) {
  $forbidden = ["'", '"', ";", "--", "#"];
  $keywords = ["SELECT", "INSERT", "UPDATE", "DELETE", "ORDER", "DROP", "UNION", "OR", "AND", "NOT", "EXEC", "WHERE", "LIKE", "FROM", "TABLE"];
  foreach ($forbidden as $char) {
    if (strpos($str, $char) !== false) return true;
  }
  foreach ($keywords as $word) {
    if (preg_match("/\b" . preg_quote($word, '/') . "\b/i", $str)) return true;
  }
  return false;
}

if (containsInjection($input_user) || containsInjection($input_pass)) {
  die("SQL Injection attempt blocked.");
}

// Use prepared statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $input_user, $input_pass);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows === 1) {
  echo "✅ Login successful!";
} else {
  echo "❌ Invalid credentials.";
}

$stmt->close();
$conn->close();
?>
