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