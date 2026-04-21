<form id="otpForm">
    <input type="email" id="otp_email">
    {{-- <input type="text" id="otp"> --}}
    <input type="text" id="mobile">
    <button>Verify</button>
</form>

<script>
    document.getElementById('otpForm').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('/api/verify-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    mobile: document.getElementById('mobile').value,
                    otp: document.getElementById('otp').value
                })
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);
            });
    });
</script>
