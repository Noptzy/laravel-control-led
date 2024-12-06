<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IoT LED Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 font-sans text-gray-800">
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <!-- Navbar -->
        <section class="navbar bg-gray-800 text-white p-4 text-center rounded-t-lg">
            <h1 class="text-2xl font-bold tracking-wider">IoT Led Control</h1>
        </section>

        <!-- LEDs Section -->
        <section class="leds grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 my-8">
            <!-- LED 1 -->
            <div class="led bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="assets/led-off.png" alt="" class="led-image mx-auto w-24 h-24" id="dapurLedImage" />
                <p class="led-location-text mt-4 text-center font-semibold text-gray-600">
                    Lampu Ruang Dapur
                </p>
                <div class="flex justify-center mt-4">
                    <button
                        class="led-submit bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 transition"
                        id="ledDapur" onclick="toggleDapurLed()">
                        TURN ON
                    </button>
                </div>
            </div>

            <!-- LED 2 -->
            <div class="led bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="assets/led-off.png" alt="" class="led-image mx-auto w-24 h-24" id="tamuLedImage" />
                <p class="led-location-text mt-4 text-center font-semibold text-gray-600">
                    Lampu Ruang Tamu
                </p>
                <div class="flex justify-center mt-4">
                    <button
                        class="led-submit bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 transition"
                        id="ledTamu" onclick="toggleTamuLed()">
                        TURN ON
                    </button>
                </div>
            </div>

            <!-- LED 3 -->
            <div class="led bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <img src="assets/led-off.png" alt="" class="led-image mx-auto w-24 h-24" id="makanLedImage" />
                <p class="led-location-text mt-4 text-center font-semibold text-gray-600">
                    Lampu Ruang Makan
                </p>
                <div class="flex justify-center mt-4">
                    <button
                        class="led-submit bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 transition"
                        id="ledMakan" onclick="toggleMakanLed()">
                        TURN ON
                    </button>
                </div>
            </div>
        </section>
    </div>

    <script>
        const endpoint = "http://192.168.100.32"; 
        function checkAndUpdateLedStatus() {
            getDapurLed();
            getTamuLed();
            getMakanLed();
        }

        function getDapurLed() {
            fetch(`${endpoint}/dapur`, {
                method: "GET"
            })
                .then(response => response.text())
                .then(result => {
                    const dapurLedButton = document.getElementById('ledDapur');
                    const dapurLedImage = document.getElementById('dapurLedImage');

                    if (result === "ON") {
                        dapurLedButton.innerHTML = "TURN OFF";
                        dapurLedImage.src = "assets/led-on.png";  
                    } else {
                        dapurLedButton.innerHTML = "TURN ON";
                        dapurLedImage.src = "assets/led-off.png"; 
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        function getTamuLed() {
            fetch(`${endpoint}/tamu`, {
                method: "GET"
            })
                .then(response => response.text())
                .then(result => {
                    const tamuLedButton = document.getElementById('ledTamu');
                    const tamuLedImage = document.getElementById('tamuLedImage');

                    if (result === "ON") {
                        tamuLedButton.innerHTML = "TURN OFF";
                        tamuLedImage.src = "assets/led-on.png"; 
                    } else {
                        tamuLedButton.innerHTML = "TURN ON";
                        tamuLedImage.src = "assets/led-off.png"; 
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        function getMakanLed() {
            fetch(`${endpoint}/makan`, {
                method: "GET"
            })
                .then(response => response.text())
                .then(result => {
                    const makanLedButton = document.getElementById('ledMakan');
                    const makanLedImage = document.getElementById('makanLedImage');

                    if (result === "ON") {
                        makanLedButton.innerHTML = "TURN OFF";
                        makanLedImage.src = "assets/led-on.png";
                    } else {
                        makanLedButton.innerHTML = "TURN ON";
                        makanLedImage.src = "assets/led-off.png";
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        function toggleDapurLed() {
            fetch(`${endpoint}/dapur`, {
                method: "POST"
            })
                .then(response => response.text())
                .then(result => {
                    checkAndUpdateLedStatus(); 
                })
                .catch(error => console.error("Error:", error));
        }

        function toggleTamuLed() {
            fetch(`${endpoint}/tamu`, {
                method: "POST"
            })
                .then(response => response.text())
                .then(result => {
                    checkAndUpdateLedStatus();
                })
                .catch(error => console.error("Error:", error));
        }

        function toggleMakanLed() {
            fetch(`${endpoint}/makan`, {
                method: "POST"
            })
                .then(response => response.text())
                .then(result => {
                    checkAndUpdateLedStatus(); 
                })
                .catch(error => console.error("Error:", error));
        }
        checkAndUpdateLedStatus();
    </script>
</body>

</html>
