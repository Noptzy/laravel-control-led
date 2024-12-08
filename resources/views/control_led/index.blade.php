<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home Control</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            height: 100vh;
        }

        .sidebar {
            width: 20%;
            background: linear-gradient(to bottom, #a700ff, #ff4dff);
            color: white;
            padding: 20px;
            height: 100vh;
            box-sizing: border-box;
        }

        .sidebar h1 {
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        .main-container {
            width: 80%;
            display: flex;
            flex-direction: column;
        }

        .header {
            padding: 20px;
            box-sizing: border-box;
        }

        .datetime {
            color: gray;
            font-size: 14px;
        }

        .time {
            font-size: 50px;
            color: black;
        }

        .main {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .device {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200px;
            width: 100%;
            border-radius: 15px;
            background: #f0f0f0;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .device.on {
            background: linear-gradient(to right, #a700ff, #ff4dff);
            color: white;
        }

        .switch {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .slider {
            position: relative;
            width: 50px;
            height: 25px;
            background: gray;
            border-radius: 15px;
            transition: background 0.3s ease-in-out;
        }

        .slider::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 21px;
            height: 21px;
            background: white;
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        .slider.on {
            background: gray;
        }

        .slider.on::before {
            transform: translateX(25px);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h1>SMART HOME</h1>
        <ul>
            <li><a href="#">Lampu</a></li>
            <li><a href="#">AC</a></li>
            <li><a href="#">Kipas</a></li>
            <li><a href="#">Pintu</a></li>
        </ul>
    </div>

    <div class="main-container">
        <div class="header">
            <div class="datetime" id="datetime"></div>
            <div class="time" id="time"></div>
        </div>

        <div class="main">
            <div class="device" id="dapur">
                <span>LAMPU DAPUR</span>
                <div class="switch" onclick="toggleLed('dapur')">
                    <div class="slider" id="dapurSlider"></div>
                </div>
            </div>
            <div class="device" id="tamu">
                <span>LAMPU TAMU</span>
                <div class="switch" onclick="toggleLed('tamu')">
                    <div class="slider" id="tamuSlider"></div>
                </div>
            </div>
            <div class="device" id="makan">
                <span>LAMPU MAKAN</span>
                <div class="switch" onclick="toggleLed('makan')">
                    <div class="slider" id="makanSlider"></div>
                </div>
            </div>
            <div class="device" id="kamar">
                <span>LAMPU KAMAR</span>
                <div class="switch" onclick="toggleLed('kamar')">
                    <div class="slider" id="kamarSlider"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const endpoint = "http://192.168.100.32";

        function toggleLed(device) {
            const deviceElement = document.getElementById(device);
            const slider = document.getElementById(`${device}Slider`);

            // Toggle UI temporarily
            const isOn = deviceElement.classList.toggle("on");
            slider.classList.toggle("on", isOn);

            // Send POST request
            fetch(`${endpoint}/${device}`, { method: "POST" })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) throw new Error(data.message);
                })
                .catch(error => {
                    alert(`Error: ${error.message}`);
                    console.error(error);

                    // Revert UI changes if request fails
                    deviceElement.classList.toggle("on", !isOn);
                    slider.classList.toggle("on", !isOn);
                });

        }

        function updateDateTime() {
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            const now = new Date();
            const day = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

            document.getElementById("datetime").innerText = `${day}, ${date} ${month} ${year}`;
            document.getElementById("time").innerText = time;
        }

        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>
