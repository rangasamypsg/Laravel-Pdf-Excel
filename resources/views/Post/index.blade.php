@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td> {{ $post->category->name }} </td>
                    <td>
                        <a href="{{ route('post.pdf') }}" class="btn btn-primary">Download Pdf</a>
                        <a href="{{ route('post.excel') }}" class="btn btn-primary">Download Excel</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
