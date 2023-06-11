<h4>Social Links</h4>

<div class="row">
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="facebook" class="from-lable">Facebook</label>
        <input type="url" id="facebook" name="facebook" class="form-control @error('facebook') is-invalid @enderror"
            placeholder="Enter Facebook Link...." value="{{ $site->facebook }}">
        @error('facebook')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="twitter" class="from-lable">Twitter</label>
        <input type="url" id="twitter" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
            placeholder="Enter Twitter Link...." value="{{ $site->twitter }}">
        @error('twitter')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="instagram" class="from-lable">Instagram</label>
        <input type="url" id="instagram" name="instagram"
            class="form-control @error('instagram') is-invalid @enderror" placeholder="Enter Instagram Link...."
            value="{{ $site->instagram }}">
        @error('instagram')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="pinterest" class="from-lable">Pinterest</label>
        <input type="url" id="pinterest" name="pinterest"
            class="form-control @error('pinterest') is-invalid @enderror" placeholder="Enter Pinterest Link...."
            value="{{ $site->pinterest }}">
        @error('pinterest')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="youtube" class="from-lable">Youtube</label>
        <input type="url" id="youtube" name="youtube" class="form-control @error('youtube') is-invalid @enderror"
            placeholder="Enter Youtube Link...." value="{{ $site->youtube }}">
        @error('youtube')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
