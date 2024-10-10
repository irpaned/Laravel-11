@extends('layout')

@section('content')

<h4>Edit Thread</h4>

<form action="{{ route('threads.update', $data->id) }}" method="post">
    @csrf
    <label>Name</label>
    <input type="text" name="name" value="{{ $data->name }}" class="form-control mb-2">
    <label>Quote</label>
    <input type="text" name="quote" value="{{ $data->quote }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>

@endsection