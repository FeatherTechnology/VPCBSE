$(document).ready(function () {

    $(document).on("click", ".rejectpo", function () { //to set student id when delete modal box open.
        var id = $(this).data('id');
        $("#student_id").val(id);
    });
    $(document).on('click', '#rejectStud', function () {
        var studentId = $('#student_id').val(); // Get student ID

        $.ajax({
            url: 'studentFile/leavingValidation.php',
            type: 'POST',
            data: { student_id: studentId }, // Send student ID to PHP
            success: function (response) {

                if (response.includes('Pending')) {
                    // If there are pending fees
                    $('#pending').text('Student fees are Pending for the academic year. Please select the Leaving Term');
                    $('#pending').css('color', 'red'); // Highlight the message
                    $('.leaving_class').show();
                    $('#rejectpobtn').prop('disabled', true); // Disable reject button
                } else {
                    // If no pending fees
                    $('#pending').text('Student fees are no Pending for the academic year.');
                    $('#pending').css('color', 'green');
                    $('.leaving_class').hide();
                    $('#leaving_term').val(5); // Set leaving term to 5 removing without pending
                    $('#rejectpobtn').prop('disabled', false); // Enable reject button
                }
            },
            error: function (xhr, status, error) {
                console.log(error); // Handle error
            }
        });
    });
    // Enable reject button once the leaving term is selected
    $('#leaving_term').on('change', function () {
        if ($(this).val() != '') {
            $('#rejectpobtn').prop('disabled', false); // Enable button if term is selected
        } else {
            $('#rejectpobtn').prop('disabled', true); // Keep disabled if no term selected
        }
    });
    // Submit form event
    $('#deleted_student__creation').submit(function (event) {
        // Prevent default form submission
        event.preventDefault();
        $('#rejectpobtn').prop('disabled', true); // Disable reject button  
        // Get form data
        var formData = $(this).serialize();
        // AJAX request
        $.ajax({
            url: 'studentFile/ajaxInsertReason.php', // Replace with your AJAX page URL
            type: 'POST',
            data: formData,
            success: function (response) {
                // Check the response for success or error message
                if (response.includes("successfully")) {
                    alert(response);
                    $('#rejectpobtn').prop('disabled', false); // Disable reject button
                    // Redirect to the "edit_student_creation" page
                    window.location.href = 'edit_student_creation';
                } else {
                    // Show error message
                    alert(response);
                    $('#rejectpobtn').prop('disabled', false); // Disable reject button
                }
            },
            error: function (xhr, status, error) {
                // Handle error if the AJAX request fails
                console.log(error);
            }
        });
    });


    //Modal Box for Attachment.
    $(document).on('click', '.attachmentFiles', function () {
        clearAllfieldInModal();

        var studID = $(this).attr('data-id');
        var admissionNo = $(this).attr('data-no');
        $('#admissionno').val(admissionNo);
        $('#studentid').val(studID);
        resetAttachmentTable(studID);
    });

    $('#submitAttachmentBtn').click(function () {
        var admissionno = $('#admissionno').val();
        var studentid = $('#studentid').val();
        var attachment_id = $("#attachment_id").val();
        var title = $('#title').val();
        var updatecertificate = $('#updatecertificate').val();

        var formData = new FormData();
        formData.append("file", $('#certificate')[0].files[0]);
        formData.append("admissionno", admissionno);
        formData.append("studentid", studentid);
        formData.append("attachment_id", attachment_id);
        formData.append("title", title);
        formData.append("updatecertificate", updatecertificate);

        if (formData != "") {
            $.ajax({
                url: 'studentFile/attachmentFiles/ajaxInsertAttachment.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    var insresult = response.includes("Exists");
                    var updresult = response.includes("Updated");
                    if (insresult) {
                        $('#attachmentInsertNotOk').show();
                        setTimeout(function () {
                            $('#attachmentInsertNotOk').fadeOut('fast');
                        }, 2000);
                    } else if (updresult) {
                        $('#attachmentUpdateOk').show();
                        setTimeout(function () {
                            $('#attachmentUpdateOk').fadeOut('fast');
                        }, 2000);
                        resetAttachmentTable(studentid);
                        clearAllfieldInModal();
                    } else {
                        $('#attachmentInsertOk').show();
                        setTimeout(function () {
                            $('#attachmentInsertOk').fadeOut('fast');
                        }, 2000);
                        resetAttachmentTable(studentid);
                        clearAllfieldInModal();
                    }
                }
            });
        } else {
            $("#attachmentnameCheck").show();
        }
    });


    $("body").on("click", "#edit_attachment", function () {
        var attachment_id = $(this).attr('value');
        $("#attachment_id").val(attachment_id);
        $.ajax({
            url: 'studentFile/attachmentFiles/ajaxEditAttachment.php',
            type: 'POST',
            data: { "attachment_id": attachment_id },
            cache: false,
            dataType: 'json',
            success: function (response) {
                $("#title").val(response['title']);
                $("#updatecertificate").val(response['file_name']);
                $("#attachedfile").attr("href", response['file_path']);
                $("#attachedfile").text(response['file_name']);
            }
        });
    });

    $("body").on("click", "#delete_attachment", function () {
        var isok = confirm("Do you want Delete Attachment?");
        if (isok == false) {
            return false;
        } else {
            var attachment_id = $(this).attr('value');
            var c_obj = $(this).parents("tr");
            $.ajax({
                url: 'studentFile/attachmentFiles/ajaxDeleteAttachment.php',
                type: 'POST',
                data: { "attachment_id": attachment_id },
                cache: false,
                success: function (response) {
                    var delresult = response.includes("Rights");
                    if (delresult) {
                        $('#attachmentDeleteNotOk').show();
                        setTimeout(function () {
                            $('#attachmentDeleteNotOk').fadeOut('fast');
                        }, 2000);
                    }
                    else {
                        c_obj.remove();
                        $('#attachmentDeleteOk').show();
                        setTimeout(function () {
                            $('#attachmentDeleteOk').fadeOut('fast');
                        }, 2000);
                    }

                    clearAllfieldInModal();
                }
            });
        }
    });
    //Modal Box for Assertion Name END

    $("#studentBulkDownload").click(function () {
        window.location.href = 'uploads/downloadfiles/studentCreationBulkUpload.xlsx'
    });

    //Student Bulk Import Excel upload
    $("#insertsuccess").hide();
    $("#notinsertsuccess").hide();
    $("#submitstudentBulkUpload").click(function () {

        var file_data = $('#stundentExcelfile').prop('files')[0];
        var withstudent_bulk = new FormData();
        withstudent_bulk.append('file', file_data);

        if (stundentExcelfile.files.length == 0) {
            alert("Please Select Excel File");
            return false;
        }

        $.ajax({
            type: 'POST',
            url: 'studentFile/ajaxstudentbulkupload.php',
            data: withstudent_bulk,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#stundentExcelfile').attr("disabled", true);
                $('#submitstudentBulkUpload').attr("disabled", true);
            },
            success: function (data) {
                if (data == 0) {
                    $("#notinsertsuccess").hide();
                    $("#insertsuccess").show();
                    $("#stundentExcelfile").val('');
                } else if (data == 1) {
                    $("#insertsuccess").hide();
                    $("#notinsertsuccess").show();
                    $("#stundentExcelfile").val('');
                }
            },
            complete: function () {
                $('#stundentExcelfile').attr("disabled", false);
                $('#submitstudentBulkUpload').attr("disabled", false);
            }
        });
    });

}); //Document END.

//Assertion Modal START
//reset Attachment modal table
function resetAttachmentTable(studID) {
    $.ajax({
        url: 'studentFile/attachmentFiles/ajaxResetAttachmentTable.php',
        type: 'POST',
        data: { "studID": studID },
        cache: false,
        success: function (html) {
            $("#updatedAttachmentTable").empty();
            $("#updatedAttachmentTable").html(html);
        }
    });
}

function clearAllfieldInModal() {
    $('#attachment_id').val('');
    $('#title').val('');
    $('#certificate').val('');
    $('#updatecertificate').val('');
}
//Assertion Modal END
function closeChartsModal() {
    $('#deleted_student__creation input').each(function () {
        var id = $(this).attr('id');
        if (id !== 'student_id') {
            $(this).val('');
        }
    });
    $('#pending').text('');
    $('#deleted_student__creation textarea').val('');

    $('#deleted_student__creation select').each(function () {
        $(this).val($(this).find('option:first').val());

    });
}