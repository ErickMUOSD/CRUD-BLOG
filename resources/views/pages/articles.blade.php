@extends('layouts.app')

@section('content')

    @include('layouts.headers.global')

    <div class="container-fluid mt--6">
        <div class="row ">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">

                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Article</h3>
                            </div>
                            <div class="col text-right">
                                <a  href="{{ route('add.article') }}" class="btn alert-primary">Add new Article</a>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Article</th>
                                    <th scope="col" class="sort" data-sort="budget">Title</th>
                                    <th scope="col" class="sort" data-sort="status">Category Name</th>

                                    <th scope="col" class="sort" data-sort="status">User name</th>

                                    <th scope="col">Action</th>

                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody class="list">


                                @foreach($data as $article)


                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">

                                                <img src="{{url('/images/'.$article->pathImage)}}" alt="Image" style="width: 80px"/>


                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$article->title}}
                                        </td>
                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                      <i class="bg-success"></i>
                                                 <span class="status">{{$article->category_name}}</span>
                                                </span>
                                        </td>

                                        <td>
                                                <span class="badge badge-dot mr-4">
                                                      <i class="bg-success"></i>
                                                 <span class="status">{{$article->user_name}}</span>
                                                </span>
                                        </td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a data-toggle="modal" data-target="#modal-update-{{$article->id}}" class="dropdown-item" href="{{route('user.update',$article->id)}}">Editar</a>

                                                    <form action="{{ route('article.destroy', $article) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="dropdown-item" href="#">Eliminar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

{{--                                    @include('alerts.user.update')--}}
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
