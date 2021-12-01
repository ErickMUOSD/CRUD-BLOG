@extends('layouts.app')
@section('content')
    @include('layouts.headers.global')

    <div class="row justify-content-md-center m-4">
        <div class="col-md-8 ">
            <div class="card h-100">
                <div class="card-body ">
                    <h2 style="color:#0762c9">Add new Article</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="Write the title here!">
                    </div>
                    <div ck-blurred ck-editor__editable ck-rounded-corners ck-editor__editable_inline id="editor"></div>
                    <style>
                        .ck-editor__editable_inline {
                            min-height: 400px;
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="col align-items-end">
            <div class="card m-2 ">
                <div class="card-body p-2 ">
                    <p class="font-weight-bold">Post article</p>
                        <div class="d-flex justify-content-between" >
                            <button type="button" class="btn btn-primary btn-sm">Save Craft</button>
                            <button type="button" class="btn btn-primary btn-sm">Preview</button>
                        </div>
                   <div class="container m-2 p-0 ">
                       <p class="font-weight-normal mb--1">Status:  <strong>Craft</strong></p>
                       <p class="font-weight-normal mb--1">Visibility <strong>Public</strong></p>
                       <p class="font-weight-normal mb--1">Post <strong>Now</strong></p>
                   </div>
                    <div class="d-flex justify-content-end" >
                    <button type="button" class="btn btn-primary btn-sm">Post article</button>
                    </div>
                </div>
            </div>
            <div class="card  m-2">
                <div class="card-body">
                    <h5>Buscar usuario </h5>
                    <div id="alert" class="  mt-2 mb-2" style="  display: none; ">
                        <i id="alert-icon-back" class="" style="color: white; padding:  5px ;"></i>
                        <h5 id="alert-text" style="color: white; padding: 5px; margin: 0"></h5>
                    </div>
                    <form id="form-user" class="row g-3" action="#">
                        <div class="col-md-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input placeholder="Nombre del usuario" type="text" name="nombre" id="nombre"
                                   class="form-control" required maxlength="30" minlength="5">
                        </div>
                        <div class="col-md-4">
                            <label for="correo" class="form-label">Correo</label>
                            <input placeholder="example@email.com" type="email" name="correo" class="form-control"
                                   id="correo" required minlength="5" maxlength="30">
                        </div>
                        <div class="col-md-4">
                            <label for="numero_celular" class="form-label">Número de celular</label>
                            <input placeholder="722801...." type="text" name="numero_celular" class="form-control"
                                   id="numero_celular" required minlength="10" maxlength="10">
                        </div>

                        <div class="col-12">
                            <button type="submit" class=" btn btn-secondary-form "><span class="material-icons">
                                        search
                                    </span>Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {})
            .catch(error => {
                console.error(error);
            });


    </script>

@endsection
