<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Burp PHP Proxy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #log { height: 400px; overflow: auto; background: #1e1e1e; color: #00ff00; padding: 10px; border-radius: 5px; font-family: monospace; font-size: 12px; }
        .btn { margin: 5px; }
    </style>
</head>
<body class="container mt-4">
    <h1 class="text-danger">🔥 Burp PHP Proxy</h1>
    <p class="text-muted">Android + Web Traffic Interceptor</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <button class="btn btn-success" onclick="startProxy()">▶ Start Proxy</button>
            <button class="btn btn-danger" onclick="stopProxy()">⏹ Stop Proxy</button>
            <button class="btn btn-secondary" onclick="clearLog()">🗑 Clear Log</button>
        </div>
        <div class="col-md-8">
            <h5>📡 Live Traffic Log</h5>
            <div id="log">Loading...</div>
        </div>
    </div>

    <div class="mt-4">
        <a href="repeater.php" class="btn btn-primary">🔁 Repeater</a>
        <a href="intruder.php" class="btn btn-warning">💥 Intruder</a>
        <a href="otp-bypass.php" class="btn btn-danger">🔓 OTP Bypass</a>
    </div>

    <script>
        function startProxy() {
            fetch('/api.php?action=start').then(r=>r.text()).then(alert);
        }
        function stopProxy() {
            fetch('/api.php?action=stop').then(r=>r.text()).then(alert);
        }
        function clearLog() {
            fetch('/api.php?action=clear').then(r=>r.text()).then(alert);
        }
        setInterval(() => {
            fetch('/api.php?action=log')
                .then(r => r.text())
                .then(d => document.getElementById('log').innerHTML = d || 'No traffic yet...');
        }, 1500);
    </script>
</body>
</html>
