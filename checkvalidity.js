function validation()
{
var pass = document.getElementById("pass").value;
if ((pass.length < 4) || (pass.length > 8))
{
alert("Your Password must be 4 to 8 Character");
return false;
}
}
