@extends('layout')

@section('content')


<div class="d-flex">
    <h4>Threads</h4>
    <div class="ms-auto">
        <a href="{{ route('threads.tambah') }}" class="btn btn-success">Tambah Thread</a>
    </div>
</div>

@foreach ($data as $no=>$thread)

<div class="d-flex flex-row">
    <h5 class="me-3 mt-3">{{ $no+1 }}</h5>
    <h5 class="me-3 mt-3">{{ $thread->name }}</h5>
    <h5 class="me-3 mt-3">{{ $thread->quote }}</h5>
    @if ($thread->image)
    <img src="{{ asset('storage/' . $thread->image) }}" alt="{{ $thread->name }}" class="me-3" style="max-height: 100px; max-width: 100px;">
    @endif
    <a href="{{ route('threads.edit', $thread->id) }}" class="btn btn-warning me-3 mt-3">Edit</a>
    <form action="{{ route('threads.delete', $thread->id) }}" method="post">
        @csrf
        <button class="btn btn-danger mt-3">Delete</button>
    </form>
</div>


@endforeach

@endsection