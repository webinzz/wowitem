//edit form
let totaldata = document.getElementById("totaldata").textContent

let editform = [];
let editbutton = [];

for(let i= 0; i < totaldata; i++){

    editform[i] = document.querySelector(`#editform${i}`);
    editbutton[i] = document.querySelector(`#editbutton${i}`);

    editbutton[i].addEventListener("click", function(){
            editform[i].classList.toggle("hidden")
    })
};


//close massage button
document.addEventListener("DOMContentLoaded", function(){
    let massage = document.getElementById('massage');
     
})

function closemassage(){
    massage.classList.add("hidden");
}



function closebutton(){
    for (const editfor of editform) {
        editfor.classList.add("hidden");           
    }

}

