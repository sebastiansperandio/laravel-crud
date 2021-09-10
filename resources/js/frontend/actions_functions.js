/* 
* ============================================================
* JS file to manage Actions of Contact CRUD
* ============================================================
*/

/* GET - Get all contacts */
export function getAllClients() {
  const url = `/api/contacts`;
  
  axios.get(url)
    .then(response => printContactList(response.data));
}

/* Function to print contacts in a table*/
function printContactList(contacts){
  createRows(contacts);
  createEventListeners();
}

/* Function to create a row for each contact */
function createRows(contacts){
let tableBodySelector = document.querySelector('#table-body');
contacts.forEach( contact => {
  let { id, name, last_name, email, phones } = contact;
  /* let contactPhones = phones.map(phone => phone.phone); */


  let userPhones = '';
  
  phones.forEach(phone =>  userPhones += ` | ${phone.phone}`);
  

  tableBodySelector.innerHTML += `
  <tr id="contact_${id}">
    <td scope="row">${name}</td>
    <td>${last_name}</td>
    <td>${email}</td>
    <td>${userPhones}</td>
    <td>
    <a href="#" class="view-action far fa-eye" data-user-id="${id}" title="View"></a>
    |
    <a href="/contacts/${id}/edit" title="Edit"><i class="far fa-edit"></i></a>
    |
    <a href="#" class="delete-action fa fa-trash" data-user-id="${id}" title="Delete"></a>
    </td>
  </tr>
  `;
});
}

/* create event listener for View and Delete CRUD actions */
export function createEventListeners(){
  let viewSelectors = document.querySelectorAll(".view-action");
  viewSelectors.forEach((viewSelector) => {
    viewSelector.addEventListener('click', (e) => {
      e.preventDefault();
      let userId = e.target.dataset.userId;
      getContact(userId);
    })
  })

  let deleteSelectors = document.querySelectorAll(".delete-action");
  deleteSelectors.forEach((deleteSelector) => {
    deleteSelector.addEventListener('click', (e) => {
      e.preventDefault();
      let userId = e.target.dataset.userId;
      deleteContact(userId);
    })
  })
}

/* DELETE - Delete action - Contact CRUD */
export function deleteContact(userId) {
  if (window.confirm("Are you sure?")) {
    const url = `/api/contacts/${userId}`;
    
    axios.delete(url)
    .then(response => {
      if(response.data){
        document.querySelector(`#contact_${userId}`).remove();
      }
    });
  }
}

/* GET - View action - Contact CRUD */
export function getContact(userId) {
    const url = `/api/contacts/${userId}/view`;
    
    axios.get(url)
    .then(response => showContactInfo(response.data));
  
}

/* Function to push information and show modal in list view*/
export function showContactInfo(contactInfo){
  let { name, last_name, email, phones } = contactInfo;
  let nameModalSelector = document.querySelector("#contact-name");
  nameModalSelector.innerHTML = `Contacto: ${name} ${last_name}`;    

  let infoModalSelector = document.querySelector("#contact-info");
  let contactPhones = ''; 
  phones.forEach(phone =>  contactPhones += ` | ${phone.phone}`);
  infoModalSelector.innerHTML = `
    <strong>Email:</strong> ${email}
    <br>
    <strong>Phones:</strong> ${contactPhones}
  `;    
  $('#contactIndoModal').modal();
}