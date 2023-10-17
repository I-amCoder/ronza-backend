<h4 class="text-dark">Common Settings</h4>
<div class="row">
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="site_name" class="from-lable">Site Name</label>
        <input type="text" id="site_name" name="site_name" class="form-control @error('site_name') is-invalid @enderror"
            placeholder="Enter Site name...." value="{{ $site->site_name }}">
        @error('site_name')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="email" class="from-lable">Site Email</label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
            placeholder="Enter Site Email...." value="{{ $site->email }}">
        @error('email')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="address" class="from-lable">Address</label>
        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"
            placeholder="Enter Address...." value="{{ $site->address }}">
        @error('address')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="phone" class="from-lable">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
            placeholder="Enter Phone...." value="{{ $site->phone }}">
        @error('phone')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6 col-lg-4 mb-3">
        <label for="currency" class="from-lable">Site Currency</label>
        <input type="text" id="currency" name="currency"
            class="form-control @error('currency') is-invalid @enderror" placeholder="e.g., USD"
            value="{{ $site->currency }}">
        @error('currency')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="currency_symbol" class="from-lable">Currency Symbol</label>
        <input type="text" id="currency_symbol" name="currency_symbol"
            class="form-control @error('currency_symbol') is-invalid @enderror" placeholder="e.g., $"
            value="{{ $site->currency_symbol }}">
        @error('currency_symbol')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
