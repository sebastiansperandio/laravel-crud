/* 
* ============================================================
* JS file to manage Contact Create
* ============================================================
*/

(function(){
  
  let form = document.getElementById('create_form');
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    readContactInfo();
  });

/* Get all input data */
function readContactInfo(){

  let name = document.querySelector('#name').value;
  let last_name = document.querySelector('#last_name').value;
  let email = document.querySelector('#email').value;
  let phone1 = document.querySelector('#phone1').value;
  let phone2 = document.querySelector('#phone2').value;
  let phone3 = document.querySelector('#phone3').value;
  let phonesArray = [phone1, phone2, phone3];
  
  let phones = phonesArray.filter(phone => phone !== "" );
  console.log()
  let contactInfo= {
    name,
    last_name,
    email,
    phones
  };
  
  createNewContact(contactInfo);
}

/* POST - Create a new contact */
function createNewContact(contactInfo){
  const url = `/api/contacts`;

  axios.post(url, contactInfo)
    .then(response => manageStatus(response.data))
    .catch(error => console.log(error.message));
}

/* Redirect to contact list */
function manageStatus({message}){
  if(message === 'ok'){
    window.location.href = `/contacts`;
  }else{
    //TODO error handler and notifications
  }
}
})()