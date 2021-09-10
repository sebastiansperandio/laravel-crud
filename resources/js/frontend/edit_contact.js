/* 
* ============================================================
* JS file to manage Contact Edit
* ============================================================
*/

(function(){
  
  let id = document.querySelector('#user-id').dataset.userId;
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
  let phone1Id = document.querySelector('#phone1').dataset.phoneId;
  let phone2 = document.querySelector('#phone2').value;
  let phone2Id = document.querySelector('#phone2').dataset.phoneId;
  let phone3 = document.querySelector('#phone3').value;
  let phone3Id = document.querySelector('#phone3').dataset.phoneId;
  
  let contactInfo= {
    id,
    name,
    last_name,
    email,
    phones: [
      {"id":phone1Id, "phone":phone1},
      {"id":phone2Id, "phone":phone2},
      {"id":phone3Id, "phone":phone3}
    ]
    
  };
  
  editContact(contactInfo);
}

/* POST - Edit a contact given */
function editContact(contactInfo){
  let { id } = contactInfo;
  const url = `/api/contacts/${id}`;

  axios.put(url, contactInfo)
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