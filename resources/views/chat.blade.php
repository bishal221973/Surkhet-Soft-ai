<!DOCTYPE html>
<html>

<head>
    <title>AI Stream UI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .container {
            width: 600px;
        }

        .card {
            background: #1e293b;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            margin-bottom: 10px;
        }

        button {
            background: #38bdf8;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        .output {
            margin-top: 20px;
            white-space: pre-wrap;
            background: #020617;
            padding: 15px;
            border-radius: 8px;
            min-height: 150px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <h2>AI Assistant</h2>

            <textarea id="prompt" rows="3">What is your services</textarea>

            <button onclick="startStream()">Ask</button>

            <div class="output" id="output"></div>
        </div>
    </div>
    {{-- 
<script>
function startStream() {
    const output = document.getElementById('output');
    output.innerHTML = '';

    const source = new EventSource('/test');
console.log(source)
    source.onmessage = function (event) {

        if (event.data === '[DONE]') {
            source.close();
            return;
        }

        output.innerHTML += event.data;
    };

    source.onerror = function () {
        source.close();
    };
}
</script> --}}
    <script>
        function startStream() {
            const output = document.getElementById('output');
            output.innerHTML = '';

            const source = new EventSource('/test');

            let finalText = '';

            source.onmessage = function(event) {

                if (event.data === '[DONE]') {
                    source.close();
                    return;
                }

                let parsed;

                try {
                    parsed = JSON.parse(event.data);
                } catch (e) {
                    return; // ignore broken chunks
                }

                // ✅ Handle streaming text
                if (parsed.type === 'text_delta') {
                    finalText += parsed.delta;
                    renderText(finalText);
                }

                // ✅ Handle tool result (services list)
                if (parsed.type === 'tool_result') {
                    try {
                        const services = JSON.parse(parsed.result);
                        renderServices(services);
                    } catch (e) {}
                }
            };

            source.onerror = function() {
                source.close();
            };
        }

        // 🎨 Render formatted text
        function renderText(text) {
            const output = document.getElementById('output');

            let formatted = text
                .replace(/\n/g, "<br>")
                .replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>")
                .replace(/\*\s+/g, "• ");

            output.innerHTML = formatted;
        }

        // 🎨 Render services nicely
        function renderServices(services) {
            const output = document.getElementById('output');

            let html = '<h3>Available Services:</h3><ul>';

            services.forEach(service => {
                html += `
            <li>
                <strong>${service.name}</strong><br>
                <small>${service.description}</small>
            </li>
        `;
            });

            html += '</ul><hr>';

            output.innerHTML = html;
        }
    </script>
</body>

</html>
