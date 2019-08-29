var decl = [
    tender_category = {
        requirement_title: document.getElementById("requirement_title"),
        requirement_desc: document.getElementById("requirement_desc"),
        requirement_docfile: document.getElementById("requirement_docfile"),
        collapse_user_requirement_title: document.getElementById("collapse_user_requirement_title"),
        collapse_user_requirement_body: document.getElementById("collapse_user_requirement_body"),
        collapse_requirement_docfile: document.getElementById("collapse_requirement_docfile"),
        user_requirement_submit_btn: document.getElementById("user_requirement_submit_btn"),
        user_requirement_update_btn: document.getElementById("user_requirement_update_btn"),
        user_requirement_edit_btn: document.getElementById("user_requirement_edit_btn"),
        message_div: document.getElementById("message-div"),
    },

    mood = {
        bad_mood: "☹",
    },

    melan = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        // symbol: /[\W_]/,
        symbol: /([^\s\w])+/g,
        num: /[0-9]/g
    }
]


var implementum = [
    {
        firstLetterToCaps: function (implementumID, statusMSG) {
            implementumID.addEventListener("keyup", changeFirstLetterToUpper);
            function changeFirstLetterToUpper() {
                decl[0].requirement_title.value = decl[0].requirement_title.value.charAt(0).toUpperCase() + decl[0].requirement_title.value.slice(1).toLowerCase();
                decl[0].requirement_desc.value = decl[0].requirement_desc.value.charAt(0).toUpperCase() + decl[0].requirement_desc.value.slice(1).toLowerCase();

                if (implementumID == decl[0].requirement_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].requirement_title.value.length < 1 && decl[0].requirement_desc.value.length >= 1) {
                        decl[0].user_requirement_submit_btn.disabled = true;
                        decl[0].requirement_title.style.border = "";
                        if ((decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_desc.style.border = "2px solid red";
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_title.style.border = "";
                        } else if ((!decl[0].requirement_desc.value.match(decl[2].symbol) || !decl[0].requirement_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].requirement_title.value.length >= 1 && decl[0].requirement_desc.value.length < 1) {
                        decl[0].user_requirement_submit_btn.disabled = true;
                        decl[0].requirement_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_title.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_desc.style.border = "";
                        } else if ((!decl[0].requirement_title.value.match(decl[2].symbol) || !decl[0].requirement_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_title.style.border = "";
                        }
                    } else if (decl[0].requirement_title.value.length >= 1 && decl[0].requirement_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num)) &&
                            (decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num))) {
                            decl[0].user_requirement_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "User Requirement Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_title.style.border = "2px solid red"
                            decl[0].requirement_desc.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                        } else if ((!decl[0].requirement_title.value.match(decl[2].symbol) || !decl[0].requirement_title.value.match(decl[2].num)) &&
                            (decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num))) {
                            decl[0].user_requirement_submit_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_desc.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_title.style.border = "";
                        } else if ((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num)) &&
                            (!decl[0].requirement_desc.value.match(decl[2].symbol) || !decl[0].requirement_desc.value.match(decl[2].num))) {
                            decl[0].user_requirement_submit_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_title.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_desc.style.border = "";
                        } else if (!((decl[0].requirement_title.value.match(decl[2].symbol) && decl[0].requirement_title.value.match(decl[2].num)) &&
                            (decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].user_requirement_submit_btn.disabled = false;
                            decl[0].user_requirement_update_btn.disabled = false;
                            decl[0].requirement_title.style.border = "";
                            decl[0].requirement_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].requirement_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].requirement_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].requirement_desc.value.length < 1 && decl[0].requirement_title.value.length >= 1) {
                        decl[0].user_requirement_submit_btn.disabled = true;
                        decl[0].requirement_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_title.style.border = "2px solid red"
                            decl[0].requirement_desc.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_desc.style.border = "";
                        } else if ((!decl[0].requirement_title.value.match(decl[2].symbol) || !decl[0].requirement_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_title.style.border = ""
                        }
                    } else if (decl[0].requirement_desc.value.length >= 1 && decl[0].requirement_title.value.length < 1) {
                        decl[0].user_requirement_submit_btn.disabled = true;
                        decl[0].requirement_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_desc.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_title.style.border = "";
                        } else if ((!decl[0].requirement_desc.value.match(decl[2].symbol) || !decl[0].requirement_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_desc.style.border = "";
                        }
                    } else if (decl[0].requirement_desc.value.length >= 1 && decl[0].requirement_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num)) &&
                            (decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num))) {
                            decl[0].user_requirement_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "User Requirement Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_title.style.border = "2px solid red"
                            decl[0].requirement_desc.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                        } else if ((!decl[0].requirement_title.value.match(decl[2].symbol) || !decl[0].requirement_title.value.match(decl[2].num)) &&
                            (decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].user_requirement_submit_btn.disabled = true;
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_desc.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_title.style.border = "";
                        } else if ((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num)) &&
                            (!decl[0].requirement_desc.value.match(decl[2].symbol) || !decl[0].requirement_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].user_requirement_submit_btn.disabled = true;
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].requirement_title.style.border = "2px solid red"
                            decl[0].user_requirement_submit_btn.disabled = true;
                            decl[0].requirement_desc.style.border = "";
                        } else if (!((decl[0].requirement_title.value.match(decl[2].symbol) || decl[0].requirement_title.value.match(decl[2].num)) &&
                            (decl[0].requirement_desc.value.match(decl[2].symbol) || decl[0].requirement_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].user_requirement_submit_btn.disabled = false;
                            decl[0].requirement_title.style.border = "";
                            decl[0].requirement_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].requirement_desc.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }

                if (implementumID == decl[0].collapse_user_requirement_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].collapse_user_requirement_title.value.length < 1 && decl[0].collapse_user_requirement_body.value.length >= 1) {
                        decl[0].user_requirement_update_btn.disabled = true;
                        decl[0].collapse_user_requirement_title.style.border = "";
                        if ((decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red";
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_title.style.border = "";
                        } else if ((!decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_body.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].collapse_user_requirement_title.value.length >= 1 && decl[0].collapse_user_requirement_body.value.length < 1) {
                        decl[0].user_requirement_update_btn.disabled = true;
                        decl[0].collapse_user_requirement_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_title.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_body.style.border = "";
                        } else if ((!decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_title.style.border = "";
                        }
                    } else if (decl[0].collapse_user_requirement_title.value.length >= 1 && decl[0].collapse_user_requirement_body.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            decl[0].user_requirement_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "User Requirement Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_title.style.border = "2px solid red"
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            decl[0].user_requirement_update_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_title.style.border = "";
                        } else if ((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            decl[0].user_requirement_update_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_title.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_body.style.border = "";
                        } else if (!((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) && decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].user_requirement_update_btn.disabled = false;
                            decl[0].collapse_user_requirement_title.style.border = "";
                            decl[0].collapse_user_requirement_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_user_requirement_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].collapse_user_requirement_body) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].collapse_user_requirement_body.value.length < 1 && decl[0].collapse_user_requirement_title.value.length >= 1) {
                        decl[0].user_requirement_update_btn.disabled = true;
                        decl[0].collapse_user_requirement_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_title.style.border = "2px solid red"
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_body.style.border = "";
                        } else if ((!decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_title.style.border = ""
                        }
                    } else if (decl[0].collapse_user_requirement_body.value.length >= 1 && decl[0].collapse_user_requirement_title.value.length < 1) {
                        decl[0].user_requirement_update_btn.disabled = true;
                        decl[0].collapse_user_requirement_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_title.style.border = "";
                        } else if ((!decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_body.style.border = "";
                        }
                    } else if (decl[0].collapse_user_requirement_body.value.length >= 1 && decl[0].collapse_user_requirement_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            decl[0].user_requirement_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "User Requirement Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_title.style.border = "2px solid red"
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].user_requirement_update_btn.disabled = true;
                            var status_msg = "User Requirement Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_body.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_title.style.border = "";
                        } else if ((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || !decl[0].collapse_user_requirement_body.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].user_requirement_update_btn.disabled = true;
                            var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_user_requirement_title.style.border = "2px solid red"
                            decl[0].user_requirement_update_btn.disabled = true;
                            decl[0].collapse_user_requirement_body.style.border = "";
                        } else if (!((decl[0].collapse_user_requirement_title.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_user_requirement_body.value.match(decl[2].symbol) || decl[0].collapse_user_requirement_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].user_requirement_update_btn.disabled = false;
                            decl[0].collapse_user_requirement_title.style.border = "";
                            decl[0].collapse_user_requirement_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_user_requirement_body.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }
            }
        }
    }
]

