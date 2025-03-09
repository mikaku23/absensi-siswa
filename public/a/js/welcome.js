const messages = ["Welcome", "Selamat Datang"];
let currentMessageIndex = 0;
let currentCharIndex = 0;
let isDeleting = false;
const speed = 200;
const element = document.getElementById("welcomeMessage");

function type() {
    const currentMessage = messages[currentMessageIndex];
    if (isDeleting) {
        element.textContent = currentMessage.substring(0, currentCharIndex--);
        if (currentCharIndex < 0) {
            isDeleting = false;
            currentMessageIndex = (currentMessageIndex + 1) % messages.length;
        }
    } else {
        element.textContent = currentMessage.substring(0, currentCharIndex++);
        if (currentCharIndex > currentMessage.length) {
            isDeleting = true;
        }
    }

    // Change text color based on the current message
    if (currentMessageIndex === 0) {
        element.style.color = "black";
    } else {
        element.style.color = "rgb(51, 63, 131)";
    }

    setTimeout(type, speed);
}

type();
