// load puzzle from banana API
let correctAnswer = null;
function loadPuzzle(){
    fetch("https://marcconrad.com/uob/banana/api.php?out=json")
    .then(res => res.json())
    .then(data => {
        document.getElementById("bananaPuzzleImage").src = data.question;
        correctAnswer = data.solution;
        generateAnswers(correctAnswer);
    });
}
function generateAnswers(correct){
    let answers = [correct];
    while(answers.length < 4){
        let random = Math.floor(Math.random() * 10);
        if(!answers.includes(random)){
            answers.push(random);
        }
    }
    answers.sort(() => Math.random() - 0.5);
    let buttons = document.querySelectorAll(".answerBtn");
    buttons.forEach((btn,i)=>{
        btn.innerText += " " + answers[i];
        btn.onclick = function(){
            if(parseInt(this.innerText.slice(3)) == correctAnswer){
                hintListCorrect.style.display = "block";
                playSound("assets/sounds/success.wav");
            }else{
                hintListWrong.style.display = "block";
                playSound("assets/sounds/fail.wav");
            }
        };
    });
}
window.onload = loadPuzzle;

// load question from shortcut questions API
fetch("assets/php/shortcutQuestionsApi.php")
    .then(res => res.json())
        .then(data => {
            document.getElementById("question").innerText = data.question;
            let buttons = document.querySelectorAll(".qAnswerBtn");
            buttons.forEach((btn,i)=>{
            btn.innerText = data.answers[i];
            btn.onclick = function(){
            if(i === data.correctIndex){
                questionCorrect.style.display = "block";
                playSound("assets/sounds/success.wav");
            }else{
                questionWrong.style.display = "block";
                playSound("assets/sounds/fail.wav");
            }
        }
    })
});

// puzzle marking and chances logic
let correctPointsCount = 0;
let extraTime = 0;
let hearts = document.querySelectorAll("#heartsList img");
let heartsLeft = hearts.length;
const puzzle = document.getElementById("wrongImage");
const container = document.querySelector("#mainImages>div");
const tolerance = 20;
puzzle.addEventListener("click", function(e){
const rect = puzzle.getBoundingClientRect();
const containerRect = container.getBoundingClientRect();
const style = window.getComputedStyle(puzzle);
const borderLeft = parseFloat(style.borderLeftWidth);
const borderTop = parseFloat(style.borderTopWidth);
const clickX = ((e.clientX - rect.left) - borderLeft) / gameScale;
const clickY = ((e.clientY - rect.top) - borderTop) / gameScale;
const posX = (e.clientX - containerRect.left) / gameScale;
const posY = (e.clientY - containerRect.top) / gameScale;
    let found = false;
    correctPoints.forEach(point => {
        if(
            !point.found &&
            Math.abs(clickX - point.x) <= tolerance &&
            Math.abs(clickY - point.y) <= tolerance
        ){
            point.found = true;
            showCorrect(posX, posY);
            found = true;
        }
    });
    if(!found){
        showWrong(posX, posY);
    }
});
function showCorrect(x,y){
    playSound("assets/sounds/correctSpot.wav");
    const mark = document.createElement("div");
    mark.classList.add("mark","correctMark");
    mark.style.left = x+"px";
    mark.style.top = y+"px";
    container.appendChild(mark);
    correctPointsCount++;
    let scoreSaved = false;
    if(correctPointsCount == 3 && !scoreSaved){
        scoreSaved = true;
        let finalScore = timeLeft + (heartsLeft * 10) - extraTime;
        setTimeout(()=>{
            puzzleComplete.style.display = "block";
            playSound("assets/sounds/success.wav");
            fetch("assets/php/saveScore.php",{
                method:"POST",
                body:new URLSearchParams({
                    puzzleId:puzzleIdNumber,
                    score:finalScore
                })
            })
        },300);
    }
} 
function showWrong(x,y){
    playSound("assets/sounds/wrongSpot.wav");
    const mark=document.createElement("div");
    mark.classList.add("mark","wrongMark");
    mark.innerHTML="✖";
    mark.style.left=x+"px";
    mark.style.top=y+"px";
    container.appendChild(mark);
    setTimeout(()=>{
        mark.remove();
    },1000);
    if(heartsLeft>0){
        let heart=hearts[heartsLeft-1];
        heart.classList.add("heartPop");
        setTimeout(()=>{
            heart.remove();
        },400);
        heartsLeft--;
    }
    if(heartsLeft===0){
        setTimeout(()=>{
            chancesUp.style.display="block";
            playSound("assets/sounds/fail.wav");
        },100);
    }
}

// update timer
function updateTimer(){
    if(hintPopup.style.display!="none" || timePopup.style.display!="none" || chancesUp.style.display!="none" || puzzleComplete.style.display!="none" || menu.style.display!="none"){
        return;
    }
    let minutes = Math.floor(timeLeft/60);
    let seconds = timeLeft%60;
    minutes = minutes.toString().padStart(2,'0');
    seconds = seconds.toString().padStart(2,'0');
    document.getElementById("timer").innerText = minutes + ":" + seconds;
    if(timeLeft<=0){
        clearInterval(timerInterval);
        document.getElementById("timeUp").style.display="block";
        playSound("assets/sounds/fail.wav");
    }
    timeLeft--;
}
updateTimer();
let timerInterval = setInterval(updateTimer,1000);