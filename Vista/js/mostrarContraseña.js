let icon = document.getElementById('view');
let view_password = document.getElementById('contra');

icon.addEventListener('click', function(){

  if(view_password.type == 'password'){

    icon.classList.add('bxs-lock-open');
    view_password.type="text";

  }
  else{

    icon.classList.remove('bxs-lock-open');
    view_password.type="password";

  }

})
