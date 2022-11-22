// Update & delete model variables
const updateTitle = document.getElementById("newTitle");
const updateAuthor = document.getElementById("newAuthor");
const updateQuantity = document.getElementById("newQuantite");
const updateCategory = document.getElementById("newCategory");
const updateIsbn = document.getElementById("newIsbn");
const updateDatePub = document.getElementById("newPubDate");
const bookId = document.getElementById("bookId");

// initializeBook function fills the update book model inputs
function initializeBook(index) {
  let dataInfo = document.getElementById(index).getAttribute("data-info");
  let arr = dataInfo.split(",");
  updateTitle.value = arr[0];
  updateAuthor.value = arr[1];
  updateCategory.value = arr[2];
  updateQuantity.value = arr[3];
  updateIsbn.value = arr[4];
  updateDatePub.value = arr[5];
  bookId.value = index;
}

// resetBookForm Function resets the forms inputs
function resetBookForm() {
  document.getElementById("form-book").reset();
}
// wrapside function to control the show & hide of sidebar
function wrapside() {
  let side = document.querySelector("#wrapper");
  side.classList.toggle("toggled");
}
