if ($('#committee_message_div').is(':visible')) {
    setTimeout(function () {
        $("#committee_message_div").fadeOut('slow');
    }, 2000);
}

var decl = [
    tender_category = {
        tenderboard_name: document.getElementById("tenderboard_name"),
        tenderboard_desc: document.getElementById("tenderboard_desc"),
        collapse_tenderboard_name: document.getElementById("collapse_tenderboard_name"),
        collapse_tenderboard_desc: document.getElementById("collapse_tenderboard_desc"),
        tenderboard_submit_btn: document.getElementById("tenderboard_submit_btn"),
        tenderbaord_edit_btn: document.getElementById("tenderbaord_edit_btn"),
        tenderboard_update_btn: document.getElementById("tenderboard_update_btn"),
        committee_message_div: document.getElementById("committee_message_div"),
    },

    mood = {
        bad_mood: "poor ☹",
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
                decl[0].tenderboard_name.value = decl[0].tenderboard_name.value.charAt(0).toUpperCase() + decl[0].tenderboard_name.value.slice(1).toLowerCase();
                decl[0].tenderboard_desc.value = decl[0].tenderboard_desc.value.charAt(0).toUpperCase() + decl[0].tenderboard_desc.value.slice(1).toLowerCase();

                if (implementumID == decl[0].tenderboard_name) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].tenderboard_name.value.length < 1 && decl[0].tenderboard_desc.value.length >= 1) {
                        decl[0].tenderboard_submit_btn.disabled = true;
                        decl[0].tenderboard_name.style.border = "";
                        if ((decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_desc.style.border = "2px solid red";
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_name.style.border = "";
                        } else if ((!decl[0].tenderboard_desc.value.match(decl[2].symbol) || !decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].tenderboard_name.value.length >= 1 && decl[0].tenderboard_desc.value.length < 1) {
                        decl[0].tenderboard_submit_btn.disabled = true;
                        decl[0].tenderboard_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_desc.style.border = "";
                        } else if ((!decl[0].tenderboard_name.value.match(decl[2].symbol) || !decl[0].tenderboard_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_name.style.border = "";
                        }
                    } else if (decl[0].tenderboard_name.value.length >= 1 && decl[0].tenderboard_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            decl[0].tenderboard_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Committee Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                        } else if ((!decl[0].tenderboard_name.value.match(decl[2].symbol) || !decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            decl[0].tenderboard_submit_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_name.style.border = "";
                        } else if ((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (!decl[0].tenderboard_desc.value.match(decl[2].symbol) || !decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            decl[0].tenderboard_submit_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_desc.style.border = "";
                        } else if (!((decl[0].tenderboard_name.value.match(decl[2].symbol) && decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].tenderboard_submit_btn.disabled = false;
                            decl[0].tenderboard_name.style.border = "";
                            decl[0].tenderboard_desc.style.border = "";
                            decl[0].committee_message_div.style.display = "none";
                        }
                    } else {
                        decl[0].tenderboard_name.style.border = "";
                        decl[0].committee_message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].tenderboard_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].tenderboard_desc.value.length < 1 && decl[0].tenderboard_name.value.length >= 1) {
                        decl[0].tenderboard_submit_btn.disabled = true;
                        decl[0].tenderboard_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_desc.style.border = "";
                        } else if ((!decl[0].tenderboard_name.value.match(decl[2].symbol) || !decl[0].tenderboard_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_name.style.border = ""
                        }
                    } else if (decl[0].tenderboard_desc.value.length >= 1 && decl[0].tenderboard_name.value.length < 1) {
                        decl[0].tenderboard_submit_btn.disabled = true;
                        decl[0].tenderboard_name.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_name.style.border = "";
                        } else if ((!decl[0].tenderboard_desc.value.match(decl[2].symbol) || !decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_desc.style.border = "";
                        }
                    } else if (decl[0].tenderboard_desc.value.length >= 1 && decl[0].tenderboard_name.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            decl[0].tenderboard_submit_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Committee Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                        } else if ((!decl[0].tenderboard_name.value.match(decl[2].symbol) || !decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            // decl[0].tenderboard_submit_btn.disabled = true;
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_name.style.border = "";
                        } else if ((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (!decl[0].tenderboard_desc.value.match(decl[2].symbol) || !decl[0].tenderboard_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            // decl[0].tenderboard_submit_btn.disabled = true;
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_submit_btn.disabled = true;
                            decl[0].tenderboard_desc.style.border = "";
                        } else if (!((decl[0].tenderboard_name.value.match(decl[2].symbol) || decl[0].tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].tenderboard_desc.value.match(decl[2].symbol) || decl[0].tenderboard_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].tenderboard_submit_btn.disabled = false;
                            decl[0].tenderboard_name.style.border = "";
                            decl[0].tenderboard_desc.style.border = "";
                            decl[0].committee_message_div.style.display = "none";
                        }
                    } else {
                        decl[0].tenderboard_desc.style.border = "";
                        decl[0].committee_message_div.style.display = "none";
                    }
                }


                if (implementumID == decl[0].collapse_tenderboard_name) {
                    console.log("TITLE SELECTED FIRST");
                    if (decl[0].collapse_tenderboard_name.value.length < 1 && decl[0].collapse_tenderboard_desc.value.length >= 1) {
                        decl[0].tenderboard_update_btn.disabled = true;
                        decl[0].collapse_tenderboard_name.style.border = "";
                        if ((decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red";
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_name.style.border = "";
                        } else if ((!decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_desc.style.border = "";
                        }
                        // console.log("Title empty");
                    } else if (decl[0].collapse_tenderboard_name.value.length >= 1 && decl[0].collapse_tenderboard_desc.value.length < 1) {
                        decl[0].tenderboard_update_btn.disabled = true;
                        decl[0].collapse_tenderboard_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_desc.style.border = "";
                        } else if ((!decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_name.style.border = "";
                        }
                    } else if (decl[0].collapse_tenderboard_name.value.length >= 1 && decl[0].collapse_tenderboard_desc.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        if ((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            decl[0].tenderboard_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Committee Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_name.style.border = "2px solid red"
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            // decl[0].tenderboard_update_btn.disabled = true;
                            console.log("GOOD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_name.style.border = "";
                        } else if ((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (!decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            // decl[0].tenderboard_update_btn.disabled = true;
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_desc.style.border = "";
                        } else if (!((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) && decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].tenderboard_update_btn.disabled = false;
                            decl[0].collapse_tenderboard_name.style.border = "";
                            decl[0].collapse_tenderboard_desc.style.border = "";
                            decl[0].committee_message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_tenderboard_name.style.border = "";
                        decl[0].committee_message_div.style.display = "none";
                    }

                } else if (implementumID == decl[0].collapse_tenderboard_desc) {
                    console.log("BODY SELECTED FIRST");
                    if (decl[0].collapse_tenderboard_desc.value.length < 1 && decl[0].collapse_tenderboard_name.value.length >= 1) {
                        decl[0].tenderboard_update_btn.disabled = true;
                        decl[0].collapse_tenderboard_name.style.border = "";
                        // console.log("Body empty");
                        if ((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num))) {
                            console.log("BAD TITLE");
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_name.style.border = "2px solid red"
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_desc.style.border = "";
                        } else if ((!decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_name.value.match(decl[2].num))) {
                            console.log("GOOD TITLE");
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_name.style.border = ""
                        }
                    } else if (decl[0].collapse_tenderboard_desc.value.length >= 1 && decl[0].collapse_tenderboard_name.value.length < 1) {
                        decl[0].tenderboard_update_btn.disabled = true;
                        decl[0].collapse_tenderboard_name.style.border = "";

                        // console.log("Title empty");
                        if ((decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            console.log("BAD DESCRIPTION");
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_name.style.border = "";
                        } else if ((!decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            console.log("GOOD DESCRIPTION");
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_desc.style.border = "";
                        }
                    } else if (decl[0].collapse_tenderboard_desc.value.length >= 1 && decl[0].collapse_tenderboard_name.value.length >= 1) {
                        // console.log("Title And Body Fully");
                        // console.log("GOOD TITLE AND DESCRIPTION");
                        if ((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            decl[0].tenderboard_update_btn.disabled = true;
                            console.log("BAD TITLE AND BAD DESCRIPTION");
                            var status_msg = "Committee Title and Description can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_name.style.border = "2px solid red"
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                        } else if ((!decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            console.log("GOOD TITLE AND BAD DESCRIPTION")
                            decl[0].tenderboard_update_btn.disabled = true;
                            var status_msg = "Committee Description can not contains numbers or specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_desc.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_name.style.border = "";
                        } else if ((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (!decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || !decl[0].collapse_tenderboard_desc.value.match(decl[2].num))) {
                            console.log("BAD TITLE AND GOOD DESCRIPTION");
                            decl[0].tenderboard_update_btn.disabled = true;
                            var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
                            decl[0].committee_message_div.innerHTML = status_msg + " " + decl[1].bad_mood;
                            decl[0].committee_message_div.style.display = "block";
                            decl[0].collapse_tenderboard_name.style.border = "2px solid red"
                            decl[0].tenderboard_update_btn.disabled = true;
                            decl[0].collapse_tenderboard_desc.style.border = "";
                        } else if (!((decl[0].collapse_tenderboard_name.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_name.value.match(decl[2].num)) &&
                            (decl[0].collapse_tenderboard_desc.value.match(decl[2].symbol) || decl[0].collapse_tenderboard_desc.value.match(decl[2].num)))) {
                            console.log("GOOD TITLE AND DESCRIPTION");
                            decl[0].tenderboard_update_btn.disabled = false;
                            decl[0].collapse_tenderboard_name.style.border = "";
                            decl[0].collapse_tenderboard_desc.style.border = "";
                            decl[0].committee_message_div.style.display = "none";
                        }
                    } else {
                        decl[0].collapse_tenderboard_desc.style.border = "";
                        decl[0].committee_message_div.style.display = "none";
                    }
                }
            }
        }
    }
]

decl[0].tenderboard_submit_btn.disabled = true;

document.onreadystatechange = () => {
    if (document.readyState === 'complete') {
        if (decl[0].tenderboard_name.value.length < 1 && decl[0].tenderboard_desc.value.length < 1) {
            decl[0].tenderboard_submit_btn.disabled = true;
        } else if (decl[0].tenderboard_name.value.length < 1 && decl[0].tenderboard_desc.value.length >= 1) {
            decl[0].tenderboard_submit_btn.disabled = true;
        } else if (decl[0].tenderboard_name.value.length >= 1 && decl[0].tenderboard_desc.value.length < 1) {
            decl[0].tenderboard_submit_btn.disabled = true;
        } else if (decl[0].tenderboard_name.value.length >= 1 && decl[0].tenderboard_desc.value.length >= 1) {
            decl[0].tenderboard_submit_btn.disabled = false;
        }
    }
};


decl[0].tenderbaord_edit_btn.onclick = function () {
    if (decl[0].collapse_tenderboard_name.value.length < 1 && decl[0].collapse_tenderboard_desc.value.length < 1) {
        decl[0].tenderboard_update_btn.disabled = true;
    } else if (decl[0].collapse_tenderboard_name.value.length < 1 && decl[0].collapse_tenderboard_desc.value.length >= 1) {
        decl[0].tenderboard_update_btn.disabled = true;
    } else if (decl[0].collapse_tenderboard_name.value.length >= 1 && decl[0].collapse_tenderboard_desc.value.length < 1) {
        decl[0].tenderboard_update_btn.disabled = true;
    } else if (decl[0].collapse_tenderboard_name.value.length >= 1 && decl[0].collapse_tenderboard_desc.value.length >= 1) {
        decl[0].tenderboard_update_btn.disabled = false;
    }
};

decl[0].tenderboard_name.onfocus = function () {
    var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tenderboard_name, status_msg);
};

decl[0].tenderboard_desc.onfocus = function () {
    var status_msg = "Committee Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tenderboard_desc, status_msg);
};

decl[0].tenderboard_name.onblur = function () {
    var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tenderboard_name, status_msg);
};

decl[0].tenderboard_desc.onblur = function () {
    var status_msg = "Committee Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].tenderboard_desc, status_msg);
};




decl[0].collapse_tenderboard_name.onfocus = function () {
    var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tenderboard_name, status_msg);
};

decl[0].collapse_tenderboard_desc.onfocus = function () {
    var status_msg = "Committee Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tenderboard_desc, status_msg);
};

decl[0].collapse_tenderboard_name.onblur = function () {
    var status_msg = "Committee Title can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tenderboard_name, status_msg);
};

decl[0].collapse_tenderboard_desc.onblur = function () {
    var status_msg = "Committee Description can not contains numbers and specials symbols eg: 12345#$%";
    implementum[0].firstLetterToCaps(decl[0].collapse_tenderboard_desc, status_msg);
};