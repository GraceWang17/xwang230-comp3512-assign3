
function setBackground(e) {
    if (e.type == "focus") {
        e.target.style.backgroundColor = "#FFE393";
    } else if (e.type == "blur") {
        e.target.style.backgroundColor = "white";
    }
}

window.addEventListener("load", function() {
    var cssSelector = "input[type=text], input[type=password]";
    var fields = document.querySelectorAll(cssSelector);
    for (var i = 0; i<fields.length; i++) {
        fields[i].addEventListener("focus", setBackground);
        fields[i].addEventListener("blur", setBackground);
    }
    document.getElementById("loginForm").addEventListener("submit", checkForEmptyFields);
    /*document.getElementById("loginbutton").addEventListener("click", checkForEmptyFields);*/
    
});

function checkForEmptyFields(e){
    
    var errorArea = document.getElementById("errors");
    errorArea.className ="hidden";
    var cssSelector = "form input[name=username], form input[name=password]";
    var fields = document.querySelectorAll(cssSelector);
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

