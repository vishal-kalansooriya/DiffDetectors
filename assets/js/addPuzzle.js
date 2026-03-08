document.querySelectorAll("input[type='file']").forEach(input=>{
    input.addEventListener("change", function(){
        const previewBox = this.nextElementSibling;
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                previewBox.innerHTML = `<img src="${e.target.result}">`;
            };
            reader.readAsDataURL(file);
        }
    });
});