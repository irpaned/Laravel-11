@extends('layout')

@section('content')

<h4>Tambah Thread</h4>

<form action="{{ route('threads.submit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="d-none">
        <label>Name</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control mb-2">
    </div>

    <label>Quote</label>
    <input type="text" name="quote" class="form-control mb-2">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" id="file_input" type="file">


    <button class="btn btn-primary">Submit</button>

</form>

@endsection