var decl = [
    tender_category = {
        story_title: document.getElementById("story_title"),
        story_body: document.getElementById("story_body"),
        story_photo: document.getElementById("story_photo"),
        collapse_story_title: document.getElementById("collapse_story_title"),
        collapse_story_desc: document.getElementById("collapse_story_desc"),
        collapse_story_photo: document.getElementById("collapse_story_photo"),
        public_story_submit_btn: document.getElementById("public_story_submit_btn"),
        public_story_update_btn: document.getElementById("public_story_update_btn"),
        public_story_edit_btn: document.getElementById("public_story_edit_btn"),
        message_div: document.getElementById("message-div"),
    },

    mood = {
        bad_mood: "☹",
    },

    melan = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        // symbol: /[\W_]/,
        // symbol: /([^\s\w])+/g,
        symbol: /([^\s\w\&\.\,])+/g,
        num: /[0-9]/g
    }
]


var implementum = [
    {
        firstLetterToCaps: function (implementumID, statusMSG) {
            implementumID.addEventListener("keyup", changeFirstLetterToUpper);
            function changeFirstLetterToUpper() {
                decl[0].story_title.value = decl[0].story_title.value.charAt(0).toUpperCase() + decl[0].story_title.value.slice(1).toLowerCase();
                decl[0].story_body.value = decl[0].story_body.value.charAt(0).toUpperCase() + decl[0].story_body.value.slice(1).toLowerCase();

                if (implementumID == decl[0].story_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length >= 1 && decl[0].story_photo.files.length < 0) {
                        decl[0].public_story_submit_btn.disabled = true;

                        decl[0].story_title.style.border = "";
                        if ((decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_body.style.border = "2px solid red";
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_title.style.border = "";
                        } else if ((!decl[0].story_body.value.match(decl[2].symbol) || !decl[0].story_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_body.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length < 1) {
                        decl[0].public_story_submit_btn.disabled = true;

                        decl[0].story_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_title.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;

                            decl[0].story_body.style.border = "";
                        } else if ((!decl[0].story_title.value.match(decl[2].symbol) || !decl[0].story_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_title.style.border = "";
                        }
                    } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num)) &&
                            (decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num))) {
                            decl[0].public_story_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Public Story Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_title.style.border = "2px solid red"
                            decl[0].story_body.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                        } else if ((!decl[0].story_title.value.match(decl[2].symbol) || !decl[0].story_title.value.match(decl[2].num)) &&
                            (decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num))) {
                            decl[0].public_story_submit_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_body.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_title.style.border = "";
                        } else if ((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num)) &&
                            (!decl[0].story_body.value.match(decl[2].symbol) || !decl[0].story_body.value.match(decl[2].num))) {
                            decl[0].public_story_submit_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_title.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_body.style.border = "";
                        } else if (!((decl[0].story_title.value.match(decl[2].symbol) && decl[0].story_title.value.match(decl[2].num)) &&
                            (decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].public_story_submit_btn.disabled = false;
                            decl[0].story_title.style.border = "";
                            decl[0].story_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].story_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].story_body) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].story_body.value.length < 1 && decl[0].story_title.value.length >= 1) {
                        decl[0].public_story_submit_btn.disabled = true;
                        decl[0].story_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_title.style.border = "2px solid red"
                            decl[0].story_body.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_body.style.border = "";
                        } else if ((!decl[0].story_title.value.match(decl[2].symbol) || !decl[0].story_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_title.style.border = ""
                        }
                    } else if (decl[0].story_body.value.length >= 1 && decl[0].story_title.value.length < 1) {
                        decl[0].public_story_submit_btn.disabled = true;
                        decl[0].story_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_body.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_title.style.border = "";
                        } else if ((!decl[0].story_body.value.match(decl[2].symbol) || !decl[0].story_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_body.style.border = "";
                        }
                    } else if (decl[0].story_body.value.length >= 1 && decl[0].story_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num)) &&
                            (decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num))) {
                            decl[0].public_story_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Public Story Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_title.style.border = "2px solid red"
                            decl[0].story_body.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                        } else if ((!decl[0].story_title.value.match(decl[2].symbol) || !decl[0].story_title.value.match(decl[2].num)) &&
                            (decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].public_story_submit_btn.disabled = true;
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_body.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_title.style.border = "";
                        } else if ((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num)) &&
                            (!decl[0].story_body.value.match(decl[2].symbol) || !decl[0].story_body.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].public_story_submit_btn.disabled = true;
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].story_title.style.border = "2px solid red"
                            decl[0].public_story_submit_btn.disabled = true;
                            decl[0].story_body.style.border = "";
                        } else if (!((decl[0].story_title.value.match(decl[2].symbol) || decl[0].story_title.value.match(decl[2].num)) &&
                            (decl[0].story_body.value.match(decl[2].symbol) || decl[0].story_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].public_story_submit_btn.disabled = false;
                            decl[0].story_title.style.border = "";
                            decl[0].story_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].story_body.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }

                if (implementumID == decl[0].collapse_story_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length >= 1 && decl[0].story_photo.files.length < 0) {
                        decl[0].public_story_update_btn.disabled = true
                        decl[0].collapse_story_title.style.border = "";
                        if ((decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_desc.style.border = "2px solid red";
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_title.style.border = "";
                        } else if ((!decl[0].collapse_story_desc.value.match(decl[2].symbol) || !decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length < 1) {
                        decl[0].public_story_update_btn.disabled = true
                        decl[0].collapse_story_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_title.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_desc.style.border = "";
                        } else if ((!decl[0].collapse_story_title.value.match(decl[2].symbol) || !decl[0].collapse_story_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_title.style.border = "";
                        }
                    } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            decl[0].public_story_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Public Story Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_title.style.border = "2px solid red"
                            decl[0].collapse_story_desc.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_story_title.value.match(decl[2].symbol) || !decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            decl[0].public_story_update_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_desc.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_title.style.border = "";
                        } else if ((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_story_desc.value.match(decl[2].symbol) || !decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            decl[0].public_story_update_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_title.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_desc.style.border = "";
                        } else if (!((decl[0].collapse_story_title.value.match(decl[2].symbol) && decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].public_story_update_btn.disabled = false;
                            decl[0].collapse_story_title.style.border = "";
                            decl[0].collapse_story_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_story_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].collapse_story_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].collapse_story_desc.value.length < 1 && decl[0].collapse_story_title.value.length >= 1) {
                        decl[0].public_story_update_btn.disabled = true
                        decl[0].collapse_story_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_title.style.border = "2px solid red"
                            decl[0].collapse_story_desc.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_desc.style.border = "";
                        } else if ((!decl[0].collapse_story_title.value.match(decl[2].symbol) || !decl[0].collapse_story_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_title.style.border = ""
                        }
                    } else if (decl[0].collapse_story_desc.value.length >= 1 && decl[0].collapse_story_title.value.length < 1) {
                        decl[0].public_story_update_btn.disabled = true
                        decl[0].collapse_story_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_desc.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_title.style.border = "";
                        } else if ((!decl[0].collapse_story_desc.value.match(decl[2].symbol) || !decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_desc.style.border = "";
                        }
                    } else if (decl[0].collapse_story_desc.value.length >= 1 && decl[0].collapse_story_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            decl[0].public_story_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Public Story Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_title.style.border = "2px solid red"
                            decl[0].collapse_story_desc.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_story_title.value.match(decl[2].symbol) || !decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].public_story_update_btn.disabled = true;
                            var status_msg = "Public Story Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_desc.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_title.style.border = "";
                        } else if ((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_story_desc.value.match(decl[2].symbol) || !decl[0].collapse_story_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].public_story_update_btn.disabled = true;
                            var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_story_title.style.border = "2px solid red"
                            decl[0].public_story_update_btn.disabled = true;
                            decl[0].collapse_story_desc.style.border = "";
                        } else if (!((decl[0].collapse_story_title.value.match(decl[2].symbol) || decl[0].collapse_story_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_story_desc.value.match(decl[2].symbol) || decl[0].collapse_story_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].public_story_update_btn.disabled = false;
                            decl[0].collapse_story_title.style.border = "";
                            decl[0].collapse_story_desc.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_story_desc.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }
            }
        }
    }
]

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length < 1) {
            decl[0].public_story_submit_btn.disabled = true;
        } else if (decl[0].story_title.value.length < 1 && decl[0].story_body.value.length >= 1) {
            decl[0].public_story_submit_btn.disabled = true;
        } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length < 1) {
            decl[0].public_story_submit_btn.disabled = true;
        } else if (decl[0].story_title.value.length >= 1 && decl[0].story_body.value.length >= 1) {
            decl[0].public_story_submit_btn.disabled = false;
        }
    }
};


