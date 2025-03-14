@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $book->title }}</h2>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection

