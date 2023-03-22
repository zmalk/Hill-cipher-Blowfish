const friend_list = document.querySelector("#friend_list");
link = document.querySelector("#logout_id");

isSession();
function isSession(){
     let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/isSession.php", false);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                 let data = xhr.response;
                 if(data == "success"){
                     location.href = "/index.php";
                 }
            }
        }
    }
    xhr.send();
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "../php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          friend_list.innerHTML = data;
          isOnline = document.querySelectorAll('.status');
          changeBackground();
        }
    }
  }
  xhr.send();
}, 500);

function changeBackground() {
  isOnline.forEach(element => {
    if(element.textContent == "Online") {
      element.style.background = "#66FF99";
    }else {
      element.style.background = "#F32013";
    }
  });
}

getSessionId();
function getSessionId(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/session-config.php",false);
    xhr.onload = () => {
     if (xhr.readyState === XMLHttpRequest.DONE) {
         if (xhr.status === 200) {
            let data = xhr.response;
            link.href = "logout.php?logout_id=" + data;
        }
     }
    }
  xhr.send();
}

