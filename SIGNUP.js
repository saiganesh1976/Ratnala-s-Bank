function validateForm() {
  let x = document.getElementById("email").value;
  let y = document.getElementById("fname").value;
  let z = document.getElementById("lname").value;
  let q = document.getElementById("pwd").value;
  let r = document.getElementById("PNO").value;
  if (x == "" && y == "" && z == "" && q == "" && r == "") {
    alert("Fill all the Entries");
    return false;
  } else {
    alert(" Account created Successfully");
  }
}
