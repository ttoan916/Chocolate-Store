//https://www.youtube.com/watch?v=dr8Emho-kYo&t
/*
var filterNames = document.querySelectorAll(".filterName");
var productCount;

filterNames.forEach(filterName => {
    filterName.addEventListener("click", event => {
        filterName.classList.toggle("filterActive");
        var accordionItemBody = filterName.nextElementSibling;
        var filterImg = filterName.firstChild;
        if(filterName.classList.contains("filterActive")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        } else {
            accordionItemBody.style.maxHeight = 0;
        }
    
  });
});
*/

//https://www.youtube.com/watch?v=2purijiQrf4
var incrementButton = document.getElementsByClassName('increment');
var decrementButton = document.getElementsByClassName('decrement');

//increment buttons
for(var i = 0; i < incrementButton.length; i++){
    var button = incrementButton[i];
    button.addEventListener('click',function(event){
        var buttonClicked = event.target;
        //input is the 2nd child of the div quantity
        var input = buttonClicked.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) + 1;
        input.value = newValue;
    })
}
//decrement buttons
for(var i = 0; i < decrementButton.length; i++){
    var button = decrementButton[i];
    button.addEventListener('click',function(event){
        var buttonClicked = event.target;
        //input is the 2nd child of the div quantity
        var input = buttonClicked.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) - 1;
        if(newValue > 0){
            input.value = newValue;
        }else{
            input.value = 1;
        }
    })
}