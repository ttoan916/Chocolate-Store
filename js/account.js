//view and remove view of password
function togglePassword(eyeId, inputId){
  var eye = document.getElementById(eyeId);
  var pass = document.getElementById(inputId)
  if(eye.getAttribute('src') == "../icons/eye-slash-solid.svg"){
      eye.src = "../icons/eye-solid.svg";
      if(pass.getAttribute('type') == "password"){
          pass.setAttribute("type","text") ;
      }
  }else{
      eye.src = "../icons/eye-slash-solid.svg";
      pass.setAttribute("type","password") ;
  }
}


