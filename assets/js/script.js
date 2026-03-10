// scale game to fit screen while maintaining aspect ratio
let gameScale = 1;
function scaleGame() {
    const game = document.querySelector(".game-container");
    const baseWidth = 1366;
    const baseHeight = 605;
    const scaleX = window.innerWidth / baseWidth;
    const scaleY = window.innerHeight / baseHeight;
    gameScale = Math.min(scaleX, scaleY);
    game.style.transform = `
        translate(-50%, -50%)
        scale(${gameScale})
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

// play sound effects
function playSound(audioSrc) {
    if (soundValue !== "on") return;
    const audio = new Audio(audioSrc);
    audio.play();
}
const clickSound=new Audio("assets/sounds/click.wav");
function playClick(){
    if(soundValue!=="on") return;
    clickSound.currentTime=0;
    clickSound.play();
}
document.addEventListener("click",function(e){
    if(e.target.closest("button")){
        playClick();
    }
    if(e.target.closest(".clickable")){
        playClick();
    }
    if(e.target.closest("a")){
        playClick();
    }
});
document.querySelectorAll(".gameMapPuzzles").forEach(mapImg => {
    mapImg.addEventListener("mouseenter", () => playSound("assets/sounds/hover.wav"));
});