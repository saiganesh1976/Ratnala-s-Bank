function validateForm() {
  let x = document.getElementById("email").value;
  let y = document.getElementById("pwd").value;
  if (x == "" && y == "") {
    alert("Fill all the Entries");
    return false;
  } else {
    alert("Successfully Created");
  }
}
