function validateForm() {
    // Get the username and password input values
    var username = document.forms["membershipForm"]["username"].value;
    var password = document.forms["membershipForm"]["password"].value;
    
    // Validate username
    if (username == "") {
        alert("Username must be filled out");
        return false;
    }
    
    // Validate password
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    
    // Return true if both username and password are valid
    return true;
}
