    <!-- Modal -->
  <div class="modal fade" id="myDashboardModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
              <h4 class="modal-title text-primary">Change Service Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
        </div>
        <div class="modal-body">
                <input type="hidden" id="status_id">
                <input type="hidden" id="status_val">
                <label class="radio-inline statusRadio">
                    <input type="radio" name="status" value="1" id="completed">Completed</label>
                <label class="radio-inline statusRadio">
                    <input type="radio" value="2" name="status" id="onhold">On Hold</label>
                <label class="radio-inline statusRadio">
                    <input type="radio" value="0" name="status" id="pending">Pending</label> 

                    <div class="form-group">
                    <label>Note</label>
                    <textarea cols="5" rows="5" name="note" id="noteStatus" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" id="statusButton">Submit</button>
                </div>

        </div>
      </div>
      
    </div>
  </div>