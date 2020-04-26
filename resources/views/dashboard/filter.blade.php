 <!-- Modal -->
  <div class="modal fade" id="myFilterModal" role="dialog">
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
          <form role="form" method="post" action="{{route('dashboard.datewisefind')}}">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label for="date_to">Date To *</label>
                    <input type="text" name="date_to" class="form-control datepicker" id="date_to">
                  </div>

                  <div class="form-group">
                    <label for="date_from">Date From *</label>
                    <input type="text" name="date_from" class="form-control datepicker" id="date_from">
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                      <option value="1" selected>Completed</option>
                      <option value="2" >On Hold</option>
                      <option value="0" >Pending</option>
                    </select>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Find</button>
                </div>
              </form>
        </div>
       
      </div>
      
    </div>
  </div>