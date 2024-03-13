function Validation(){
  let userName = document.getElementById('userName').value;
  let password = document.getElementById('password').value;
  let passwordVerify = document.getElementById('passwordVerify').value;
  let message = document.getElementById('message');
 
  if (userName.length === 0 || password.length === 0 || passwordVerify.length === 0 ) {
    message.textContent = "Tous les champs doivent être remplis.";
    message.classList.remove('succes');
    message.classList.add('echec');
    return false;
  } else {
    return true;
  }
}
function ValidationConnection(){
  let userName = document.getElementById('userName').value;
  let password = document.getElementById('password').value;
  let message = document.getElementById('message');

  if (userName.length === 0 || password.length === 0) {
    message.textContent = "Tous les champs doivent être remplis.";
    message.classList.remove('succes');
    message.classList.add('echec');
    return false;
  } else {
    return true;
  }
}
