$(document).ready(function(){
    if ($('#message-div').is(':visible')) {
        setTimeout(function () {
            $("#message-div").fadeOut('slow');
        }, 2000);
    }

    if ($('message').is(':visible')) {
        setTimeout(function () {
            $("#message-div").fadeOut('slow');
        }, 2000);
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    // $('#mycarousel').carousel({
    //     interval: 200
    // })

    // $('#tender_category_submit_btn').on('click', function () {
    //     var $btn = $(this).button('loading');
    //     console.log("woooooooow");
    //     // business logic...
    //     $btn.button('reset');
    // })

    $("#committee_content_area").find('table').find('tbody').find('td').find('.committee-edit-btn').on('click', function (e) {
        e.preventDefault();
        var commmittee_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var committee_name = e.target.parentNode.parentNode.childNodes[5].textContent;
        var committee_desc = e.target.parentNode.parentNode.childNodes[7].textContent;

        $('#collapse_committee_id').val(commmittee_id);
        $('#collapse_committee_name').val(committee_name);
        $('#collapse_committee_desc').val(committee_desc);
    });

    $("#tenderboard_content_area").find('table').find('tbody').find('td').find('.tenderboard-edit-btn').on('click', function (e) {
        e.preventDefault();
        var tenderaord_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var tenderboard_name = e.target.parentNode.parentNode.childNodes[5].textContent;
        var tenderboard_desc = e.target.parentNode.parentNode.childNodes[7].textContent;

        $('#collapse_tenderboard_id').val(tenderaord_id);
        $('#collapse_tenderboard_name').val(tenderboard_name);
        $('#collapse_tenderboard_desc').val(tenderboard_desc);

    });

    $("#content_area").find('table').find('tbody').find('td').find('.role-edit-btn').on('click', function(e){        
        e.preventDefault();
        var role_id = e.target.parentNode.parentNode.childNodes[1].textContent;
        var role_name = e.target.parentNode.parentNode.childNodes[3].textContent;
        var role_desc = e.target.parentNode.parentNode.childNodes[5].textContent;

        $('#collapse_role_id').val(role_id);
        $('#collapse_role_title').val(role_name);
        $('#collapse_role_desc').val(role_desc);
        
    });

    $("#stakeholder_unapproved_content_area").find('table').find('tbody').find('td').find('.unapprove-stakeholder-edit-btn').on('click', function(e){        
        e.preventDefault();
        var stakeholder_id = e.target.parentNode.parentNode.childNodes[1].textContent;
        var stakeholder_status = e.target.parentNode.parentNode.childNodes[17].textContent;

        console.log(stakeholder_id);
        console.log(stakeholder_status);


        $('#collapse_unapproved_stakeholder_status').val(stakeholder_status);
        $('#collapse_unapproved_stakeholder_id').val(stakeholder_id);
        
    });

    // TODO:  START: Section: Where user is assigned a Board Membership
    $("#tender_status_content_area").find('table').find('tbody').find('td').find('.winning_status_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var application_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var application_status = e.target.parentNode.parentNode.childNodes[9].textContent;

        console.log(application_id);
        console.log(application_status);


        $('#collapse_tender_applicationid').val(application_id);
        $('#collapse_assigning_winning').val(application_status);
    });
    // ?:  END: Section: Where user is assigned a Board Membership

    // TODO:  START: Section: Where user is assigned a Board Membership
    $("#tender2_status_content_area").find('table').find('tbody').find('td').find('.winning_status_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var application_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var application_status = e.target.parentNode.parentNode.childNodes[9].textContent;

        console.log(application_id);
        console.log(application_status);


        $('#collapse_tender_applicationid').val(application_id);
        $('#collapse_assigning_winning').val(application_status);
    });
    // ?:  END: Section: Where user is assigned a Board Membership

    // TODO:  START: Section: Where user is assigned a Board Membership
    $("#boardmembers_approved_content_area").find('table').find('tbody').find('td').find('.assign_committee_membership').on('click', function (e) {
        e.preventDefault();
        var board_member_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var board_membership_id = e.target.parentNode.parentNode.childNodes[5].textContent;

        console.log(board_member_id);
        console.log(board_membership_id);


        $('#collapse_board_id').val(board_membership_id);
        $('#collapse_board_member_id').val(board_member_id);
    });
    // ?:  END: Section: Where user is assigned a Board Membership

    
    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#committees_approved_content_area").find('table').find('tbody').find('td').find('.assign_committee_membership_btn').on('click', function (e) {
        e.preventDefault();
        var committee_member_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var committee_membership_id = e.target.parentNode.parentNode.childNodes[5].textContent;

        console.log(committee_member_id);
        console.log(committee_membership_id);


        $('#collapse_committee_id').val(committee_membership_id);
        $('#collapse_committee_member_id').val(committee_member_id);
    });
    // ?:  END: Section: Where user is assigned a Committee Membership

    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#close_tender_content_area").find('table').find('tbody').find('td').find('.closed_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var closed_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var closed_status = e.target.parentNode.parentNode.childNodes[5].textContent;

        console.log(closed_id);
        console.log(closed_status);


        $('#closed_tender_status').val(closed_status);
        $('#close_tender_id').val(closed_id);
    });
    // ?:  END: Section: Where user is assigned a Committee Membership


    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#unapproved_status_content_area").find('table').find('tbody').find('td').find('.unapprove_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var unapprove_id = e.target.parentNode.parentNode.childNodes[1].textContent;
        var unapprove_status = e.target.parentNode.parentNode.childNodes[3].textContent;

        console.log(unapprove_id);
        console.log(unapprove_status);


        $('#unapproved_tender_status').val(unapprove_status);
        $('#unapproved_tender_id').val(unapprove_id);
    });
    // ?:  END: Section: Where user is assigned a Committee Membership


    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#ongoing_status_content_area").find('table').find('tbody').find('td').find('.ongoing_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var ongoing_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var ongoing_status = e.target.parentNode.parentNode.childNodes[5].textContent;

        console.log(ongoing_id);
        console.log(ongoing_status);


        $('#ongoing_tender_status').val(ongoing_status);
        $('#ongoing_tender_id').val(ongoing_id);

        // $('#tender_progress_id').val(ongoing_status);
        // $('#ongoing_tender_id').val(ongoing_id);

        // $('#ongoing_tender_status').val(ongoing_status);
        // $('#ongoing_tender_id').val(ongoing_id);

    });
    // ?:  END: Section: Where user is assigned a Committee Membership


    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#unapproved_status_content_area").find('table').find('tbody').find('td').find('.unapproved_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var unapproved_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var unapproved_status = e.target.parentNode.parentNode.childNodes[5].textContent;

        console.log(unapproved_id);
        console.log(unapproved_status);


        $('#unapproved_tender_status').val(unapproved_status);
        $('#unapproved_tender_id').val(unapproved_id);
    });
    // ?:  END: Section: Where user is assigned a Committee Membership

    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#approved_tender_content_area").find('table').find('tbody').find('td').find('.approved_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var approved_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var approved_status = e.target.parentNode.parentNode.childNodes[5].textContent;

        console.log(approved_id);
        console.log(approved_status);


        $('#approved_tender_status').val(approved_status);
        $('#approved_tender_id').val(approved_id);
    });
    // ?:  END: Section: Where user is assigned a Committee Membership

    // TODO:  START: Section: Where user is assigned a Committee Membership
    $("#assignacommboard_content_area").find('table').find('tbody').find('td').find('.assignacommboard_tender_edit_btn').on('click', function (e) {
        e.preventDefault();
        var tender_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var committee_id = e.target.parentNode.parentNode.childNodes[5].textContent;
        var board_id = e.target.parentNode.parentNode.childNodes[7].textContent;

        console.log(tender_id);
        console.log(committee_id);
        console.log(board_id);

        $('#collapse_commid').val(committee_id);
        $('#collapse_boaid').val(board_id);
        $('#collapse_boatender_id').val(tender_id);
        $('#collapse_commtender_id').val(tender_id);
    });
    // ?:  END: Section: Where user is assigned a Committee Membership


    $("#stakeholder_approved_content_area").find('table').find('tbody').find('td').find('.approved-stakeholder-edit-btn').on('click', function(e){        
        e.preventDefault();
        var stakeholder_id = e.target.parentNode.parentNode.childNodes[1].textContent;
        var stakeholder_status = e.target.parentNode.parentNode.childNodes[17].textContent;

        console.log(stakeholder_id);
        console.log(stakeholder_status);


        $('#collapse_approved_stakeholder_status').val(stakeholder_status);
        $('#collapse_approved_stakeholder_id').val(stakeholder_id);
        
    });

    $("#department_content_area").find('table').find('tbody').find('td').find('.department-edit-btn').on('click', function(e){        
        e.preventDefault();
        var department_id = e.target.parentNode.parentNode.childNodes[1].textContent;
        var department_name = e.target.parentNode.parentNode.childNodes[3].textContent;
        var department_desc = e.target.parentNode.parentNode.childNodes[5].textContent;

        $('#collapse_department_id').val(department_id);
        $('#collapse_department_name').val(department_name);
        $('#collapse_department_desc').val(department_desc);

        console.log(department_id);
        console.log(department_name);
        console.log(department_desc);
        
    });

    $("#idcard_content_area").find('table').find('tbody').find('td').find('.idcard-edit-btn').on('click', function(e){        
        e.preventDefault();
        var idcard_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var idcard_name = e.target.parentNode.parentNode.childNodes[5].textContent;
        var idcard_desc = e.target.parentNode.parentNode.childNodes[7].textContent;

        $('#collapse_idcard_id').val(idcard_id);
        $('#collapse_idcard_name').val(idcard_name);
        $('#collapse_idcard_desc').val(idcard_desc);

        console.log(idcard_id);
        console.log(idcard_name);
        console.log(idcard_desc);
        
    });

    $("#user_requirement_content_area").find('table').find('tbody').find('td').find('.user-requirement-edit-btn').on('click', function(e){        
        e.preventDefault();
        var requirementID = e.target.parentNode.parentNode.childNodes[3].textContent;
        var requirement_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var requirement_body = e.target.parentNode.parentNode.childNodes[7].textContent;
        var requirement_filename = e.target.parentNode.parentNode.childNodes[9].textContent;
        var requirement_status = e.target.parentNode.parentNode.childNodes[11].textContent;
        var requirement_requesterid = e.target.parentNode.parentNode.childNodes[13].textContent;
        var requirement_timestamp = e.target.parentNode.parentNode.childNodes[15].textContent;
        var requirement_type = e.target.parentNode.parentNode.childNodes[17].textContent;
        var requirement_size = e.target.parentNode.parentNode.childNodes[19].textContent;

        console.log(requirementID);
        console.log(requirement_title);
        console.log(requirement_body);
        console.log(requirement_filename);
        console.log(requirement_status);
        console.log(requirement_requesterid);
        console.log(requirement_timestamp);
        console.log(requirement_type);
        console.log(requirement_size);

        $('#collapse_user_requirement_id').val(requirementID);
        $('#collapse_user_requirement_title').val(requirement_title);
        $('#collapse_user_requirement_body').val(requirement_body);
        $('#collapse_user_requirement_filename').val(requirement_filename);
        $('#collapse_user_requirement_status').val(requirement_status);
        $('#collapse_user_requirement_requesterid').val(requirement_requesterid);
        $('#collapse_user_requirement_timestamp').val(requirement_timestamp);
        $('#collapse_user_requirement_type').val(requirement_type);
        $('#collapse_user_requirement_size').val(requirement_size);
        
    });

    $("#user_requirement_details_content_area").find('table').find('tbody').find('td').find('.user_requirement_details_edit_btn').on('click', function(e){        
        e.preventDefault();
        var requirementID = e.target.parentNode.parentNode.childNodes[3].textContent;
        var requirement_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var requirement_body = e.target.parentNode.parentNode.childNodes[7].textContent;
        var requirement_filename = e.target.parentNode.parentNode.childNodes[9].textContent;
        var requirement_status = e.target.parentNode.parentNode.childNodes[11].textContent;
        var requirement_requesterid = e.target.parentNode.parentNode.childNodes[13].textContent;
        var requirement_timestamp = e.target.parentNode.parentNode.childNodes[17].textContent;
        var requirement_type = e.target.parentNode.parentNode.childNodes[21].textContent;
        var requirement_size = e.target.parentNode.parentNode.childNodes[23].textContent;

        console.log(requirementID);
        console.log(requirement_title);
        console.log(requirement_body);
        console.log(requirement_filename);
        console.log(requirement_status);
        console.log(requirement_requesterid);
        console.log(requirement_timestamp);
        console.log(requirement_type);
        console.log(requirement_size);

        $('#collapse_requirement_approval_status').val(requirement_status);
        $('#collapse_requirement_approval_id').val(requirementID);

        $('#collapse_requirement_details_id').val(requirementID);
        $('#collapse_requirement_details_title').val(requirement_title);
        $('#collapse_requirement_details_body').val(requirement_body);
        $('#collapse_requirement_details_filename').val(requirement_filename);
        $('#collapse_requirement_details_status').val(requirement_status);
        $('#collapse_requirement_details_requesterid').val(requirement_requesterid);
        $('#collapse_requirement_details_timestamp').val(requirement_timestamp);
        $('#collapse_requirement_details_type').val(requirement_type);
        $('#collapse_requirement_details_size').val(requirement_size);
        
    });

    $("#document_content_area").find('table').find('tbody').find('td').find('.requirement-document-edit-btn').on('click', function(e){        
        e.preventDefault();
        var document_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var document_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var document_body = e.target.parentNode.parentNode.childNodes[7].textContent;
        var document_filename = e.target.parentNode.parentNode.childNodes[9].textContent;
        var document_type = e.target.parentNode.parentNode.childNodes[11].textContent;
        var document_size = e.target.parentNode.parentNode.childNodes[13].textContent;

        console.log(document_id);
        console.log(document_title);
        console.log(document_body);
        console.log(document_filename);
        console.log(document_type);
        console.log(document_size);

        $('#collapse_document_id').val(document_id);
        $('#collapse_document_title').val(document_title);
        $('#collapse_document_desc').val(document_body);
        $('#collapse_document_filename').val(document_filename);
        $('#collapse_document_type').val(document_type);
        $('#collapse_document_size').val(document_size);
        
    });

    $("#tender_category_content_area").find('table').find('tbody').find('td').find('.tender-category-edit-btn').on('click', function(e){        
        e.preventDefault();
        var tender_category_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var tender_category_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var tender_category_body = e.target.parentNode.parentNode.childNodes[7].textContent;

        console.log(tender_category_id);
        console.log(tender_category_title);
        console.log(tender_category_body);

        $('#collapse_tender_category_id').val(tender_category_id);
        $('#collapse_tender_category_title').val(tender_category_title);
        $('#collapse_tender_category_body').val(tender_category_body);
        
    });

    $("#business_category_content_area").find('table').find('tbody').find('td').find('.business-category-edit-btn').on('click', function(e){        
        e.preventDefault();
        var business_category_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var business_category_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var business_category_body = e.target.parentNode.parentNode.childNodes[7].textContent;

        console.log(business_category_id);
        console.log(business_category_title);
        console.log(business_category_body);

        $('#collapse_business_category_id').val(business_category_id);
        $('#collapse_business_category_title').val(business_category_title);
        $('#collapse_business_category_body').val(business_category_body);
        
    });

    $("#news_content_area").find('table').find('tbody').find('td').find('.news-edit-btn').on('click', function(e){        
        e.preventDefault();
        var news_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var news_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var news_body = e.target.parentNode.parentNode.childNodes[7].textContent;

        console.log(news_id);
        console.log(news_title);
        console.log(news_body);

        $('#collapse_news_id').val(news_id);
        $('#collapse_news_title').val(news_title);
        $('#collapse_news_body').val(news_body);

        
    });

    $("#story_content_area").find('table').find('tbody').find('td').find('.story-edit-btn').on('click', function(e){        
        e.preventDefault();
        var story_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var story_title = e.target.parentNode.parentNode.childNodes[5].textContent;
        var story_body = e.target.parentNode.parentNode.childNodes[7].textContent;
        var story_status = e.target.parentNode.parentNode.childNodes[11].textContent;
        var story_filename = e.target.parentNode.parentNode.childNodes[13].textContent;
        var story_type = e.target.parentNode.parentNode.childNodes[15].textContent;
        var story_size = e.target.parentNode.parentNode.childNodes[17].textContent;

        $('#collapse_story_id').val(story_id);
        $('#collapse_story_title').val(story_title);
        $('#collapse_story_desc').val(story_body);
        $('#old_story_status').val(story_status);
        $('#collapse_story_status').val(story_status);
        $('#collapse_story_filename').val(story_filename);
        // $('#collapse_story_image').src = story_filename;
        $('#collapse_story_type').val(story_type);
        $('#collapse_story_size').val(story_size);

        console.log(story_id);
        console.log(story_title);
        console.log(story_body);
        console.log(story_status);
        console.log(story_filename);
        console.log(story_type);
        console.log(story_size);
        
    });

    $("#systemuser_content_area").find('table').find('tbody').find('td').find('.system-user-edit-btn').on('click', function (e) {
        e.preventDefault();

        var dept_id = e.target.parentNode.parentNode.childNodes[3].textContent;
        var firstname = e.target.parentNode.parentNode.childNodes[5].textContent;
        var middlename = e.target.parentNode.parentNode.childNodes[7].textContent;
        var lastname = e.target.parentNode.parentNode.childNodes[9].textContent;
        var gender = e.target.parentNode.parentNode.childNodes[13].textContent;
        var email = e.target.parentNode.parentNode.childNodes[15].textContent;
        var phonenumber = e.target.parentNode.parentNode.childNodes[17].textContent;
        var username = e.target.parentNode.parentNode.childNodes[19].textContent;
        var passcode = e.target.parentNode.parentNode.childNodes[21].textContent;
        var user_desc = e.target.parentNode.parentNode.childNodes[23].textContent;
        var role_id = e.target.parentNode.parentNode.childNodes[27].textContent;
        var status = e.target.parentNode.parentNode.childNodes[29].textContent;
        var token = e.target.parentNode.parentNode.childNodes[31].textContent;
        var prof_img = e.target.parentNode.parentNode.childNodes[33].textContent;
        var systemuser_id = e.target.parentNode.parentNode.childNodes[35].textContent;
        var timestamp = e.target.parentNode.parentNode.childNodes[37].textContent;
        var createdby = e.target.parentNode.parentNode.childNodes[39].textContent;

        console.log(dept_id);
        console.log(firstname);
        console.log(middlename);
        console.log(lastname);
        console.log(gender);
        console.log(email);
        console.log(phonenumber);
        console.log(username);
        console.log(passcode);
        console.log(user_desc);
        console.log(role_id);
        console.log(status);
        console.log(token);
        console.log(prof_img);
        console.log(systemuser_id);
        console.log(timestamp);
        console.log(createdby);

        $('#systemuser_id').val(systemuser_id);
        $('#collapse_su_firstname').val(firstname);
        $('#collapse_su_middlename').val(middlename);
        $('#collapse_su_lastname').val(lastname);
        $('#collapse_su_gender_id').val(gender);
        $('#collapse_su_email').val(email);
        $('#collapse_su_phonenumber').val(phonenumber);
        $('#collapse_su_username').val(username);
        $('#collapse_su_password').val(passcode);
        $('#collapse_su_token').val(token);
        $('#collapse_su_prof_img').val(prof_img);
        $('#collapse_su_status').val(status);
        $('#collapse_su_role_id').val(role_id);
        $('#collapse_su_desc').val(user_desc);
        $('#collapse_su_dept_id').val(dept_id);
        $('#collapse_su_timestamp').val(timestamp);
        $('#collapse_createdby').val(createdby);

    });
    
    $('[data-toggle="offcanvas"]').click(function() {
        $('#side-menu').toggleClass('hidden-xs');
    });

    $(document).on('change', ':file', function () {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    // $(':file').attr('disabled', 'disabled');

    $(':file').on('fileselect', function (event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });

});