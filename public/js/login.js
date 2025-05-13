let loginform = document.getElementById("Loginform");
let loginlink = document.getElementById("loginlink");
let registerlink = document.getElementById("registerlink");

function muncullogin (){
    loginform.classList.remove("hidden");
    loginlink.classList.add("border-b-2");
    loginlink.classList.add("text-blue-400");
    registerlink.classList.remove("border-b-2");
    registerlink.classList.remove("text-blue-400");

}

function munculregister (){
    loginform.classList.add("hidden");
    loginlink.classList.remove("border-b-2");
    loginlink.classList.remove("text-blue-400");
    registerlink.classList.add("border-b-2");
}

function closemassage(){
    let massage = document.getElementById('massage');
    massage.classList.add("hidden"); 
}

//register
const input = document.getElementById('password');
const button = document.getElementById('mybutton');
const massage = document.getElementById('error');

    input.addEventListener('input', function () {
        console.log(input.value.length)
        if (input.value.length < 8) {
            massage.style.display = "block"
            input.style.borderColor = "red"
            button.style.opacity = 0.8
    
        } else {
            massage.style.display = "none"
            input.style.borderColor = "blue"
            button.style.opacity = 1
            button.disabled = false
        }
    });  



