
<div class="modal fade" id="deleteRecordModal" tabindex="-1" role="dialog" aria-labelledby="deleteRecordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="deleteRecordModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="text-white">
        <span aria-hidden="true" class=" text-light">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <legend>Are you sure you want to delete this record?</legend>
        <input type="text" name="" id="delete-hidden-box" hidden>
      </div>
      
      <div class="modal-footer">
        <button type="button" id="delete-confirmation-btn" class="btn btn-danger" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>