var data=1;
document.getElementById("root").value=data;
function decrement() {
    if (data > 1) data=data-1;
    document.getElementById("root").value=data;
}
function increment() {
    data=data+1;
    document.getElementById("root").value=data;
}
console.log("js");