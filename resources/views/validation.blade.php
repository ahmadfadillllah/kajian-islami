@error('username')
    <div class="card-body">
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <p class="mb-0">{{ $message }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@enderror

@error('name')
    <div class="card-body">
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <p class="mb-0">{{ $message }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@enderror

@error('email')
    <div class="card-body">
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <p class="mb-0">{{ $message }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@enderror

@error('password')
    <div class="card-body">
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <p class="mb-0">{{ $message }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@enderror

@error('password_confirmation')
    <div class="card-body">
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <p class="mb-0">{{ $message }}</p>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@enderror
