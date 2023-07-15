var showUsers = document.getElementById("showUsers")
.addEventListener("click",()=>{
    var users = document.getElementById("users")
    users.classList.toggle("valid")
})

// Send Message
$(document).ready(function(){
    $("#sendMsg").on("click",()=>{
        $("#chatBox").scrollTop($("#msgContainer").height());
    })

    // scroll to bottom on page load
    $("#getChat").on("click",()=>{
        $("#chatBox").scrollTop($("#msgContainer").height());
    })

    $(() => {
        $("#chatBox").scrollTop($("#msgContainer").height()); 
    });
})

// play sound when msg is sent 
function play(){
    var msgInput = document.getElementById("msgInput").value;
    if(msgInput != ""){
        var audio = new Audio("music1.mp3")
        audio.play();

        setTimeout(()=>{
            audio.pause();
        },1000)
    }
    
}




// var closeNav = document.getElementById("close")
// .addEventListener("click",()=>{
//     var users = document.getElementById("users")
//     users.classList.remove("valid")
// })


