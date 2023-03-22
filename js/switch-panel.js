const logIn = document.querySelector('#login');
const signUp = document.querySelector('#signup');

const showLogIn = document.querySelector('#showLogIn');
const showSignUp = document.querySelector('#showSignUp');


showLogIn.addEventListener('click', () => {
    logIn.style.display = "block";
    showLogIn.style.borderBottom = "3px solid #eee";
    showSignUp.style.borderBottom = "none";
    signUp.style.display = "none";
});

showSignUp.addEventListener('click', () => {
    signUp.style.display = "block";
    showSignUp.style.borderBottom = "3px solid #eee";
    showLogIn.style.borderBottom = "none";
    logIn.style.display = "none";
});