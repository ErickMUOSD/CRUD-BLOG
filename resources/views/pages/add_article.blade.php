@extends('layouts.app')
@section('content')
    @include('layouts.headers.global')

    <div class="row justify-content-md-center m-4">
        <div class="col-md-8 ">
            <div class="card h-100">
                <div class="card-body ">
                    <h2> Add New Article</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="Write the title here!">
                    </div>
                    <div ck-blurred ck-editor__editable ck-rounded-corners ck-editor__editable_inline id="editor"></div>
                    <style>
                        .ck-editor__editable_inline {
                            min-height: 400px;

                        }
                        hr {
                            margin-top: 0;
                            margin-bottom: 5px;
                            border: 0;
                            border-top: 1px solid rgba(0, 0, 0, 0.1);
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="col align-items-end">

            <div class="card  m-2">
                <div class="card-body p-2 ">

                    <h3 >Post Article</h3>
                    <div class="container m-2 p-0 ">

                        <p class="font-weight-normal m-1"> <i class="far fa-calendar-alt"></i> Post:  <strong>Now</stron> <button type="button" class="btn btn-outline-primary btn-sm">Edit</button></p>
                        <p class="font-weight-normal m-1">  <i class="fas fa-key"></i> Status <strong>Craft</stron> <button type="button" class="btn btn-outline-primary btn-sm">Edit</button></p>
                        <p class="font-weight-normal m-1">  <i class="fas fa-eye"></i> Visibility:  <strong>Public</stron> <button type="button" class="btn btn-outline-primary btn-sm">Edit</button></p>

                    </div>
                    <hr>
                    <div class="d-flex justify-content-end" >

                        <button type="button" class="btn btn-primary ">Post article</button>
                    </div>
                </div>
            </div>
            <div class="card  m-2">
                <div class="card-body".>
                    <p class="font-weight-bold">Select a category for the article</p>


                    <select class="form-control">
                        @foreach($data as $category)
                            <option id="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
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
