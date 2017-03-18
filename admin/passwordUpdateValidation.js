/**
 * Created by marcin on 18/03/2017.
 */
function validateNewPassword(){
    if((document.getElementById("pass1").value)===(document.getElementById("pass2").value)){
        return true;
    }
    else{
        document.getElementById("passError").innerHTML = "Password does't match the password above";
        return false;
    }
}