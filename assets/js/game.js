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
            }else{
                hintListWrong.style.display = "block";
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
            }else{
                questionWrong.style.display = "block";
            }
        }
    })
});