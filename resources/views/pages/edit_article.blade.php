@extends('layouts.app')
@section('content')
@include('layouts.headers.global')


<form action="{{ route('article.update',$articleData['id'],$articleData['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="row justify-content-md-center m-4">


            <div class="col-md-8 ">
                <div class="card h-100">
                    <div class="card-body ">
                        <h2> Add New Article</h2>
                        <div class="form-group">
                            <input value="{{$articleData['title']}}" name="title" type="text" class="form-control" id="exampleFormControlInput1"
                                   placeholder="Write the title here!" required>
                        </div>
                        <textarea  name="body"id="editor" >
                            {{$articleData['body'] }}
                        </textarea>
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

                        <h3 >{{!empty($articleData) ? 'Update Article ': 'Post Article'}}</h3>
                        <div class="container m-2 p-0 ">

                            <p class="font-weight-normal m-1"> <i class="far fa-calendar-alt"></i> Post:  <strong>Now</strong> <button type="button" class="btn btn-outline-primary btn-sm">Edit</button></p>
                            <p class="font-weight-normal m-1">  <i class="fas fa-key"></i> Status <strong>Craft</strong> <button type="button" class="btn btn-outline-primary btn-sm">Edit</button></p>
                            <p class="font-weight-normal m-1">  <i class="fas fa-eye"></i> Visibility:  <strong>Public</strong> <button type="button" class="btn btn-outline-primary btn-sm">Edit</button></p>

                        </div>
                        <hr>
                            <button type="submit" class="btn btn-primary ">{{!empty($articleData) ? 'Save Article ': 'Post Article'}}</button>

                    </div>
                </div>
                <div class="card  m-2">
                    <div class="card-body">
                        <p class="font-weight-bold">Select a category for the article</p>


                        <select name="category_id" class="form-control">
                            @foreach($data as $category)
                                <option
                                        value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="card  m-2">
                    <div class="card-body".>
                        <p class="font-weight-bold">Select an image to upload </p>


                        <img id="blah" style="max-width:200px;" src="{{!empty($articleData) ? url('/images/'.$articleData[0]['name']): 'http://placehold.it/180'}} " alt="your image" />
                        <input type='file'  name="image" class="form-control"  onchange="readURL(this);"  />
                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#blah')
                                            .attr('src', e.target.result);
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
    </div>
</form>

    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {})
            .catch(error => {
                console.error(error);
            });


    </script>

@endsection
