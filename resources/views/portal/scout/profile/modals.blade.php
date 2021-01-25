<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 justify-content-center">
          <form id="changePassword">
            <div class="form-row">     
              <div class="form-group col-lg col-12">
                <label for="currentPassword" class="col-form-label text-center w-100">Current Password *</label>
                <small id="InputCurrentPasswordHelp" class="form-text text-center">Enter Current Password</small>
                <input type="password" class="form-control form-control-sm" id="currentPassword" name="currentPassword"/>
                <span class="invalid-feedback" id="error-currentPassword" role="alert"></span>
              </div> 
              <div class="form-group col-lg col-12">
                <label for="newPassword" class="col-form-label text-center w-100">New Password *</label>
                <small id="InputNewPasswordHelp" class="form-text text-center">Enter New Password</small>
                <input type="password" class="form-control form-control-sm" id="newPassword" name="newPassword"/>
                <span class="invalid-feedback" id="error-newPassword" role="alert"></span>
              </div> 
              <div class="form-group col-lg col-12">
                <label for="reNewPassword" class="col-form-label text-center w-100">Re-Type Password *</label>
                <small id="InputReNewPasswordHelp" class="form-text text-center">Re-Type New Password</small>
                <input type="password" class="form-control form-control-sm" id="reNewPassword" name="reNewPassword"/>
                <span class="invalid-feedback" id="error-reNewPassword" role="alert"></span>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload();">Close</button>
        <button id="btnChangePassword" class="btn btn-outline-primary" onclick="update_password()">
        Change Password
        <span id="spinnerPassword" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </div>
</div>