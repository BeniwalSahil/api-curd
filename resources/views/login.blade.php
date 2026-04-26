<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <h2>Login</h2>

    <form id="loginForm">
        <input type="email" id="login_email" placeholder="Email" required><br><br>
        <input type="password" id="login_password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        email: document.getElementById('login_email').value,
                        password: document.getElementById('login_password').value
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    console.log(data);

                    // token save
                    localStorage.setItem('token', data.token);
                });
        });
    </script>

</body>

</html>
