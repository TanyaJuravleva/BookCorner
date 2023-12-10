MicroModal.init({
    onShow: modal => openPopup(), // [1]
    onClose: modal =>  function(){}, // [2]
    openTrigger: 'data-custom-open', // [3]
    closeTrigger: 'data-custom-close', // [4]
    openClass: 'is-open', // [5]
    disableScroll: true, // [6]
    disableFocus: false, // [7]
    awaitOpenAnimation: false, // [8]
    awaitCloseAnimation: false, // [9]
    debugMode: false // [10]
  });

function openPopup()
{
  popup = document.getElementsByClassName('is-open')[0];
  popupID = popup.getAttribute('id')
  if (popupID == "popupFormRegistration")
  {
    const form = document.getElementById('formRegistation')
    const name = form.getElementsByClassName('js-form-input-name')[0];
    const email = form.getElementsByClassName('js-form-input-email')[0];
    const phone = form.getElementsByClassName('js-form-input-phone')[0];
    const pass = form.getElementsByClassName('js-form-input-pass')[0];
    const submit = form.getElementsByClassName('js-send-form')[0];
    const params = {
      email: email,
      name: name,
      pass: pass,
      phone: phone,
      form: form
  }
    submit.addEventListener('click', (event) => validator(event, params));
    
  }
  if (popupID == "popupFormLogin")
  {
    const form = document.getElementById('popupFormLogin')
    const email = form.getElementsByClassName('js-form-input-email')[0];
    const pass = form.getElementsByClassName('js-form-input-pass')[0];
    const submit = form.getElementsByClassName('js-send-form')[0];
    const params = {
        email: email,
        pass: pass,
        form: form
    }
    // console.log(submit)
    submit.addEventListener('click', (event) => login(event, params));
  }
}

function isValidName(name)
{
    const nameValid = name.replace(/[a-zA-Z ]/g, '');
    if ( nameValid !== '' || name == '')
    {
        return false;
    }
    return true;
}

function isValidEmail(email)
{
    const emailValid = email.replace(/[^@]/g, '');
    if (emailValid == '')
    {
        return false;
    }
    return true;
}   

function isValidPass(pass)
{
  const passValid = pass.replace(/[]/g, '');
  if (passValid == '')
  {
      return false;
  }
  return true;
}

function isValid(ch)
{
    if (ch == '')
    {
        return false;
    }
    return true;
}  

function login(event, params)
{
  event.preventDefault();
  const email_ex = params.form.getElementsByClassName('email-exist')[0]
  email_ex.classList.add('dis-none');
  let emailValue = params.email.value;
  let passValue = params.pass.value;
  let valid = false;
  if (!isValidEmail(emailValue))
  {
    params.email.classList.add('error');
  }
  else
  {
    params.email.classList.remove('error');
  }
  if (!isValid(passValue))
  {
    params.pass.classList.add('error');
  }
  else
  {
    params.pass.classList.remove('error');
  }
  valid = isValid(passValue) && isValidEmail(emailValue)
  const user = {
      email: emailValue,
      pass: passValue,
  }
  if (valid)
  {
      const response = fetch('app/controller/login.php', {
          method: 'POST',
          headers: {
          'Content-Type': 'application/json;charset=utf-8',
          },
          body: JSON.stringify(user),
      })
      .then(response => (response.json()))
      .then(response => {
        console.log(response.status)
         if (response.status == 200)
         {
          const email_ex = params.form.getElementsByClassName('email-exist')[0]
          email_ex.classList.add('dis-none');
          location.reload();
         }
         if (response.status == 500)
         {
            email_ex.classList.remove('dis-none');
         }
      })
  }
}

function validator(event, params)
{
    event.preventDefault();
    let nameValue = params.name.value;
    let emailValue = params.email.value;
    let phoneValue = params.phone.value;
    let passValue = params.pass.value;
    let valid = true;
    if (!isValidName(nameValue))
    {
      params.name.classList.add('error');
    }
    else
    {
      params.name.classList.remove('error');
    }
    if (!isValidPass(passValue))
    {
      params.pass.classList.add('error');
    }
    else
    {
      params.pass.classList.remove('error');
    }
    if (!isValidEmail(emailValue))
    {
      params.email.classList.add('error');
    }
    else
    {
      params.email.classList.remove('error');
    }
    valid = isValidPass(passValue) && isValidEmail(emailValue) && isValidName(nameValue)
    const user = {
        email: emailValue,
        name: nameValue,
        phone: phoneValue,
        pass: passValue,
    }
    if (valid)
    {
        const response = fetch('app/controller/reg.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json;charset=utf-8',
            },
            body: JSON.stringify(user),
        })
        .then(response => (response.json()))
        .then(response => {
            if (response.status == 200)
            {
              const email_ex = params.form.getElementsByClassName('email-exist')[0]
              email_ex.classList.add('dis-none');
              location.reload();
            }
            if (response.status == 500)
            {
              const email_ex = params.form.getElementsByClassName('email-exist')[0]
              email_ex.classList.remove('dis-none');
            }
        })
    }
}