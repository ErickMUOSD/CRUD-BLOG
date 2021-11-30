<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name</label>
                        <input type="text" name="name" class="form-control" id="name">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Email</label>
                        <input type="email" name="email" class="form-control" id="email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Password</label>
                        <input type="password" name="password" class="form-control" id="password">

                    </div>
                    <label for=""> Rol</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="cliente" value="Administrador"
                               checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Admnistrador
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" id="cliente" value="Cliente">
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
