<!-- Modal -->
<div class="modal fade" id="modal-update-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  action="{{ route('user.update', $user) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name</label>
                        <input type="text" name="name" class="form-control" id="name"  value="{{$user->name}}">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">

                    </div>
                    <div class="form-group">

                        <label for="exampleInputEmail1"> Password</label>
                        <input type="password" name="password" class="form-control" id="password"  >
                        <small id="emailHelp" class="form-text text-muted">if the password will not change leave it in blank</small>
                    </div>
                    <label for=""> Rol</label>



                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="rol" id="cliente" value="Administrador"
                        {{($user->rol == 'Administrador' ? 'checked' : '')}}>
                        <label class="form-check-label" for="exampleRadios1">
                            Admnistrador
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="cliente" value="Cliente"  {{($user->rol == 'Cliente' ? 'checked' : '')}}>
                        <label class="form-check-label" for="exampleRadios2">
                            Cliente
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
