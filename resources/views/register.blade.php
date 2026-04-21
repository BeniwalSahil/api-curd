<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>

    <h2>Register</h2>

    <form id="registerForm">
        <input type="text" id="name" placeholder="Name" required><br><br>
        <input type="email" id="email" placeholder="Email" required><br><br>
        <input type="mobile" id="mobile" placeholder="Mobile" required><br><br>
        <input type="password" id="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
    </form>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name: document.getElementById('name').value,
                        email: document.getElementById('email').value,
                        mobile: document.getElementById('mobile').value,
                        password: document.getElementById('password').value
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    console.log(data);
                });
        });
    </script>

</body>

</html>
