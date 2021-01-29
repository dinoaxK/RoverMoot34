<!--application Modal -->
<div class="modal fade" id="createNewsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form id="createNewsForm">
          <div class="form-row justify-content-center">
            <div class="form-group col-md-12 mb-5">
                <div class="drop-zone" id="applicationProof">
                    <span class="drop-zone__prompt text-success">Upload your Scanned Application *<br><small>Drop image File here or click to upload</small> </span>
                    <input accept="image/*" type="file" name="image"  class="drop-zone__input"/>
                </div>
                <span id="image-err" class="invalid-feedback text-center" role="alert"></span>
            </div>
          </div>  
        </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
        <button type="button" class="btn btn-primary" onclick="create_news()">Save changes</button>
      </div>
    </div>
  </div>
</div>
