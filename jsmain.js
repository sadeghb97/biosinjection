function isSecureString(str){
    if(str.includes("<") ||
            str.includes(">") ||
            str.toUpperCase().includes("INSERT") ||
            str.toUpperCase().includes("SELECT") ||
            str.toUpperCase().includes("UPDATE") ||
            str.toUpperCase().includes("DELETE")){
        
        return false;
    }
    return true;
}

function validateEmail(email) {
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    return email.match(pattern); 
}

