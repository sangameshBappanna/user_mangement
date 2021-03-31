$(window).on('load', function() {
    $('#DOB').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        modal: false,
        footer: true,
        maxDate: new Date(),
    });
})

function registerUser(e) {
    // e.preventDefault();
    var is_valid = true;
    var message = '';
    $('.validateIT').each(function() {
        $(this).removeClass('is-invalid');
        if ($(this).val().length == 0) {
            $(this).addClass('is-invalid');
            is_valid = false;
            message = "Enter all required fields";
        }
    });
    if ($('#Password').val() != $('#ConfirmPassword').val()) {
        is_valid = false;
        $('#ConfirmPassword').addClass('is-invalid');
        message = "Confirm password does not match";
    }
    if (!is_valid) {
        alert(message);
        return false;
    } else {
        return true;
    }
    var name = $('#name').val();
    var username = $('#username').val();
    var EmailID = $('#EmailID').val();
    var Password = $('#Password').val();
    var ConfirmPassword = $('#ConfirmPassword').val();
    var MobileNumber = $('#MobileNumber').val();
    var DOB = $('#DOB').val();
    var Address = $('#Address').val();
    var City = $('#City').val();
    var State = $('#State').val();
    var Country = $('#Country').val();
    // var formData = new FormData();
    // formData.append("name", name);
    // formData.append("username", username);
    // formData.append("EmailID", EmailID);
    // formData.append("Password", Password);
    // formData.append("ConfirmPassword", ConfirmPassword);
    // formData.append("MobileNumber", MobileNumber);
    // formData.append("DOB", DOB);
    // formData.append("Address", Address);
    // formData.append("City", City);
    // formData.append("State", State);
    // formData.append("Country", Country);
    // var file = $('#profileImage').prop('files')[0];
    // if (typeof file === 'undefined') {
    //     is_valid = false;
    //     $('#profileImage').addClass('is-invalid');
    // } else {
    //     var allowedExtensions = /(.*?)\.(jpg|jpeg)$/;
    //     if (!allowedExtensions.exec(file.name)) {
    //         console.log('Please Select .jpg, or .jpeg files only', 'error');
    //         is_valid = false;
    //     }
    // }
    // formData.append("profileImage", file);
    // var xhr = new XMLHttpRequest();

    // xhr.open('POST', 'api/registerUserAPI.php', true);

    // xhr.send(formData);
    // xhr.onreadystatechange = function(response) {
    //     if (this.readyState == 4 && this.status == 200) {
    //         var result = JSON.parse(this.response);
    //         if (result.result) {
    //             console.log(result);
    //             // window.location.reload();
    //         } else {
    //             console.log('result');
    //             // flash('Failed : ' + result.message, 'error');
    //         }
    //     }
    // };
}