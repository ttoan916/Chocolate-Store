/*
var accordionHeaders = document.querySelectorAll(".accordionHeader");

accordionHeaders.forEach(accordionHeader => {
    accordionHeader.addEventListener("click", event => {
        accordionHeader.classList.toggle("filterActive");
        var accordionItemBody = accordionHeader.nextElementSibling;
        var filterImg = accordionHeader.firstChild;
        if(accordionHeader.classList.contains("filterActive")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        } else {
            accordionItemBody.style.maxHeight = 0;
        }
    
  });
});

*/