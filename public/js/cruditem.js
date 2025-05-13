

//create form
let createform = document.getElementById('createform');
let createbutton = document.getElementById('createbutton');

createbutton.addEventListener("click", function(){
    createform.classList.toggle("hidden")
})

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
    let massage = document.getElementById('massage');
    massage.classList.add("hidden");
}



function closebutton(){
    createform.classList.add("hidden");
    for (const editfor of editform) {
        editfor.classList.add("hidden");           
    }

}

// input file img
let fileinput = document.getElementById('file-input');
let pname = document.getElementById('file-name');

fileinput.addEventListener('change', function(event) {
    let fileName = event.target.files[0].name;
    pname.textContent = fileName;
});
