$(document).ready(function() {
    refresh_all_details();
});

let refresh_all_details = () => {
    $.ajax({
        url: "/crud/controllers/load_details.php",
        method: "POST",
        headers: {
        },
        data: {
            msg: 'get all info',
        },})
        .done(function(response) {
            let dataset = JSON.parse(atob(atob(JSON.parse(response)['data'])))

            let mapped_dataset = dataset.map(data => {
               return `<div class="card col-lg-12 col-md-9 col-sm-6 col-xs-4 mb-1">
                    <div class="card-body">
                        <h5 class="card-title">${data.fullname}</h5>
                        <hr>
                        <p class="card-text"><em>Age:</em> ${data.age}</p>
                        <p class="card-text"><em>Birthday:</em> ${data.birthday}</p>
                        <p class="card-text"><em>Address:</em> ${data.address}</p>
                        <p class="card-text"><em>Student number:</em> ${data.student_number}</p>
                        <p class="card-text"><em>Campus:</em> ${data.campus}</p>
                        <p class="card-text"><em>Email:</em> ${data.username}</p>
                        <button id="delete-${data.id}" onclick="delete_btn(event)" class="delete-btn btn btn-outline-danger float-right ml-2 px-4" data-toggle="modal" data-target="#deleteRecordModal">Delete</button>
                        <button id="edit-${data.id}" onclick="edit_btn(event)" class="edit-btn btn btn-outline-primary float-right px-4"  data-toggle="modal" data-target="#editRecordModal">Edit</button>
                    </div>
                </div>`;
            });
            $('#student-details-container').html("");
            $('#student-details-container').append(mapped_dataset);
        })
        .fail(function (error) {
            console.log(error);
        }
    );
    setTimeout(refresh_all_details, 10000);
};