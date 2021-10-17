function modalOpen(elem) {
    elem.nextElementSibling.style.display = "block";
}

function modalClose(elem) {
    elem.parentElement.parentElement.style.display = "none";
}