// decl[0].user_requirement_submit_btn.disabled = true;
// decl[0].user_requirement_update_btn.disabled = true;

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].requirement_title.value.length < 1 && decl[0].requirement_desc.value.length < 1) {
            decl[0].user_requirement_submit_btn.disabled = true;
        } else if (decl[0].requirement_title.value.length < 1 && decl[0].requirement_desc.value.length >= 1) {
            decl[0].user_requirement_submit_btn.disabled = true;
        } else if (decl[0].requirement_title.value.length >= 1 && decl[0].requirement_desc.value.length < 1) {
            decl[0].user_requirement_submit_btn.disabled = true;
        } else if (decl[0].requirement_title.value.length >= 1 && decl[0].requirement_desc.value.length >= 1) {
            decl[0].user_requirement_submit_btn.disabled = false;
        }
    }
};
    

decl[0].user_requirement_edit_btn.onclick = function () {
    if (decl[0].collapse_user_requirement_title.value.length < 1 && decl[0].collapse_user_requirement_body.value.length < 1) {
        decl[0].user_requirement_update_btn.disabled = true;
    } else if (decl[0].collapse_user_requirement_title.value.length < 1 && decl[0].collapse_user_requirement_body.value.length >= 1) {
        decl[0].user_requirement_update_btn.disabled = true;
    } else if (decl[0].collapse_user_requirement_title.value.length >= 1 && decl[0].collapse_user_requirement_body.value.length < 1) {
        decl[0].user_requirement_update_btn.disabled = true;
    } else if (decl[0].collapse_user_requirement_title.value.length >= 1 && decl[0].collapse_user_requirement_body.value.length >= 1) {
        decl[0].user_requirement_update_btn.disabled = false;
    }
};

decl[0].requirement_title.onfocus = function () {
    var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].requirement_title, status_msg);
};

decl[0].requirement_desc.onfocus = function () {
    var status_msg = "User Requirement Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].requirement_desc, status_msg);
};

decl[0].requirement_title.onblur = function () {
    var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].requirement_title, status_msg);
};

decl[0].requirement_desc.onblur = function () {
    var status_msg = "User Requirement Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].requirement_desc, status_msg);
};


decl[0].collapse_user_requirement_title.onfocus = function () {
    var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_user_requirement_title, status_msg);
};

decl[0].collapse_user_requirement_body.onfocus = function () {
    var status_msg = "User Requirement Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_user_requirement_body, status_msg);
};

decl[0].collapse_user_requirement_title.onblur = function () {
    var status_msg = "User Requirement Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_user_requirement_title, status_msg);
};

decl[0].collapse_user_requirement_body.onblur = function () {
    var status_msg = "User Requirement Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_user_requirement_body, status_msg);
};