@extends('layouts.app')

@section('content')

    @include('layouts.headers.global')

    <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            @if(session('addedSuccessfully'))

                                <div class="alert alert-success" role="alert">
                                    <strong>Success!</strong> Category added
                                </div>

                            @endif

                            @if($errors->any())
                                <div class="alert alert-warning" role="alert">
                                    <strong>Danger!</strong> Introduce a valid name category
                                </div>
                            @endif
                            @if(session('deletedSuccessfully'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning!</strong> Category was deleted successfully
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <h3 class="mb-0">Light table</h3>

                                <button data-toggle="modal" data-target="#exampleModal" class="btn alert-primary">Add
                                    new category
                                </button>
                            </div>

                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Category</th>
                                    <th scope="col" class="sort" data-sort="budget">Id</th>
                                    <th scope="col" class="sort" data-sort="status">Name</th>
                                    <th scope="col">Action</th>

                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">


                                @foreach($data as $category)


                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Category</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$category->id}}
                                        </td>
                                                <td>
                                      <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status">{{$category->name}}</span>
                                      </span>
                                        </td>


                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a data-toggle="modal" data-target="#modal-update-{{$category->id}}"
                                                       class="dropdown-item"
                                                       href="{{route('category.update',$category->id)}}">Editar</a>

                                                    <form action="{{ route('category.destroy', $category) }}"
                                                          method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="dropdown-item" href="#">Eliminar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('alerts.category.update')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                    {{--                {{ $data->links() }}--}}
                    <!-- Card footer -->
                        <div class="card-footer py-4">

                            {{--                        <nav aria-label="...">--}}

                            {{--                            <ul class="pagination justify-content-end mb-0">--}}

                            {{--                                <li class="page-item disabled">--}}
                            {{--                                    <a class="page-link" href="#" tabindex="-1">--}}
                            {{--                                        <i class="fas fa-angle-left"></i>--}}
                            {{--                                        <span class="sr-only">Previous</span>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                               --}}
                            {{--                                <li class="page-item active">--}}
                            {{--                                    <a class="page-link" href="#">1</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="page-item">--}}
                            {{--                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--                                <li class="page-item">--}}
                            {{--                                    <a class="page-link" href="#">--}}
                            {{--                                        <i class="fas fa-angle-right"></i>--}}
                            {{--                                        <span class="sr-only">Next</span>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            {{--                        </nav>--}}
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.footers.guest')
        </div>
@endsection


