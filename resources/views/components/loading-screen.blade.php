<div id="loading-screen" style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color:rgb(0, 0, 0);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: opacity 1s ease-out; /* Adjusted to 1 second */
    opacity: 1;
">
    <style>
        @keyframes needle-move {
            0% { transform: rotate(-120deg); }
            100% { transform: rotate(120deg); }
        }

        .tachometer {
            position: relative;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background:rgb(226, 0, 0);
            box-shadow: 0 0 30px rgba(255, 0, 0, 0.5);
        }

        .tachometer-face {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background:rgb(0, 0, 0);
            top: 10px;
            left: 10px;
            overflow: hidden;
        }

        .tachometer-markings {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .tachometer-mark {
            position: absolute;
            width: 2px;
            height: 8px;
            background: #666;
            top: 10px;
            left: 50%;
            transform-origin: 50% 90px;
        }

        .tachometer-major-mark {
            height: 15px;
            background: #999;
        }

        .tachometer-number {
            position: absolute;
            color:rgb(255, 0, 0);
            font-family: 'Orbitron', sans-serif;
            font-size: 16px;
            font-weight: bold;
            transform-origin: 50% 90px;
            text-align: center;
        }

        .tachometer-needle {
            position: absolute;
            width: 4px;
            height: 85px;
            background: #ff0000;
            bottom: 50%;
            left: 50%;
            transform-origin: 50% 100%;
            transform: translateX(-50%) rotate(-120deg);
            z-index: 2;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.9), 0 0 40px rgba(255, 0, 0, 0.6), 0 0 60px rgba(255, 0, 0, 0.3);
            border-radius: 3px 3px 0 0;
            filter: blur(0.5px); /* Apply subtle blur effect */
            transition: transform 0.1s ease-out; /* Smooth transition for needle movement */
        }

        .tachometer-center {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #555;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            border: 3px solid #888;
        }

        .tachometer-kmh {
            position: absolute;
            color:rgb(255, 0, 0);
            font-family: 'Orbitron', sans-serif;
            font-size: 18px;
            font-weight: bold;
            bottom: 30px;
            width: 100%;
            text-align: center;
        }

        .loading-text {
            color:rgb(255, 255, 255);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.2em;
            margin-top: 20px;
            text-align: center;
            min-height: 1.5em;
        }
    </style>

    <div class="tachometer">
        <div class="tachometer-face">
            <div class="tachometer-markings" id="tachometer-markings"></div>
            <div class="tachometer-needle" id="tachometer-needle"></div>
            <div class="tachometer-center"></div>
            <div class="tachometer-kmh" id="tachometer-kmh">0 km/h</div>
        </div>
    </div>

    <div class="loading-text" id="status-message">Iniciando sistema...</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loadingScreen = document.getElementById('loading-screen');
        const needle = document.getElementById('tachometer-needle');
        const kmhDisplay = document.getElementById('tachometer-kmh');
        const statusMessage = document.getElementById('status-message');
        const markingsContainer = document.getElementById('tachometer-markings');

        // Create tachometer markings (0-100 km/h)
        for (let i = 0; i <= 100; i += 10) {
            const angle = -120 + (i * 2.4); // Angle for 0-100 over 240 degrees (-120 to 120)

            // Markings
            const mark = document.createElement('div');
            mark.className = 'tachometer-mark';
            if (i % 20 === 0) {
                mark.classList.add('tachometer-major-mark');
            }
            mark.style.transform = `rotate(${angle}deg)`;
            markingsContainer.appendChild(mark);

            // Numbers

        }

        const messages = [
            "Iniciando sistema...",
            "Cargando módulos esenciales...",
            "Estableciendo conexión segura...",
            "Optimizando rendimiento...",
            "Preparando interfaz...",
            "Casi listo...",
            "Finalizando carga..."
        ];

        let currentProgress = 0;
        let messageIndex = 0;

        const updateProgress = () => {
            if (currentProgress < 100) {
                let increment = Math.floor(Math.random() * 3) + 1;
                currentProgress = Math.min(100, currentProgress + increment);

                // Update tachometer (0-100 km/h)
                const kmh = currentProgress;
                kmhDisplay.textContent = `${kmh} km/h`;
                const angle = -120 + (currentProgress * 2.4);
                needle.style.transform = `translateX(-50%) rotate(${angle}deg)`;

                // Update status messages
                if (currentProgress >= (messageIndex + 1) * (100 / messages.length)) {
                    if (messageIndex < messages.length - 1) {
                        messageIndex++;
                    }
                }
                statusMessage.textContent = messages[messageIndex];

                setTimeout(updateProgress, 200);
            } else {
                statusMessage.textContent = "Sistema listo!";
                setTimeout(() => {
                    loadingScreen.style.opacity = '0';
                    setTimeout(() => {
                        loadingScreen.style.display = 'none';
                    }, 500);
                }, 500);
            }
        };

        setTimeout(updateProgress, 500);
    });
</script>