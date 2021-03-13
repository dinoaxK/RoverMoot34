<!--application Modal -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Create User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <p class=" text-dark">Fields Marked with (*) are Mandatory.</p>
        <form id="createUserForm">
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <label for="name" class="col-form-label text-dark">Name *</label>    
                <input value="" id="name" type="text" class="form-control text-capitalize" name="name">
                <span id="name-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <label for="email" class="col-form-label text-dark">email *</label>    
                <input value="" id="email" type="text" class="form-control" name="email">
                <span id="email-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <label for="password" class="col-form-label text-dark">Password *</label>    
                <input value="" id="password" type="text" class="form-control" name="password">
                <span id="password-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <label for="reTypePassword" class="col-form-label text-dark">Re-Type Password *</label>    
                <input value="" id="reTypePassword" type="text" class="form-control" name="reTypePassword">
                <span id="reTypePassword-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>          
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <label for="role" class="col-form-label text-dark">Account Type *</label>    
                <select name="role" id="" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="super_admin">Super-Admin</option>
                </select>
                <span id="role-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>
        </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
        <button type="button" class="btn btn-primary" onclick="create_user()">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--edit Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <p class=" text-dark">Fields Marked with (*) are Mandatory.</p>
        <form id="editUserForm"> 
          <input value="" name="editUserId" id="editUserId" type="text" class="form-control text-capitalize">  
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <label for="editRole" class="col-form-label text-dark">Account Type *</label>    
                <select name="editRole" id="editRole" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="super_admin">Super-Admin</option>
                  <option value="scout">Scout</option>
                </select>
                <span id="editRole-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>
        </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
        <button type="button" class="btn btn-primary" onclick="update_user()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Send Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <form id="emailForm">
          <div class="form-row">            
            <div class="form-group col">
              <label for="registrationemail">Registration Status</label>
              <select id="registrationemail" name="registrationemail" class="form-control form-control-sm">
                <option value="">select here---</option>
                <option value="4">Haven't Start filling</option>
                <option value="0">Pending</option>
                <option value="1">Application Submit</option>
                <option value="2">Verification Submit</option>
                <option value="3">Registered</option>
              </select>
            </div> 
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" aria-describedby="nicHelp" required/>
              <span id="subject-err" class="invalid-feedback text-center" role="alert"></span>           
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <textarea class="form-control" id="emailBody" name="emailBody" required></textarea>
              <span id="emailBody-err" class="invalid-feedback text-center" role="alert"></span> 
            </div>
          </div>
        </form>   
      </div>
      <div class="modal-footer">
        <button id="btnSendEmail" class="btn btn-success" onclick="send_email()">
          <i class="fa fa-envelope"></i>
          Send
          <span id="emailSpinner" class="spinner-border spinner-border-sm d-none " role="status" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>
</div>
