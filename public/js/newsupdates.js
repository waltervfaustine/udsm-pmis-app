var decl = [
    tender_category = {
        news_title: document.getElementById("news_title"),
        news_body: document.getElementById("news_body"),
        collapse_news_title: document.getElementById("collapse_news_title"),
        collapse_news_body: document.getElementById("collapse_news_body"),
        news_update_submit_btn: document.getElementById("news_update_submit_btn"),
        news_update_edit_btn: document.getElementById("news_update_edit_btn"),
        news_update_update_btn: document.getElementById("news_update_update_btn"),
        message_div: document.getElementById("message-div"),
    },

    mood = {
        bad_mood: "poor ☹",
    },

    melan = {
        lower: /[a-z]/g,
        upper: /[A-Z]/g,
        // symbol: /[\W_]/,
        // symbol: /([^\s\w])+/g,
        symbol: /([^\s\w\&\.\,\?\!\;\:])+/g,
        num: /[0-9]/g
    }
]


var implementum = [
    {
        firstLetterToCaps: function (implementumID, statusMSG) {
            implementumID.addEventListener("keyup", changeFirstLetterToUpper);
            function changeFirstLetterToUpper() {
                decl[0].news_title.value = decl[0].news_title.value.charAt(0).toUpperCase() + decl[0].news_title.value.slice(1).toLowerCase();
                decl[0].news_body.value = decl[0].news_body.value.charAt(0).toUpperCase() + decl[0].news_body.value.slice(1).toLowerCase();

                if (implementumID == decl[0].news_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].news_title.value.length < 1 && decl[0].news_body.value.length >= 1) {
                        decl[0].news_update_submit_btn.disabled = true;
                        decl[0].news_title.style.border = "";
                        if ((decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_body.style.border = "2px solid red";
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_title.style.border = "";
                        } else if ((!decl[0].news_body.value.match(decl[2].symbol) || !decl[0].news_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_body.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].news_title.value.length >= 1 && decl[0].news_body.value.length < 1) {
                        decl[0].news_update_submit_btn.disabled = true;
                        decl[0].news_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_title.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_body.style.border = "";
                        } else if ((!decl[0].news_title.value.match(decl[2].symbol) || !decl[0].news_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_title.style.border = "";
                        }
                    } else if (decl[0].news_title.value.length >= 1 && decl[0].news_body.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num)) &&
                            (decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num))) {
                            decl[0].news_update_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "News Updates Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_title.style.border = "2px solid red"
                            decl[0].news_body.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                        } else if ((!decl[0].news_title.value.match(decl[2].symbol) || !decl[0].news_title.value.match(decl[2].num)) &&
                            (decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num))) {
                            decl[0].news_update_submit_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_body.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_title.style.border = "";
                        } else if ((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num)) &&
                            (!decl[0].news_body.value.match(decl[2].symbol) || !decl[0].news_body.value.match(decl[2].num))) {
                            decl[0].news_update_submit_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_title.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_body.style.border = "";
                        } else if (!((decl[0].news_title.value.match(decl[2].symbol) && decl[0].news_title.value.match(decl[2].num)) &&
                            (decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].news_update_submit_btn.disabled = false;
                            decl[0].news_title.style.border = "";
                            decl[0].news_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].news_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].news_body) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].news_body.value.length < 1 && decl[0].news_title.value.length >= 1) {
                        decl[0].news_update_submit_btn.disabled = true;
                        decl[0].news_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_title.style.border = "2px solid red"
                            decl[0].news_body.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_body.style.border = "";
                        } else if ((!decl[0].news_title.value.match(decl[2].symbol) || !decl[0].news_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_title.style.border = ""
                        }
                    } else if (decl[0].news_body.value.length >= 1 && decl[0].news_title.value.length < 1) {
                        decl[0].news_update_submit_btn.disabled = true;
                        decl[0].news_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_body.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_title.style.border = "";
                        } else if ((!decl[0].news_body.value.match(decl[2].symbol) || !decl[0].news_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_body.style.border = "";
                        }
                    } else if (decl[0].news_body.value.length >= 1 && decl[0].news_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num)) &&
                            (decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num))) {
                            decl[0].news_update_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "News Updates Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_title.style.border = "2px solid red"
                            decl[0].news_body.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                        } else if ((!decl[0].news_title.value.match(decl[2].symbol) || !decl[0].news_title.value.match(decl[2].num)) &&
                            (decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            // decl[0].news_update_submit_btn.disabled = true;
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_body.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_title.style.border = "";
                        } else if ((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num)) &&
                            (!decl[0].news_body.value.match(decl[2].symbol) || !decl[0].news_body.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            // decl[0].news_update_submit_btn.disabled = true;
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].news_title.style.border = "2px solid red"
                            decl[0].news_update_submit_btn.disabled = true;
                            decl[0].news_body.style.border = "";
                        } else if (!((decl[0].news_title.value.match(decl[2].symbol) || decl[0].news_title.value.match(decl[2].num)) &&
                            (decl[0].news_body.value.match(decl[2].symbol) || decl[0].news_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].news_update_submit_btn.disabled = false;
                            decl[0].news_title.style.border = "";
                            decl[0].news_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].news_body.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }


                if (implementumID == decl[0].collapse_news_title) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].collapse_news_title.value.length < 1 && decl[0].collapse_news_body.value.length >= 1) {
                        decl[0].news_update_update_btn.disabled = true;
                        decl[0].collapse_news_title.style.border = "";
                        if ((decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_body.style.border = "2px solid red";
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_title.style.border = "";
                        } else if ((!decl[0].collapse_news_body.value.match(decl[2].symbol) || !decl[0].collapse_news_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_body.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].collapse_news_title.value.length >= 1 && decl[0].collapse_news_body.value.length < 1) {
                        decl[0].news_update_update_btn.disabled = true;
                        decl[0].collapse_news_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_title.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_body.style.border = "";
                        } else if ((!decl[0].collapse_news_title.value.match(decl[2].symbol) || !decl[0].collapse_news_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_title.style.border = "";
                        }
                    } else if (decl[0].collapse_news_title.value.length >= 1 && decl[0].collapse_news_body.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num))) {
                            decl[0].news_update_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "News Updates Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_title.style.border = "2px solid red"
                            decl[0].collapse_news_body.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_news_title.value.match(decl[2].symbol) || !decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num))) {
                            // decl[0].news_update_update_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_body.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_title.style.border = "";
                        } else if ((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_news_body.value.match(decl[2].symbol) || !decl[0].collapse_news_body.value.match(decl[2].num))) {
                            // decl[0].news_update_update_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_title.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_body.style.border = "";
                        } else if (!((decl[0].collapse_news_title.value.match(decl[2].symbol) && decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].news_update_update_btn.disabled = false;
                            decl[0].collapse_news_title.style.border = "";
                            decl[0].collapse_news_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_news_title.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].collapse_news_body) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].collapse_news_body.value.length < 1 && decl[0].collapse_news_title.value.length >= 1) {
                        decl[0].news_update_update_btn.disabled = true;
                        decl[0].collapse_news_title.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_title.style.border = "2px solid red"
                            decl[0].collapse_news_body.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_body.style.border = "";
                        } else if ((!decl[0].collapse_news_title.value.match(decl[2].symbol) || !decl[0].collapse_news_title.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_title.style.border = ""
                        }
                    } else if (decl[0].collapse_news_body.value.length >= 1 && decl[0].collapse_news_title.value.length < 1) {
                        decl[0].news_update_update_btn.disabled = true;
                        decl[0].collapse_news_title.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_body.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_title.style.border = "";
                        } else if ((!decl[0].collapse_news_body.value.match(decl[2].symbol) || !decl[0].collapse_news_body.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_body.style.border = "";
                        }
                    } else if (decl[0].collapse_news_body.value.length >= 1 && decl[0].collapse_news_title.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num))) {
                            decl[0].news_update_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "News Updates Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_title.style.border = "2px solid red"
                            decl[0].collapse_news_body.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_news_title.value.match(decl[2].symbol) || !decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].news_update_update_btn.disabled = true;
                            var status_msg = "News Updates Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_body.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_title.style.border = "";
                        } else if ((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (!decl[0].collapse_news_body.value.match(decl[2].symbol) || !decl[0].collapse_news_body.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].news_update_update_btn.disabled = true;
                            var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].message_div.style.display = "block";
                            decl[0].collapse_news_title.style.border = "2px solid red"
                            decl[0].news_update_update_btn.disabled = true;
                            decl[0].collapse_news_body.style.border = "";
                        } else if (!((decl[0].collapse_news_title.value.match(decl[2].symbol) || decl[0].collapse_news_title.value.match(decl[2].num)) &&
                            (decl[0].collapse_news_body.value.match(decl[2].symbol) || decl[0].collapse_news_body.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].news_update_update_btn.disabled = false;
                            decl[0].collapse_news_title.style.border = "";
                            decl[0].collapse_news_body.style.border = "";
                            decl[0].message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_news_body.style.border = "";
                        decl[0].message_div.style.display = "none";
                    }
                }
            }
        }
    }
]

