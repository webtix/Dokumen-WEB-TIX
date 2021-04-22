function ShowPassword() {
  var x = document.getElementById("InputPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}