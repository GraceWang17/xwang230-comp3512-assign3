
window.onload = function(){
    changeInputBackground();
    $("#registerForm").submit(function(e){
        //checkEmptyFields(e);
        checkEmailPattern(e);
        //passwordMatch(e);
        //accessDatabase();
    });
};

/*
*change input background when it is blur or focus
*/
function changeInputBackground(){
    var cssSelector = "input[type=text], input[type=password]";
    var fields = document.querySelectorAll(cssSelector);
    //alert(fields.length);
    for (var i = 0; i<fields.length; i++) {
        fields[i].addEventListener("focus", setBackground);
        fields[i].addEventListener("blur", setBackground);
    }
}

 function setBackground(e){
     if (e.type == "focus") {
        e.target.style.backgroundColor = "#FFE393";
    } else if (e.type == "blur") {
        e.target.style.backgroundColor = "white";
    }
 }
 
 /*
 *  check if any required fields is empty
 */
 function checkEmptyFields(e){
    //alert(111);
    var errorArea = document.getElementById("errors");
    errorArea.className ="hidden";
    var cssSelector = "form input[class=userRegi],input[class=pwdLog],input[class=email]";
    var fields = document.querySelectorAll(cssSelector);
    //alert(fields.length);
    var fieldList=[];
    for(var i=0;i<fields.length;i++){
        if(fields[i].value == null || fields[i].value == ""){
            e.preventDefault();
            fieldList.push(fields[i]);
        }
    }
    var msg = "The following fields can't be empty: ";
    if(fieldList.length>0){
        for(var i=0;i<fieldList.length;i++){
            msg += fieldList[i].name +"  ";
            fieldList[i].style.borderColor = "red";
			fieldList[i].style.backgroundColor = "pink";
        }
        errorArea.innerHTML ="<p><b>"+msg+"</b></p>";
        errorArea.className = "visible";
    }
}
 
function checkEmailPattern(e){
   /* var errorArea = document.getElementById("errors");
    errorArea.className ="hidden";*/
     var email = $('.email').val();
     alert(email);
    if (email != null && email !=""){
        alert(email);
        var pattern= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!email.match(pattern)){
             //e.preventDefault();
             alert(email);
             e.preventDefault();
             $('.email').style.borderColor = "red";
			 $('.email').style.backgroundColor = "pink";
			 alert("error");
			 /*errorArea.innerHTML ="<p><b>Your Email is not valid</b></p>";
             errorArea.className = "visible";*/
    }
}
}

function passwordMatch(e){
    var password1 = document.forms.registerForm.pw.value;
    var password2 = document.forms.registerForm.pw1.value;
    var errorArea = document.getElementById("errors");
    errorArea.className ="hidden";
    if(password1!==null && password2!=null){
        if(password1!=password2){
        //e.preventDefault();
        errorArea.innerHTML ="<p><b>Your password does not matchs!</b></p>";
        errorArea.className = "visible"; 
        }
    }
}

function accessDatabase(){
    var username = document.forms.registerForm.email.value;
    var firstname = document.forms.registerForm.fname.value;
    var lastname = document.forms.registerForm.lname.value;
    var password = document.forms.registerForm.pw.value;
    var address = document.forms.registerForm.address.value;
    var city = document.forms.registerForm.city.value;
    var region = document.forms.registerForm.region.value;
    var country = document.forms.registerForm.country.value;
    var postcode = document.forms.registerForm.postcode.value;
    var phone = document.forms.registerForm.phone.value;
    
    if(document.getElementById("errors").className == "visible"){
        $.post("/includes/service_reg.php",{email: username, fname: firstname, lname:lastname,
                                            pw:password, address: address, city:city, region:region,
                                            country:country, postcode:postcode, phone:phone}, 
        (data) =>{
         if(data.status) window.location.href = "/login";
         else alert("error");
     }); 
}
}