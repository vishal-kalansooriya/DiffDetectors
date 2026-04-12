<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}
?>          
<link rel="stylesheet" href="assets/css/addPuzzle.css">
<script>
    document.title="Add Puzzle | "+titleName;

    // mark spots and show preview images
    var spots=[];
    const maxSpots=3;
    window.onload=function(){
    const previewBox=document.getElementById("spotMissingImagePreview");
    const spotsInput=document.getElementById("spotsData");
    const correctInput=document.getElementById("uploadCorrectImage");
    const correctPreviewBox=correctInput.nextElementSibling;
    correctInput.addEventListener("change",function(){
        const file=this.files[0];
        if(!file){
            correctPreviewBox.innerHTML="";
            return;
        }
        const reader=new FileReader();
        reader.onload=function(e){
            correctPreviewBox.innerHTML=`<img src="${e.target.result}" draggable="false">`;
        };
        reader.readAsDataURL(file);
    });
    document.getElementById("spotMissingImage").addEventListener("change",function(){
        const file=this.files[0];
        if(!file){
            previewBox.innerHTML="";
            spots=[];
            spotsInput.value="[]";
            return;
        }
        const reader=new FileReader();
        reader.onload=function(e){
            previewBox.innerHTML=`<img src="${e.target.result}" draggable="false">`;
            const img=previewBox.querySelector("img");
            img.addEventListener("click",function(ev){
                const rect=img.getBoundingClientRect();
                const percentX = Number(((ev.clientX - rect.left) / rect.width).toFixed(4));
                const percentY = Number(((ev.clientY - rect.top) / rect.height).toFixed(4));
                for(let p of spots){
                    if(Math.abs(p.x-percentX)<=0.01 && Math.abs(p.y-percentY)<=0.01){
                        return;
                    }
                }
                if(spots.length>=maxSpots) return;
                spots.push({
                    x:percentX,
                    y:percentY,
                    found:false
                });
                const mark=document.createElement("div");
                mark.classList.add("spotMarker");
                mark.style.left=(percentX*100)+"%";
                mark.style.top=(percentY*100)+"%";
                previewBox.appendChild(mark);
                spotsInput.value=JSON.stringify(spots);
            });
            img.addEventListener("contextmenu",function(e){
                e.preventDefault();
                if(spots.length===0) return;
                spots.shift();
                const markers=previewBox.querySelectorAll(".spotMarker");
                if(markers.length>0) markers[0].remove();
                spotsInput.value=JSON.stringify(spots);
            });
        };
        reader.readAsDataURL(file);
    });
    };
</script>  
<h1>+ Add Puzzle +</h1>
<form method="post" enctype="multipart/form-data">
    <div>
        <span>
            <label for="uploadCorrectImage">Upload Correct Image:</label>
            <input type="file" accept="image/png" name="uploadCorrectImage" id="uploadCorrectImage" required>
            <div class="previewBox"></div>
        </span>
        <span>
            <label for="spotMissingImage">Spot Missing Image:</label>
            <input type="file" accept="image/png" name="spotMissingImage" id="spotMissingImage" required>
            <div class="previewBox" id="spotMissingImagePreview"></div>
        </span>
        <input type="hidden" name="spotsData" id="spotsData" value='[{x:100, y:100, found:false},{x:50, y:50, found:false},{x:20, y:20, found:false}]'>
    </div>
    <div>
        <span id="hardnessLevelSelector">
            <label>Hardness Level:</label>
            <label>
                <input type="radio" name="hardnessLevel" value="Easy 30s" required checked>
                Easy 30s
            </label>
            <label>
                <input type="radio" name="hardnessLevel" value="Normal 20s">
                Normal 20s
            </label>
            <label>
                <input type="radio" name="hardnessLevel" value="Hard 10s">
                Hard 10s
            </label>
        </span>
        <span>
            <label for="hintMessage">Hint Message:</label>
            <textarea name="hintMessage" id="hintMessage" required></textarea>
        </span>
        <div>
            <button type="button" onclick="if(spots.length!=maxSpots){alert('Please place all spots.');} else {this.type='submit';};" class="greenButton" name="addPuzzle">Upload</button>
            <button onclick="window.location.href='adminPanel.php';" class="pinkButton">Go Back</button>
        </div>
    </div>
</form>
<?php
include 'assets/php/footer.php';
?>       