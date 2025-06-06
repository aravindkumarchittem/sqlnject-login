<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Secure Login Demo</title>
<style>
  /* Background gradient */
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #333;
  }

  /* Container */
  .container {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    width: 360px;
    padding: 40px 30px;
    text-align: center;
  }

  /* Gradient title text */
  h1 {
    margin: 0 0 30px;
    font-weight: 900;
    font-size: 2.8rem;
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* Inputs */
  input[type=text],
  input[type=password] {
    width: 80%;
    padding: 14px 15px;
    margin-bottom: 20px;
    font-size: 1rem;
    border-radius: 8px;
    border: 1.8px solid #ddd;
    transition: border-color 0.3s ease;
  }
  input[type=text]:focus,
  input[type=password]:focus {
    outline: none;
    border-color: #ff4b2b;
    box-shadow: 0 0 8px rgba(255, 75, 43, 0.4);
  }

  /* Button */
  button {
    width: 100%;
    background: #ff416c;
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
    border: none;
    color: white;
    font-size: 1.2rem;
    padding: 14px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.4s ease;
  }
  button:hover {
    background: linear-gradient(90deg, #ff4b2b, #ff416c);
  }
</style>
</head>
<body>

<!-- <div class="container">
  <h1>Secure Login</h1>
  <input type="text" id="username" placeholder="Username" autocomplete="off" />
  <input type="password" id="password" placeholder="Password" autocomplete="off" />
  <button onclick="validateLogin()">Login</button>
</div> -->
<div class="container">
  <h1>Secure Login</h1>
<form method="POST" action="login.php" onsubmit="return validateLogin()">
  <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" />
  <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" />
  <button type="submit">Login</button>
</form>
</div>

<!-- <script>
  function containsInjectionChars(str) {
  // Block common SQL injection special characters
  const forbiddenChars = ["'", '"', ";", "--", "#"];
  for (let char of forbiddenChars) {
    if (str.includes(char)) {
      return true;
    }
  }
  return false;
}

function containsSQLKeywords(str) {
  // Block common SQL keywords often used in injections
  // Case insensitive check
  const sqlKeywords = [
    "SELECT", "INSERT", "UPDATE", "DELETE", "ORDER","pg_SLEEP","BY","DROP", "UNION", "OR", "AND", "NOT", "EXEC", "EXECUTE", "WHERE", "LIKE", "FROM", "TABLE"
  ];
  const upperStr = str.toUpperCase();
  for (let keyword of sqlKeywords) {
    // Use word boundaries to avoid false positives inside normal words
    const regex = new RegExp(`\\b${keyword}\\b`, "i");
    if (regex.test(upperStr)) {
      return true;
    }
  }
  return false;
}

function validateLogin() {
  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();

  if (username === "" || password === "") {
    alert("Please enter both username and password.");
    return;
  }

  if (containsInjectionChars(username) || containsInjectionChars(password)) {
    alert("⚠️ SQL injection symbols are not allowed in username or password!");
    return;
  }

  if (containsSQLKeywords(username) || containsSQLKeywords(password)) {
    alert("⚠️ SQL keywords are not allowed in username or password!");
    return;
  }

  alert("✅ Login successful! SQL injection is blocked.");
}

</script> -->

</body>
</html>
