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
                <label for="nameemail">Name</label>
                <input type="text" class="form-control form-control-sm" name="nameemail" id="nameemail" aria-describedby="nameHelp"/>
                <small id="nameHelp" class="form-text text-muted">Enter Name Here</small>
            </div>
            <div class="form-group col">
              <label for="nicemail">NIC</label>
              <input type="text" class="form-control form-control-sm" name="nicemail" id="nicemail" aria-describedby="nicHelp"/>
              <small id="nicHelp" class="form-text text-muted">Enter NIC Here</small>
            </div>               
            <div class="form-group col">
              <label for="applicationemail">Application Status</label>
              <select id="applicationemail" name="applicationemail" class="form-control form-control-sm">
                <option value="">select here---</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Declined</option>
              </select>
            </div>    
            <div class="form-group col">
              <label for="districtemail">District</label>
              <select id="districtemail" name="districtemail" class="form-control form-control-sm">
                <option value="">select here---</option>
                @foreach($districts as $district)                                          
                <option value="{{ $district->name }}">{{ $district->name }}</option>
                @endforeach
              </select>
            </div> 
            <div class="form-group col">
              <label for="countryemail">Country</label>
              <select id="countryemail" name="countryemail" class="form-control form-control-sm">
                <option value="">select here---</option>
                @foreach($countries as $country)                                          
                <option value="{{ $country->country }}">{{ $country->country }}</option>
                @endforeach
              </select>
            </div>               
            <div class="form-group col">
              <label for="paymentemail">Payment Status</label>
              <select id="paymentemail" name="paymentemail" class="form-control form-control-sm">
                <option value="">select here---</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Declined</option>
              </select>
            </div>              
            <div class="form-group col">
              <label for="registrationemail">Registration Status</label>
              <select id="registrationemail" name="registrationemail" class="form-control form-control-sm">
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