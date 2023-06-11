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
        <label for="title" class="from-lable">Site Title</label>
        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="Enter Site Title...." value="{{ $site->title }}">
        @error('title')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-4 mb-3">
        <label for="description" class="from-lable">Site Description</label>
        <input type="text" id="description" name="description"
            class="form-control @error('description') is-invalid @enderror" placeholder="Enter Site Description...."
            value="{{ $site->description }}">
        @error('description')
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
        <label for="store_link" class="from-lable">Store Link</label>
        <input type="url" id="store_link" name="store_link"
            class="form-control @error('store_link') is-invalid @enderror" placeholder="Enter Store Link...."
            value="{{ $site->store_link }}">
        @error('store_link')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
