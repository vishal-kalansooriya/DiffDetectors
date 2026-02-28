// scale game to window size while maintaining aspect ratio
function scaleGame() {
    const game = document.querySelector(".game-container");
    const scaleX = window.innerWidth / 1366;
    const scaleY = window.innerHeight / 605;
    const scale = Math.min(scaleX, scaleY);
    game.style.transform = `scale(${scale})`;
}
window.addEventListener("resize", scaleGame);
window.addEventListener("load", scaleGame);

// set sound value in local storage and toggle sound on click
let soundValue = localStorage.getItem("soundValue");
if (soundValue === null) {
    soundValue = "on";
    localStorage.setItem("soundValue", soundValue);
}
let sound = document.getElementById("sound");
let noSound = document.getElementById("noSound");
if (sound && noSound) {
    updateSoundUI();
}
function toggleSound() {
    soundValue = (soundValue === "on") ? "off" : "on";
    localStorage.setItem("soundValue", soundValue);
    updateSoundUI();
}
function updateSoundUI() {
    if (soundValue === "on") {
        sound.style.display = "block";
        noSound.style.display = "none";
    } else {
        sound.style.display = "none";
        noSound.style.display = "block";
    }
}