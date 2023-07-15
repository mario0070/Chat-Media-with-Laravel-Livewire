var password = document.getElementById("password")
password.addEventListener("focusin",()=>{
    var hand1 = document.getElementById("hand1").classList.add("valid")
    var hand2 = document.getElementById("hand2").classList.add("valid")
})

password.addEventListener("focusout",()=>{
    var hand1 = document.getElementById("hand1").classList.remove("valid")
    var hand2 = document.getElementById("hand2").classList.remove("valid")
})