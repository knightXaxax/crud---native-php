<?
session_start();
?>
<form action="controllers/register.php" method="POST" class="border border-muted rounded-lg shadow-sm bg-white">

    <fieldset class="form-group bg-info">
        <legend class="py-3 px-3 bg-info text-white px-3">
            Register student information here
        </legend>
    </fieldset>

    <div class="px-5">
        <fieldset class="form-group">
            <label for="fullname" class="form-control-label">fullname**</label><small class="text-muted"> ( Surname, Firstname Middlename )</small>
            <input type="text" name="fullname" id="fullname" class="form-control form-control-lg" required value="<?php
                if(isset($_SESSION['data']['fullname'])) {
                    echo $_SESSION['data']['fullname'];
                }
            ?>">
        </fieldset>

        <fieldset class="form-group">
            <label for="age" class="form-control-label">age**</label>
            <input type="number" name="age" id="age" class="form-control form-control-lg" required minlength="3" value="<?php
                if(isset($_SESSION['data']['age']) && !isset($_GET['error_age_range_down'])) {
                    echo $_SESSION['data']['age'];
                }
            ?>">
            <small class="text-danger pl-1">
                <?php 
                    if(isset($_GET['error_age_range_down'])) {
                        echo "Age can be 4 years old and above.";
                    } elseif(isset($_GET['error_age_range_up'])) {
                        echo "Age can be 80 years old and below.";
                    }
                ?>
            </small>
        </fieldset>

        <fieldset class="form-group">
            <label for="birthday" class="form-control-label">birthday**</label><small class="text-muted"> ( yyyy-mm-dd )</small>
            <input type="date" name="birthday" id="birthday" class="form-control form-control-lg" required minlength="10" value="<?php
                if(isset($_SESSION['data']['birthday'])) {
                    echo $_SESSION['data']['birthday'];
                }
            ?>">
        </fieldset>

        <fieldset class="form-group">
            <label for="address" class="form-control-label">address**</label>
            <input type="text" name="address" id="address" class="form-control form-control-lg" required value="<?php
                if(isset($_SESSION['data']['address'])) {
                    echo $_SESSION['data']['address'];
                }
            ?>">
        </fieldset>

        <fieldset class="form-group">
            <label for="student_number" class="form-control-label">student number**</label>
            <input type="number" name="student_number" id="student_number" class="form-control form-control-lg" required value="<?php
                if(isset($_SESSION['data']['student_number']) && !isset($_GET['error_invalid_stud_num'])) {
                    echo $_SESSION['data']['student_number'];
                }
            ?>">
        </fieldset>

        <fieldset class="form-group">
            <label for="campus" class="form-control-label">campus**</label>
            <input type="text" name="campus" id="campus" class="form-control form-control-lg" required value="<?php
                if(isset($_SESSION['data']['campus'])) {
                    echo $_SESSION['data']['campus'];
                }
            ?>">
        </fieldset>

        <fieldset class="form-group">
            <label for="username" class="form-control-label">username**</label>
            <input type="email" name="username" id="username" class="form-control form-control-lg" required value="<?php
                if(isset($_SESSION['data']['username'])) {
                    echo $_SESSION['data']['username'];
                }
            ?>">
            <small class="text-danger pl-1">
                <?php 
                    if(isset($_GET['error_email_exists'])) {
                        echo "Username already exists.";
                    }
                ?>
            </small>
        </fieldset>

        <fieldset class="form-group">
            <label for="password" class="form-control-label">password**</label><small class="text-muted"> ( minimum of 8 characters )</small>
            <input type="password" name="password" id="password" class="form-control form-control-lg" required minlength="8">
            <small class="text-danger pl-1">
                <?php 
                    if(isset($_GET['error_pass_len'])) {
                        echo "Password should be 8 characters or above.";
                    }
                ?>
            </small>
        </fieldset>

        <fieldset class="form-group">
            <label for="confirm_password" class="form-control-label">confirmpassword**</label><small class="text-muted"> ( minimum of 8 characters )</small>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" required minlength="8">
            <small class="text-danger pl-1">
                <?php 
                    if(isset($_GET['error_pass_not_match'])) {
                        echo "Password does not match.";
                    }
                ?>
            </small>
        </fieldset>

        <fieldset class="form-group">
            <button type="submit" name="register" class="btn btn-outline-success float-right my-2">Register</button>
        </fieldset>
    </div>
</form>