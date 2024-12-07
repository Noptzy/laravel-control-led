<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Home Control</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            height: 100vh;
        }

        /* Sidebar */
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
            margin-bottom: 20px;
        }

        .sidebar h2 {
            text-align: left;
            margin-bottom: 20px;
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

        /* Header */
        .header {
            width: 80%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 10px 20px;
            box-sizing: border-box;
            color: #333;
        }

        .datetime {
            color: gray;
            font-size: 14px;
        }

        .time {
            font-size: 50px;
            color: black;
            margin: 5px 0 0;
        }

        /* Main Content */
        .main-container {
            display: flex;
            flex-direction: column;
            width: 80%;
        }

        .main {
            flex-grow: 1;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            align-items: center;
            justify-items: center;
            padding: 40px;
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

        .device span {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        /* #ledtamu {
            height: 200px;
        }

        #ledkamar {
            height: 200px;
        }

        #ledmakan {
            height: 200px;
        }

        #leddapur {
            height: 200px;
        } */
        .switch {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .switch input {
            display: none;
        }

        .slider {
            width: 50px;
            height: 25px;
            background: gray;
            border-radius: 15px;
            position: relative;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .slider::after {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            width: 21px;
            height: 21px;
            background: rgb(255, 255, 255);
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        input:checked + .slider {
            background: rgb(214, 208, 208);
        }

        input:checked + .slider::after {
            transform: translateX(25px);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h1>SMART HOME</h1>
        <br>
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Lampu</a></li>
            <li><a href="#">AC</a></li>
            <li><a href="#">Kipas</a></li>
            <li><a href="#">Pintu</a></li>
        </ul>
    </div>

    <!-- Content Container -->
    <div class="main-container">
        <!-- Header -->
        <div class="header">
            <div class="datetime" id="datetime"></div>
            <div class="time" id="time"></div>
        </div>

        <!-- Main Content -->
        <div class="main">
            <div class="device" id="ledtamu">
                <span>LAMPU <br>RUANG TAMU</span>
                <div class="switch">
                    <label>
                        <input type="checkbox" onchange="toggleDevice('ledtamu')" />
                        <div class="slider"></div>
                    </label>
                </div>
            </div>
            <div class="device" id="leddapur">
                <span>LAMPU DAPUR</span>
                <div class="switch">
                    <label>
                        <input type="checkbox" onchange="toggleDevice('leddapur')" />
                        <div class="slider"></div>
                    </label>
                </div>
            </div>
            <div class="device" id="ledkamar">
                <span>LAMPU KAMAR</span>
                <div class="switch">
                    <label>
                        <input type="checkbox" onchange="toggleDevice('ledkamar')" />
                        <div class="slider"></div>
                    </label>
                </div>
            </div>
            <div class="device" id="ledmakan">
                <span>LAMPU <br>RUANG MAKAN</span>
                <div class="switch">
                    <label>
                        <input type="checkbox" onchange="toggleDevice('ledmakan')" />
                        <div class="slider"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update date and time
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

        // Toggle device state
        function toggleDevice(id) {
            const device = document.getElementById(id);
            device.classList.toggle("on");
        }
    </script>
</body>

</html>
