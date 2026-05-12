<div class="card card-action border-top-bottom mt-5">
   <div class="card-header border-bottom py-3 -mb-5 d-flex justify-content-between align-items-center">
      <h6 class="mb-0 text-capitalize">
         <span class="icon-sm icon-base ti tabler-notebook-off iconmrgn"></span> Maintenance More
      </h6>
       {!! card_action_element() !!}
   </div>
   <div class="collapse -show">
      <div class="card-body">
         <div class="row g-6 mt-1">
            <div class="col-md-6">
               <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="active">
                     <input name="mode" class="form-check-input" type="radio" value="1" id="active">
                     <div class="custom-option-header">
                        <div class="h6 mb-0">Active</div>
                     </div>
                  </label>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="inactive">
                     <input name="mode" class="form-check-input" type="radio" value="0" id="inactive">
                     <div class="custom-option-header">
                        <div class="h6 mb-0">Inactive</div>
                     </div>
                  </label>
               </div>
            </div>
            <div class="col-md-12">
               <input type="text" id="maintenance_title" name="maintenance_title" placeholder="Enter maintenance title..." class="form-control">
            </div>
            <div class="col-md-12">
               <input class="form-control" type="file" name="maintenance_image" id="maintenance_image">
                <input type="hidden" name="delete_img[maintenance_image]" value="0" class="delete_img">
               <div class="d-flex justify-content-center">
                  <button type="button" class="btn btn-sm btn-danger waves-effect waves-light mt-2">
                     Remove Feature Image
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
