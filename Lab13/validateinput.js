function validateForm(){
    if(checkUsername() && checkEmail() && checkPhonenumber()){
        alert("Registration successful");
        return true;
    }
    else return false
}

function checkUsername(){
    var regex = new RegExp("^[a-zA-Z0-9]+$")
    var field = document.getElementById("username");

    if(field.value.length == 0) {
        alert("Username is required");
        return false;
    } else if (!regex.test(field.value)){
        alert("Invalid username");
        return false;
    } else {
        // alert("Valid username");
        return true;
    }
}

function checkEmail(){
    var regex = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");
    var field = document.getElementById("email");

    if(!regex.test(field.value)) {
        alert("Invalid email");
        return false;
    } else {
        // alert("Valid email");
        return true;
    }
}

function checkPhonenumber() {
    var regex = new RegExp("^[0-9\-\(\)\/\+\s]*$");
    var field = document.getElementById("telephone");

    if(!regex.test(field.value)) {
        alert("Invalid phone number");
        return false;
    } else {
        // alert("Valid phone number");
        return true;
    }
}