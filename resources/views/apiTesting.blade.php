<!DOCTYPE html>
<html>
<head>
    <title>Laravel API Tester</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 700px; margin: auto; }
        input, select, textarea, button { width: 100%; margin: 10px 0; padding: 10px; font-size: 1rem; }
        pre { background: #f4f4f4; padding: 10px; white-space: pre-wrap; }
    </style>
</head>
<body>
    <h2>ASMS API Tester</h2>

    <form id="apiForm">
        <label>API Endpoint (relative):</label>
        <input type="text" id="endpoint" placeholder="/api/ping" required>

        <label>Method:</label>
        <select id="method">
            <option>GET</option>
            <option>POST</option>
        </select>

        <label>Request Body (JSON for POST only):</label>
        <textarea id="body" rows="5" placeholder='{"user_id": 1}'></textarea>

        <button type="submit">Send Request</button>
    </form>

    <h3>Response:</h3>
    <pre id="output">Waiting for response...</pre>

    <script>
        document.getElementById('apiForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const endpoint = document.getElementById('endpoint').value;
            const method = document.getElementById('method').value;
            const body = document.getElementById('body').value;
            const output = document.getElementById('output');

            try {
                const res = await fetch(endpoint, {
                    method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: method === 'POST' ? body : null
                });

                const data = await res.json();
                output.textContent = JSON.stringify(data, null, 2);
            } catch (err) {
                output.textContent = 'Error:\n' + err;
            }
        });
    </script>
</body>
</html>
