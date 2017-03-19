/**
 * Created by marcin on 17/03/2017.
 */
//variable that controls if form can be processed
var valid  = new Boolean(true);

    function validateInput () {
        valid=true;
        //validate id
        if(validateField("id", true)){
            var id = document.getElementById("id").value;
                if(/[a-zA-Z]+$/.test(id)){
                    document.getElementById("id").style.backgroundColor = "#99ff99";
                }
                else{
                    document.getElementById("id").style.backgroundColor = "#ff0000";
                    document.getElementById("idError").innerHTML = "ID is invalid, please make sure the id contains letters only";
                    valid=false;
                }
        };

        //validate manufacturer
        validateField("make", true);

        //validate model
        validateField("model", true);

        //validate if not empty
        if(validateField("year", true)){
            //validate year within range
            validateNumberRange(1960, 2016, "year")
        }

        //validate number of doors
        if(validateField("doors", true)){
            //validate doors within range
            validateNumberRange(1, 7, "doors")
        }

//TODO: fix that currently only accept first option
        //validate radio buttons for fuel and type of car
        if(document.getElementById('fuel').checked){
            document.getElementById("fuelError").innerHTML = "";
        }
        else{
            document.getElementById("fuelError").innerHTML = "Select Fuel type";
            document.getElementById("fuelError").style.backgroundColor = "#ff0000";
            valid=false;
        }
        if(document.getElementById('type').checked){
            document.getElementById("typeError").innerHTML = "";
        }
        else{
            document.getElementById("typeError").innerHTML = "Select Car type";
            document.getElementById("typeError").style.backgroundColor = "#ff0000";
            valid=false;
        }
//TODO: fix that
        //checks if either phone or email were entered
        //if both were not entered
        if ((!validateField("email", false))&&(!validateField("phone", false))){
            valid = false;
            document.getElementById("email").style.backgroundColor = "#ff0000";
            document.getElementById("phone").style.backgroundColor = "#ff0000";
            document.getElementById("emailError").innerHTML = "Please make enter a contact phone number or email address";
            document.getElementById("phoneError").innerHTML = "Please make enter a contact phone number or email address";
        }
        else{
            //if only email was entered
            if((validateField("email",false))&&(!validateField("phone", false))) {
                validateEmailAddress(document.getElementById("email").value);
                document.getElementById("phone").style.backgroundColor = "#99ff99";
                document.getElementById("phoneError").innerHTML = "";
            }
            //if only phone number was entered
            else if((!validateField("email", false))&&(validateField("phone", false))) {
                document.getElementById("phone").style.backgroundColor = "#99ff99";
                document.getElementById("email").style.backgroundColor = "#99ff99";
                document.getElementById("emailError").innerHTML = "";
            }
            //if both were entered
            else {
                validateEmailAddress(document.getElementById("email").value);
                document.getElementById("phone").style.backgroundColor = "#99ff99";
                document.getElementById("phoneError").innerHTML = "";
            }
        }

        return valid;
    }
//------------------------------------------------------------------------------------------
    //checks if the number entered is within the min/max range
    function validateNumberRange(min, max, id){
        if ((document.getElementById(id).value < min)||(document.getElementById(id).value > max)) {
            valid = false;
            document.getElementById(id).style.backgroundColor = "#ff0000";
            document.getElementById(id+"Error").innerHTML = "Please make sure the number is between "+min+" and "+max;
        }
        else {
            document.getElementById(id).style.backgroundColor = "#99ff99";
        }
    }

//------------------------------------------------------------------------------------------

    function validateEmailAddress (myEmailAddress) {
        var at = myEmailAddress.indexOf('@');
        var dot = myEmailAddress.indexOf('.');
        // We need to get number of '@' symbol to check if equal to 1 in our condition. Need to set to 0 if no value in myEmailAddress.
        var atCount = myEmailAddress.match(/@/g) === null || undefined? 0 : myEmailAddress.match(/@/g).length;
        // We need to get number of '.' symbol to check if equal to 1 in our condition. Need to set to 0 if no value in myEmailAddress.
        var dotCount = myEmailAddress.match(/\./g) === null || undefined? 0 : myEmailAddress.match(/\./g).length;

        if ((at > 0) && (dot > (at + 1)) && (dot !== (myEmailAddress.length - 1)) && (atCount === 1) && (dotCount === 1)) {
            document.getElementById("email").style.backgroundColor = "#99ff99";
            document.getElementById("emailError").innerHTML = "";
        }
        else {
            document.getElementById("email").style.backgroundColor = "#ff0000";
            document.getElementById("emailError").innerHTML = "Please enter correct email address";
            valid = false;
        }
    }
//------------------------------------------------------------------------------------------
    //Method takes two parameters id is the name of the field, fail is controlling paramter to
    //allow method to fail the form (vail =false)
    //checks if the input was detected in selected field if it was background
    //is changed to green if not red
    //return are used to determined if there is value to check for year, email attributes
    function validateField(id, fail) {
        var idError =id+"Error";
        if (document.getElementById(id).value == "") {
            if(fail==true){
                valid = false;
            }
            document.getElementById(id).style.backgroundColor = "#ff0000";
            document.getElementById(idError).innerHTML = "Please enter "+id;
            return false;
        }
        else {
            document.getElementById(id).style.backgroundColor = "#99ff99";
            document.getElementById(idError).innerHTML = "";
            return true;
        }
    }
//------------------------------------------------------------------------------------------
    //allows to enter letters only for ID field, numbers only for doors,
    //numbers and + only for phone number
    function validateForLettersOrNumbersOnly(evt, range) {
        var theEvent = evt || window.event;
        var token = theEvent.keyCode || theEvent.which;
        token = String.fromCharCode( token );
        if( !range.test(token) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

