 // Update & delete model variables
const updateTitle = document.getElementById("newTitle");
const updateAuthor = document.getElementById("newAuthor");
const updateQuantity = document.getElementById("newQuantite");
const updateCategory = document.getElementById("newCategory");
const updateIsbn = document.getElementById("newIsbn");
const updateDatePub = document.getElementById("newPubDate");
const bookId = document.getElementById("bookId");

function initializeBook(index) {
  let dataInfo = document.getElementById(index).getAttribute("data-info");
  let arr = dataInfo.split(',')
  updateTitle.value = arr[0];
  updateAuthor.value = arr[1];
  updateCategory.value = arr[2];
  updateQuantity.value = arr[3];
  updateIsbn.value = arr[4];
  updateDatePub.value = arr[5];
  bookId.value = index;
}

 // resetBookForm Function resets the forms inputs
 function resetBookForm(){
    document.getElementById("form-book").reset();
  }

function wrapside() {
  let side = document.querySelector("#wrapper");
  side.classList.toggle("toggled");
}

// function validate() {
//   var mail = document.getElementById("").value;
//   var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/

//   if (regx.text(mail)) {

//   }
//   else {
    
//   }
// }