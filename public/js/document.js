var decl = [
    tender_category = {
        document_title: document.getElementById("document_title"),
        document_desc: document.getElementById("document_desc"),
        document_file: document.getElementById("document_file"),
        collapse_document_title: document.getElementById("collapse_document_title"),
        collapse_document_desc: document.getElementById("collapse_document_desc"),
        collapse_document_file: document.getElementById("collapse_document_file"),
        requirement_document_submit_btn: document.getElementById("requirement_document_submit_btn"),
        requirement_document_update_btn: document.getElementById("requirement_document_update_btn"),
        requirement_document_edit_btn: document.getElementById("requirement_document_edit_btn"),
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
                decl[0].document_title.value = decl[0].document_title.value.charAt(0).toUpperCase() + decl[0].document_title.value.slice(1).toLowerCase();
                decl[0].document_desc.value = decl[0].document_desc.value.charAt(0).toUpperCase() + decl[0].document_desc.value.slice(1).toLowerCase();

                if (implementumID == decl[0].document_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].document_title.value.length < 1 && decl[0].document_desc.value.length >= 1 && decl[0].document_file.files.length < 0) {
                        decl[0].requirement_document_submit_btn.disabled = true;

                        decl[0].document_title.style.border = "";
                        if ((decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_desc.style.border = "2px solid red";
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_title.style.border = "";
                        } else if ((!decl[0].document_desc.value.match(decl[2].symbol) || !decl[0].document_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].document_title.value.length >= 1 && decl[0].document_desc.value.length < 1) {
                        decl[0].requirement_document_submit_btn.disabled = true;

                        decl[0].document_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_title.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;

                            decl[0].document_desc.style.border = "";
                        } else if ((!decl[0].document_title.value.match(decl[2].symbol) || !decl[0].document_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_title.style.border = "";
                        }
                    } else if (decl[0].document_title.value.length >= 1 && decl[0].document_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num)) &&
                            (decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_title.style.border = "2px solid red"
                            decl[0].document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                        } else if ((!decl[0].document_title.value.match(decl[2].symbol) || !decl[0].document_title.value.match(decl[2].num)) &&
                            (decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_submit_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_title.style.border = "";
                        } else if ((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num)) &&
                            (!decl[0].document_desc.value.match(decl[2].symbol) || !decl[0].document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_submit_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_title.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_desc.style.border = "";
                        } else if (!((decl[0].document_title.value.match(decl[2].symbol) && decl[0].document_title.value.match(decl[2].num)) &&
                            (decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].requirement_document_submit_btn.disabled = false;
                            decl[0].document_title.style.border = "";
                            decl[0].document_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].document_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].document_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].document_desc.value.length < 1 && decl[0].document_title.value.length >= 1) {
                        decl[0].requirement_document_submit_btn.disabled = true;
                        decl[0].document_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_title.style.border = "2px solid red"
                            decl[0].document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_desc.style.border = "";
                        } else if ((!decl[0].document_title.value.match(decl[2].symbol) || !decl[0].document_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_title.style.border = ""
                        }
                    } else if (decl[0].document_desc.value.length >= 1 && decl[0].document_title.value.length < 1) {
                        decl[0].requirement_document_submit_btn.disabled = true;
                        decl[0].document_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_title.style.border = "";
                        } else if ((!decl[0].document_desc.value.match(decl[2].symbol) || !decl[0].document_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_desc.style.border = "";
                        }
                    } else if (decl[0].document_desc.value.length >= 1 && decl[0].document_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num)) &&
                            (decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_title.style.border = "2px solid red"
                            decl[0].document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                        } else if ((!decl[0].document_title.value.match(decl[2].symbol) || !decl[0].document_title.value.match(decl[2].num)) &&
                            (decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].requirement_document_submit_btn.disabled = true;
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_title.style.border = "";
                        } else if ((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num)) &&
                            (!decl[0].document_desc.value.match(decl[2].symbol) || !decl[0].document_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].requirement_document_submit_btn.disabled = true;
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].document_title.style.border = "2px solid red"
                            decl[0].requirement_document_submit_btn.disabled = true;
                            decl[0].document_desc.style.border = "";
                        } else if (!((decl[0].document_title.value.match(decl[2].symbol) || decl[0].document_title.value.match(decl[2].num)) &&
                            (decl[0].document_desc.value.match(decl[2].symbol) || decl[0].document_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].requirement_document_submit_btn.disabled = false;
                            decl[0].document_title.style.border = "";
                            decl[0].document_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].document_desc.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }

                if (implementumID == decl[0].collapse_document_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].collapse_document_title.value.length < 1 && decl[0].collapse_document_desc.value.length >= 1 && decl[0].document_file.files.length < 0) {
                        decl[0].requirement_document_update_btn.disabled = true
                        decl[0].collapse_document_title.style.border = "";
                        if ((decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_desc.style.border = "2px solid red";
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_title.style.border = "";
                        } else if ((!decl[0].collapse_document_desc.value.match(decl[2].symbol) || !decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].collapse_document_title.value.length >= 1 && decl[0].collapse_document_desc.value.length < 1) {
                        decl[0].requirement_document_update_btn.disabled = true
                        decl[0].collapse_document_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_title.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_desc.style.border = "";
                        } else if ((!decl[0].collapse_document_title.value.match(decl[2].symbol) || !decl[0].collapse_document_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_title.style.border = "";
                        }
                    } else if (decl[0].collapse_document_title.value.length >= 1 && decl[0].collapse_document_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_title.style.border = "2px solid red"
                            decl[0].collapse_document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_document_title.value.match(decl[2].symbol) || !decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_update_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_title.style.border = "";
                        } else if ((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_document_desc.value.match(decl[2].symbol) || !decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_update_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_title.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_desc.style.border = "";
                        } else if (!((decl[0].collapse_document_title.value.match(decl[2].symbol) && decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].requirement_document_update_btn.disabled = false;
                            decl[0].collapse_document_title.style.border = "";
                            decl[0].collapse_document_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_document_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].collapse_document_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].collapse_document_desc.value.length < 1 && decl[0].collapse_document_title.value.length >= 1) {
                        decl[0].requirement_document_update_btn.disabled = true
                        decl[0].collapse_document_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_title.style.border = "2px solid red"
                            decl[0].collapse_document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_desc.style.border = "";
                        } else if ((!decl[0].collapse_document_title.value.match(decl[2].symbol) || !decl[0].collapse_document_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_title.style.border = ""
                        }
                    } else if (decl[0].collapse_document_desc.value.length >= 1 && decl[0].collapse_document_title.value.length < 1) {
                        decl[0].requirement_document_update_btn.disabled = true
                        decl[0].collapse_document_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_title.style.border = "";
                        } else if ((!decl[0].collapse_document_desc.value.match(decl[2].symbol) || !decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_desc.style.border = "";
                        }
                    } else if (decl[0].collapse_document_desc.value.length >= 1 && decl[0].collapse_document_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            decl[0].requirement_document_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Tender Category Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_title.style.border = "2px solid red"
                            decl[0].collapse_document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_document_title.value.match(decl[2].symbol) || !decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].requirement_document_update_btn.disabled = true;
                            var status_msg = "Tender Category Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_desc.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_title.style.border = "";
                        } else if ((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_document_desc.value.match(decl[2].symbol) || !decl[0].collapse_document_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].requirement_document_update_btn.disabled = true;
                            var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_document_title.style.border = "2px solid red"
                            decl[0].requirement_document_update_btn.disabled = true;
                            decl[0].collapse_document_desc.style.border = "";
                        } else if (!((decl[0].collapse_document_title.value.match(decl[2].symbol) || decl[0].collapse_document_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_document_desc.value.match(decl[2].symbol) || decl[0].collapse_document_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].requirement_document_update_btn.disabled = false;
                            decl[0].collapse_document_title.style.border = "";
                            decl[0].collapse_document_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_document_desc.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }
            }
        }
    }
]

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].document_title.value.length < 1 && decl[0].document_desc.value.length < 1) {
            decl[0].requirement_document_submit_btn.disabled = true;
        } else if (decl[0].document_title.value.length < 1 && decl[0].document_desc.value.length >= 1) {
            decl[0].requirement_document_submit_btn.disabled = true;
        } else if (decl[0].document_title.value.length >= 1 && decl[0].document_desc.value.length < 1) {
            decl[0].requirement_document_submit_btn.disabled = true;
        } else if (decl[0].document_title.value.length >= 1 && decl[0].document_desc.value.length >= 1) {
            decl[0].requirement_document_submit_btn.disabled = false;
        }
    }
};