decl[0].public_story_edit_btn.onclick = function () {
    if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length < 1) {
        decl[0].public_story_update_btn.disabled = true;
    } else if (decl[0].collapse_story_title.value.length < 1 && decl[0].collapse_story_desc.value.length >= 1) {
        decl[0].public_story_update_btn.disabled = true;
    } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length < 1) {
        decl[0].public_story_update_btn.disabled = true;
    } else if (decl[0].collapse_story_title.value.length >= 1 && decl[0].collapse_story_desc.value.length >= 1) {
        decl[0].public_story_update_btn.disabled = false;
    }
};

decl[0].story_title.onfocus = function () {
    var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].story_title, status_msg);
};

decl[0].story_body.onfocus = function () {
    var status_msg = "Public Story Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].story_body, status_msg);
};

decl[0].story_title.onblur = function () {
    var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].story_title, status_msg);
};

decl[0].story_body.onblur = function () {
    var status_msg = "Public Story Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].story_body, status_msg);
};


decl[0].collapse_story_title.onfocus = function () {
    var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_story_title, status_msg);
};

decl[0].collapse_story_desc.onfocus = function () {
    var status_msg = "Public Story Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_story_desc, status_msg);
};

decl[0].collapse_story_title.onblur = function () {
    var status_msg = "Public Story Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_story_title, status_msg);
};

decl[0].collapse_story_desc.onblur = function () {
    var status_msg = "Public Story Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_story_desc, status_msg);
};