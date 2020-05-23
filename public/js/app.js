let delete_btn = (e) => {
    $('#delete-hidden-box').val(e.srcElement.id);
}

let edit_btn = (e) => {
    $.ajax({
        url: "/crud/controllers/load_details.php",
        method: "POST",
        headers: {
        },
        data: {
            msg: 'select a record',
            record_id: (e.srcElement.id).substring((e.srcElement.id).indexOf('-') + 1),
        },})
        .done(function(response) {
            let dataset = JSON.parse(atob(atob(JSON.parse(response)['data'])));
            let usernames = JSON.parse(atob(atob(JSON.parse(response)['usernames'])));
            usernames = usernames.reduce((a, c) => a+" "+c);

            $('#edit-hidden-box').addClass(usernames);
            $('#edit-hidden-box').attr('name', dataset.id);
            $('#edit-fullname').val(dataset.fullname);
            $('#edit-age').val(dataset.age);
            $('#edit-birthday').val(dataset.birthday);
            $('#edit-address').val(dataset.address);
            $('#edit-student_number').val(dataset.student_number);
            $('#edit-campus').val(dataset.campus);
            $('#edit-username').val(dataset.username);
        })
        .fail(function (error) {
            console.log(error);
        }
    );
}

$('#delete-confirmation-btn').click(function() {
    $.ajax({
        url: "/crud/controllers/delete_record.php",
        method: "POST",
        headers: {
        },
        data: {
            data: {
                msg: 'delete record',
                record_id: $('#delete-hidden-box').val().substring($('#delete-hidden-box').val().indexOf('-') + 1),
            }
        },})
        .done(function(response) {
            console.log(response);
        })
        .fail(function (error) {
            console.log(error);
        }
    );
    clearTimeout(refresh_all_details());
    refresh_all_details();
});

$('#edit-confirmation-btn').click(function(e) {
    $("#error-edit-age").html("");
    $("#error-edit-username").html("");
    $("#error-edit-password").html("");
    e.preventDefault();
    let usernames = $('#edit-hidden-box').attr('class').split(" ");
    username_exists = false;
    for (username of usernames) {
        if(username == $('#edit-username').val().trim()) {
            $("#error-edit-username").html("Username already exists.");
            username_exists = true;
            break;
        }
    }

    if(Number($('#edit-age').val()) <= 3) {
        $("#error-edit-age").html("Age can be 4 years old and above.");
    } else if(Number($('#edit-age').val()) >= 80) {
        $("#error-edit-age").html("Age can be 80 years old and below.");
    } else if(String($('#edit-password').val()).trim().length < 8) {
        $("#error-edit-password").html("Password should be 8 characters or above.");
    } else if(username_exists != true) {

        let data = {
            id: $('#edit-hidden-box').attr('name'),
            fullname: $('#edit-fullname').val(),
            age: $('#edit-age').val(),
            birthday: $('#edit-birthday').val(),
            address: $('#edit-address').val(),
            student_number: $('#edit-student_number').val(),
            campus: $('#edit-campus').val(),
            username: $('#edit-username').val(),
            password: $('#edit-password').val(),
        }

        $.ajax({
            url: "/crud/controllers/edit_record.php",
            method: "POST",
            headers: {
            },
            data: {
                data: data,
                msg: 'update record',
            },})
            .done(function(response) {
                console.log(response);
            })
            .fail(function (error) {
                console.log(error);
            }
        );
        clearTimeout(refresh_all_details());
        refresh_all_details();
        $('#editRecordModal').modal('hide');
    }
});