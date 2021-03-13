<!--application Modal -->
<div class="modal fade" id="ApplicationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Application Proof</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-6">
               <button class="btn btn-lg btn-success w-100 approve">Approve</button>
           </div>
           <div class="col-6">                
               <button class="btn btn-lg btn-danger w-100 decline">Decline</button>
           </div>
        </div>  
        <div class="row">
            <div class="col-12">            
                <img id="applicationImage" src="" width="100%" alt="Application">
            </div>
        </div>  
        <div class="row">
            <div class="col-6">
                <button class="btn btn-lg btn-success w-100 approve">Approve</button>
            </div>
            <div class="col-6">                
                <button class="btn btn-lg btn-danger w-100 decline">Decline</button>
            </div>
        </div>   
      </div>
    </div>
  </div>
</div>


<!--payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Application Proof</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <button class="btn btn-lg btn-success w-100 approve">Approve</button>
            </div>
            <div class="col-6">                
                <button class="btn btn-lg btn-danger w-100 decline">Decline</button>
            </div>
        </div>  
        <div class="row">
            <div class="col-12">             
                <img id="paymentImage" src="" width="100%" alt="Payment">
            </div>
        </div>  
        <div class="row">
            <div class="col-6">
                <button class="btn btn-lg btn-success w-100 approve">Approve</button>
            </div>
            <div class="col-6">                
                <button class="btn btn-lg btn-danger w-100 decline">Decline</button>
            </div>
        </div>    
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
                <label for="name-email">Name</label>
                <input type="text" class="form-control form-control-sm" name="name-email" id="name-email" aria-describedby="nameHelp"/>
                <small id="nameHelp" class="form-text text-muted">Enter Name Here</small>
            </div>
            <div class="form-group col">
              <label for="nic-email">NIC</label>
              <input type="text" class="form-control form-control-sm" name="nic-email" id="nic-email" aria-describedby="nicHelp"/>
              <small id="nicHelp" class="form-text text-muted">Enter NIC Here</small>
            </div>               
            <div class="form-group col">
              <label for="application-email">Application Status</label>
              <select id="application-email" name="application-email" class="form-control form-control-sm">
                <option value="">select here---</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Declined</option>
              </select>
            </div>              
            <div class="form-group col">
              <label for="payment-email">Payment Status</label>
              <select id="payment-email" name="payment-email" class="form-control form-control-sm">
                <option value="">select here---</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Declined</option>
              </select>
            </div>              
            <div class="form-group col">
              <label for="registration-email">Registration Status</label>
              <select id="registration-email" name="registration-email" class="form-control form-control-sm">
                <option value="">select here---</option>
                <option value="0">Pending</option>
                <option value="1">Application Submit</option>
                <option value="2">Verification Submit</option>
                <option value="3">Registered</option>
              </select>
            </div> 
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="nic-email">Subject</label>
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