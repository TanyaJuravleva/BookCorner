const button = document.getElementById('exit')
function exit(event)
{
    const response = fetch('../../app/controller/exit.php', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json;charset=utf-8',
        },
    })
    .then(response => (response.json()))
    .then(response => {
        if (response.status == 200)
        {
            window.location.href = 'http://localhost:8080/';
         // const email_ex = params.form.getElementsByClassName('email-exist')[0]
         // email_ex.classList.add('dis-none');
          //location.reload();
        }
      //  if (response.status == 500)
      //  {
          //const email_ex = params.form.getElementsByClassName('email-exist')[0]
          //email_ex.classList.remove('dis-none');
      //  }
    })
}
button.addEventListener('click', (event) => exit(event));
