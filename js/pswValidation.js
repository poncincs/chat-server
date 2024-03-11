var pswSignup = document.getElementById("psw-signup");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

var pswRepeat = document.getElementById("psw-repeat");
var same = document.getElementById("same");
var notSame = document.getElementById("not-same");
// When the user clicks on the password field, show the psw-contain box
pswSignup.onfocus = function() {
  document.getElementById("psw-contain").style.display = "block";
}

// When the user clicks outside of the password field, hide the psw-contain box
pswSignup.onblur = function() {
  document.getElementById("psw-contain").style.display = "none";
}

// When the user starts to type something inside the password field
pswSignup.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(pswSignup.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(pswSignup.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(pswSignup.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(pswSignup.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

// When the user clicks on the repeat password field, show the psw-same box
pswRepeat.onfocus = function() {
  document.getElementById("psw-same").style.display = "block";
}

// When the user clicks outside of the repeat password field, hide the psw-same box
pswRepeat.onblur = function() {
  document.getElementById("psw-same").style.display = "none";
}

// When the user starts to type something inside the repeat password field
pswRepeat.onkeyup = function() {
  if(pswRepeat.value === pswSignup.value) {
    same.style.display = "block";
    notSame.style.display = "none";
  } else {
    same.style.display = "none";
    notSame.style.display = "block";
  }
}