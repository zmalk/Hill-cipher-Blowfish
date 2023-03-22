const formSigup = document.querySelector(".signup form");
signUpBtn = document.querySelector("#sign-up-btn");

isSession();
function isSession(){
     let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/isSession.php", false);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                 let data = xhr.response;
                 if(data == "failed"){
                     location.href = "/php/friends.php";
                 }
            }
        }
    }
    xhr.send();
}

formSigup.onsubmit = (e)=>{
    e.preventDefault();
}

signUpBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/signup-config.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                  logIn.style.display = "block";
                  showLogIn.style.borderBottom = "3px solid #eee";
                  showSignUp.style.borderBottom = "none";
                  signUp.style.display = "none";
              }else{
                console.log(data);
              }
          }
      }
    }
    let formData = new FormData(formSigup);
    xhr.send(formData);
}
const formLogin = document.querySelector(".login form");
logInBtn = document.querySelector("#login-btn");

formLogin.onsubmit = (e)=>{
    e.preventDefault();
}

logInBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/login-config.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "/php/friends.php";
              }else{
                  console.log(data);
              }
          }
      }
    }
    let formData = new FormData(formLogin);
    xhr.send(formData);
}