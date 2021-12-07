@if(session('addedSuccessfully'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ session('addedSuccessfully')}}
    </div>

@endif
@if($errors->any())
    <div class="alert alert-warning" role="alert">
        <strong>Danger!</strong> {{$errors}}
    </div>
@endif
@if(session('deletedSuccessfully'))
    <div class="alert alert-danger" role="alert">
        <strong>Warning!</strong> {{ session('deletedSuccessfully')}}
    </div>
@endif
