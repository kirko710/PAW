function updateGreeting() {
    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const currentTime = hours + (minutes / 100);
    
    let message = "";

    if (currentTime >= 0.01 && currentTime <= 10.59) {
        message = "SELAMAT PAGI";
    } else if (currentTime >= 11.00 && currentTime <= 13.59) {
        message = "SELAMAT SIANG";
    } else if (currentTime >= 14.00 && currentTime <= 17.59) {
        message = "SELAMAT SORE";
    } else {
        message = "SELAMAT PETANG";
    }

    const greetingElement = document.getElementById("greeting");
    greetingElement.innerText = message;
}

updateGreeting();