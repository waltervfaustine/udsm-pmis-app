decl[0].confirm_oasscode_id.style.border = "";
if (decl[0].confirm_oasscode_id.value.length <= 0) {
    console.log("CONFIRM PASSWORD is EMPTY");
    if (decl[0].passcode_id.value.length == 0) {
        decl[0].passcode_id.style.border = "";
        decl[0].confirm_oasscode_id.style.border = "";
    }
    decl[0].passcode_id.style.border = "";
    decl[0].confirm_oasscode_id.style.border = "";
}

if (decl[0].passcode_id.value.length == 0) {
    decl[0].public_news_alert.style.display = "block";
    decl[0].public_news_alert.innerHTML = "Please fill the first password field first";
    decl[0].passcode_id.style.border = "2px solid red";
} else if (decl[0].passcode_id.value.length < 8) {
    decl[0].public_news_alert.style.display = "block";
    decl[0].public_news_alert.innerHTML = "Password Length must be atleast 8 characters";
    decl[0].passcode_id.style.border = "2px solid red";
} else if (decl[0].passcode_id.value.length >= 8) {
    if (decl[0].passcode_id.value === decl[0].confirm_oasscode_id.value) {
        console.log("Password Matched");
        decl[0].confirm_oasscode_id.style.border = "";
        decl[0].public_news_alert.style.display = "none";
    } else if (decl[0].passcode_id.value !== decl[0].confirm_oasscode_id.value) {
        decl[0].confirm_oasscode_id.style.border = "2px solid red";
        decl[0].public_news_alert.style.display = "block";
        decl[0].public_news_alert.innerHTML = "Password does not match";
        console.log("Password does not Matched");
    } else {
        decl[0].passcode_id.style.border = "";
        decl[0].confirm_oasscode_id.style.border = "";
    }
} else if (decl[0].passcode_id.value.length == 0 && decl[0].confirm_oasscode_id.value.length == 0) {
    decl[0].passcode_id.style.border = "";
    decl[0].confirm_oasscode_id.style.border = "";
} else if (decl[0].passcode_id.value.length >= 1 && decl[0].confirm_oasscode_id.value.length == 0) {
    decl[0].passcode_id.style.border = "";
    decl[0].confirm_oasscode_id.style.border = "";
} else {
    decl[0].passcode_id.style.border = "";
    decl[0].confirm_oasscode_id.style.border = "";
}
console.log("Confirm Password is selected");