decl[0].requirement_document_edit_btn.onclick = function () {
    if (decl[0].collapse_document_title.value.length < 1 && decl[0].collapse_document_desc.value.length < 1) {
        decl[0].requirement_document_update_btn.disabled = true;
    } else if (decl[0].collapse_document_title.value.length < 1 && decl[0].collapse_document_desc.value.length >= 1) {
        decl[0].requirement_document_update_btn.disabled = true;
    } else if (decl[0].collapse_document_title.value.length >= 1 && decl[0].collapse_document_desc.value.length < 1) {
        decl[0].requirement_document_update_btn.disabled = true;
    } else if (decl[0].collapse_document_title.value.length >= 1 && decl[0].collapse_document_desc.value.length >= 1) {
        decl[0].requirement_document_update_btn.disabled = false;
    }
};

decl[0].document_title.onfocus = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].document_title, status_msg);
};

decl[0].document_desc.onfocus = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].document_desc, status_msg);
};

decl[0].document_title.onblur = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].document_title, status_msg);
};

decl[0].document_desc.onblur = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].document_desc, status_msg);
};


decl[0].collapse_document_title.onfocus = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_document_title, status_msg);
};

decl[0].collapse_document_desc.onfocus = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_document_desc, status_msg);
};

decl[0].collapse_document_title.onblur = function () {
    var status_msg = "Tender Category Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_document_title, status_msg);
};

decl[0].collapse_document_desc.onblur = function () {
    var status_msg = "Tender Category Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_document_desc, status_msg);
};