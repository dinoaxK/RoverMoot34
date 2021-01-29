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
