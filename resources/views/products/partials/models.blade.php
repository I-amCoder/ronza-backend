  <!-- Modal -->
  <div class="modal fade" id="updateStockModal" tabindex="-1" role="dialog" aria-labelledby="updateStockModalTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="updateStockModalTitle">Update available stock</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('product.stock.update') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-12">
                              <label for="quantity" class="form-label">Quantity</label>
                              <input type="hidden" name="p_id">
                              <input type="number" class="form-control @error('quantity') is-invliad @enderror"
                                  name="quantity" required>
                              @error('quantity')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="cloneProductModal" tabindex="-1" role="dialog" aria-labelledby="cloneProductModalTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="cloneProductModalTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('product.clone') }}" method="POST">
                <input type="hidden" name="clone_id">
                  @csrf
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-12">
                              <div class="form-group form-check">
                                  <input name="clone_image" type="checkbox" class="form-check-input" id="cloneImages">
                                  <label class="form-check-label" for="cloneImages">Clone Images</label>
                              </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group form-check">
                                <input name="clone_size" type="checkbox" class="form-check-input" id="cloneSizes">
                                <label class="form-check-label" for="cloneSizes">Clone Sizes</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-check">
                                <input name="clone_color" type="checkbox" class="form-check-input" id="cloneColors">
                                <label class="form-check-label" for="cloneColors">Clone Colors</label>
                            </div>
                        </div>

                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Clone Now</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
