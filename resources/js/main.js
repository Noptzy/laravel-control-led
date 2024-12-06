const endpoint = "http://192.168.100.32";

//get

function getDapurLed(){
    fetch(`${endpoint}/dapur`, {
        method:"GET"
    })
    .then(response => response.text())
    .then(result => {
        if(result == "ON"){
            ledDapur.style.backgroundColor = "red";
            dapurLedImage.src = "{{ asset('assets/led-on.png') }}";
        }else{
            ledDapur.style.backgroundColor = "blue";
            dapurLedImage.src = "{{ asset('assets/led-off.png') }}";
        }
    })
    .catch(error => console.error("Error: ". error))
}

function getTamuLed(){
    fetch(`${endpoint}/tamu`, {
        method:"GET"
    })
    .then(response => response.text())
    .then(result => {
        if(result == "ON"){
            ledTamu.style.backgroundColor = "yellow";
            tamuLedImage.src = "./assets/led-on.png";
        }else{
            ledTamu.style.backgroundColor = "blue";
            tamuLedImage.src = "./assets/led-off.png";
        }
    })
    .catch(error => console.error("Error: ". error))
}

function getMakanLed(){
    fetch(`${endpoint}/makan`, {
        method:"GET"
    })
    .then(response => response.text())
    .then(result => {
        if(result == "ON"){
            ledMakan.style.backgroundColor = "green";
            makanLedImage.src = "./assets/led-on.png";
        }else{
            ledMakan.style.backgroundColor = "blue";
            makanLedImage.src = "./assets/led-off.png";
        }
    })
    .catch(error => console.error("Error: ". error))
}
//post
function setDapurLed() {
    fetch(`${endpoint}/dapur`, { // Gabungkan endpoint dengan path
        method: "POST"
    })
    .then(response => response.text())
    .then(result => {
        console.log(result);
        location.reload()
    })
    .catch(error => console.error("Error:", error));
}

function setTamuLed() {
    fetch(`${endpoint}/tamu`, { // Gabungkan endpoint dengan path
        method: "POST"
    })
    .then(response => response.text())
    .then(result => {
        console.log(result);
        location.reload()
    })
    .catch(error => console.error("Error:", error));
}

function setMakanLed() {
    fetch(`${endpoint}/makan`, { // Gabungkan endpoint dengan path
        method: "POST"
    })
    .then(response => response.text())
    .then(result => {
        console.log(result);
        location.reload()
    })
    .catch(error => console.error("Error:", error));
}

getDapurLed();
getTamuLed();
getMakanLed();
