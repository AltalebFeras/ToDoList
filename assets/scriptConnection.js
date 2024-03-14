function Validation(){
  let name = document.getElementById('name').value;
  let surname = document.getElementById('surname').value;
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;
  let passwordVerify = document.getElementById('passwordVerify').value;
  let message = document.getElementById('message');
 
  if (name.length === 0 ||surname.length === 0 ||email.length === 0 || password.length === 0 || passwordVerify.length === 0 ) {
    message.textContent = "Tous les champs doivent être remplis.";
    message.classList.remove('succes');
    message.classList.add('echec');
    return false;
  } else {
    return true;
  }
}

//for the page sign in
function ValidationConnection(){
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;
  let message = document.getElementById('message');

  if (email.length === 0 || password.length === 0) {
    message.textContent = "Tous les champs doivent être remplis.";
    message.classList.remove('succes');
    message.classList.add('echec');
    return false;
  } else {
    return true;
  }
}
