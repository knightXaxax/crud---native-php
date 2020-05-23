
<form action="#" class="modal fade" id="editRecordModal" tabindex="-1" role="dialog" aria-labelledby="editRecordModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="editRecordModalTitle">Update Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" class=" text-white">
          <span aria-hidden="true" class=" text-white">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <fieldset class="form-group">
            <label for="fullname" class="form-control-label">fullname**</label><small class="text-muted"> ( Surname, Firstname Middlename )</small>
            <input type="text" name="fullname" id="edit-fullname" class="form-control form-control-lg" required>
        </fieldset>

        <fieldset class="form-group">
            <label for="age" class="form-control-label">age**</label>
            <input type="number" name="age" id="edit-age" class="form-control form-control-lg" required minlength="3">
            <small id="error-edit-age" class="text-danger ml-2"></small>
        </fieldset>

        <fieldset class="form-group">
            <label for="birthday" class="form-control-label">birthday**</label><small class="text-muted"> ( yyyy-mm-dd )</small>
            <input type="date" name="birthday" id="edit-birthday" class="form-control form-control-lg" required minlength="10">
        </fieldset>

        <fieldset class="form-group">
            <label for="address" class="form-control-label">address**</label>
            <input type="text" name="address" id="edit-address" class="form-control form-control-lg" required>
        </fieldset>

        <fieldset class="form-group">
            <label for="student_number" class="form-control-label">student number**</label>
            <input type="number" name="student_number" id="edit-student_number" class="form-control form-control-lg" required>
        </fieldset>

        <fieldset class="form-group">
            <label for="campus" class="form-control-label">campus**</label>
            <input type="text" name="campus" id="edit-campus" class="form-control form-control-lg" required>
        </fieldset>

        <fieldset class="form-group">
            <label for="username" class="form-control-label">username**</label>
            <input type="email" name="username" id="edit-username" class="form-control form-control-lg" required>
            <small id="error-edit-username" class="text-danger ml-2"></small>
        </fieldset>

        <fieldset class="form-group">
            <label for="password" class="form-control-label">password**</label><small class="text-muted"> ( minimum of 8 characters )</small>
            <input type="password" name="password" id="edit-password" class="form-control form-control-lg" required minlength="8">
            <small id="error-edit-password" class="text-danger ml-2"></small>
            <input type="number" name="" id="edit-hidden-box" hidden value="">
        </fieldset>
      </div>

      <div class="modal-footer">
        <button type="submit" id="edit-confirmation-btn" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</form>