 <!-- Add Category Modal-->
 <div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('category.store') }}" id="add-category-from" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                         <div class="col-12">
                             <label for="title" class="form-label">Category Name</label>
                             <input type="text" class="form-control" name="name" placeholder="Category name...">
                         </div>

                         <div class="col-12 mt-3">
                             <label for="title" class="form-label">Category Title</label>
                             <input type="text" class="form-control" name="title" placeholder="Category title...">
                         </div>
                         <div class="col-12 text-center mt-3">
                             <label class="form-control-label" for="input-name">Logo</label>
                             <div class="text-center">
                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                     <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                         style="width: 200px;">
                                     </div>
                                     <div>
                                         <span class="btn btn-outline-secondary btn-file">
                                             <span class="fileinput-new">{{ __('Select image') }}</span>
                                             <span class="fileinput-exists">{{ __('Change') }}</span>


                                             <input type="file" name="logo"
                                                 accept="image/x-png,image/gif,image/jpeg">
                                         </span>
                                         <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                             data-dismiss="fileinput">{{ __('Remove') }}</a>
                                     </div>
                                 </div>


                             </div>
                             @if ($errors->has('image'))
                                 <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
                             @endif

                         </div>
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <button class="btn btn-primary"
                     onclick="document.getElementById('add-category-from').submit()">Save</button>
             </div>
         </div>
     </div>
 </div>