decl[0].news_update_submit_btn.disabled = true;

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].news_title.value.length < 1 && decl[0].news_body.value.length < 1) {
            decl[0].news_update_submit_btn.disabled = true;
        } else if (decl[0].news_title.value.length < 1 && decl[0].news_body.value.length >= 1) {
            decl[0].news_update_submit_btn.disabled = true;
        } else if (decl[0].news_title.value.length >= 1 && decl[0].news_body.value.length < 1) {
            decl[0].news_update_submit_btn.disabled = true;
        } else if (decl[0].news_title.value.length >= 1 && decl[0].news_body.value.length >= 1) {
            decl[0].news_update_submit_btn.disabled = false;
        }
    }
};


decl[0].news_update_edit_btn.onclick = function () {
    if (decl[0].collapse_news_title.value.length < 1 && decl[0].collapse_news_body.value.length < 1) {
        decl[0].news_update_update_btn.disabled = true;
    } else if (decl[0].collapse_news_title.value.length < 1 && decl[0].collapse_news_body.value.length >= 1) {
        decl[0].news_update_update_btn.disabled = true;
    } else if (decl[0].collapse_news_title.value.length >= 1 && decl[0].collapse_news_body.value.length < 1) {
        decl[0].news_update_update_btn.disabled = true;
    } else if (decl[0].collapse_news_title.value.length >= 1 && decl[0].collapse_news_body.value.length >= 1) {
        decl[0].news_update_update_btn.disabled = false;
    }
};

decl[0].news_title.onfocus = function () {
    var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].news_title, status_msg);
};

decl[0].news_body.onfocus = function () {
    var status_msg = "News Updates Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].news_body, status_msg);
};

decl[0].news_title.onblur = function () {
    var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].news_title, status_msg);
};

decl[0].news_body.onblur = function () {
    var status_msg = "News Updates Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].news_body, status_msg);
};




decl[0].collapse_news_title.onfocus = function () {
    var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_news_title, status_msg);
};

decl[0].collapse_news_body.onfocus = function () {
    var status_msg = "News Updates Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_news_body, status_msg);
};

decl[0].collapse_news_title.onblur = function () {
    var status_msg = "News Updates Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_news_title, status_msg);
};

decl[0].collapse_news_body.onblur = function () {
    var status_msg = "News Updates Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_news_body, status_msg);
};