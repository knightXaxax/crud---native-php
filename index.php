<?php
include 'pages/header.php';
if(isset($_SESSION))
    session_destroy();
?>
<title>Crud Functions | Students</title>

<div class="container-fluid">
    <div class="row content justify-content-center">
        <div class="col-lg-6 col-md-9 col-sm-12 col-xs-4 jumbotron bg-info border border-muted rounded-lg shadow-sm mt-4 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-9">
                        <legend class="text-white">Students Information</legend>
                        <hr class="bg-white">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row content">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div id="student-details-container" class="row justify-content-center"></div>
        </div>
    </div>
</div>


<?php
include 'modals/edit_record_modal.php';
include 'modals/delete_record_modal.php';
include 'pages/footer.php';
?>