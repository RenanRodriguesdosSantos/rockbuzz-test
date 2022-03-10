@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body justify-content-end">
                        <a class="btn btn-primary m-1" href="{{ url('post/create') }}">Create</a>
                        <a class="btn btn-secondary m-1" href="{{ url('posts/lixeira') }}">Lixeira</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Views</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->visualizacoes }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ url('post/edit/' . $post->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('post/move-to-lixeira/' . $post->id) }}">To Lixeira</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
