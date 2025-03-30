let username=document.getElementById("Username").value;
let password=document.getElementById("Password").value;
let email=document.getElementById("email").value;


document.getElementById("content-form").addEventListener("submit",(e)=>{
e.preventDefault();
if(!username && !password && !email){
    alert("Veuillez remplir tous les champs");

}
else{
    alert("Inscription réussie");
    window.location.href="login.html";
}})