// scale game to fit screen while maintaining aspect ratio
function scaleGame() {
    const game = document.querySelector(".game-container");
    const baseWidth = 1366;
    const baseHeight = 605;
    const scaleX = window.innerWidth / baseWidth;
    const scaleY = window.innerHeight / baseHeight;
    const scale = Math.min(scaleX, scaleY);
    game.style.transform = `
        translate(-50%, -50%)
        scale(${scale})
    `;
}
window.addEventListener("resize", scaleGame);
window.addEventListener("load", scaleGame);

// preloader
window.addEventListener("load", function() {
    document.getElementById("preloader").style.display = "none";
});

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