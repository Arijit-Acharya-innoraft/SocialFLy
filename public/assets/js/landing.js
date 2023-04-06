function storeLocalFunction() {
  if (localStorage.getItem("hasCodeRunBefore") === null) {
    let popUp = document.getElementById("cover_page");
    popUp.classList.add("landing-active");
    document.body.style.overflowY = "hidden";
    localStorage.setItem("hasCodeRunBefore", true);
  }
}

function removeFunction() {
  let popUp = document.getElementById("cover_page");
  popUp.classList.remove("landing-active");
  document.body.style.overflowY = "scroll";

}

function emptyLocalStore() {
  localStorage.removeItem("hasCodeRunBefore");
}
