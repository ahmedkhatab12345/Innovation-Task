@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
        <h1>Movies</h1>
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Category</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->description }}</td>
                        <td><img  style="width: 90px; height: 90px;" src="{{asset('images/movies/'.$movie->image)}}"></td>
                        <td>{{ $movie->rate }}</td>
                        <td>{{ $movie->category->title }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-outline-primary box-shadow-3">Edit</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger box-shadow-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection