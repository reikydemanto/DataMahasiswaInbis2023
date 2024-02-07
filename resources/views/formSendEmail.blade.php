@extends('layouts.app')

@section('title', 'Send Email')


@section('content')
    <form method="POST" action="{{ url('sendEmail/send') }}">
        @csrf
        <div>
            <label for="email">
                Kepada
            </label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="name">
                Nama
            </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="subject">
                Subject
            </label>
            <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}">
            @error('name')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="content">
                Isi
            </label>
            <textarea rows="5" class="form-control" name="content" id="content" value="{{ old('content') }}"></textarea>
            @error('content')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button class="btn btn-primary m-r-5 mt-3" type="submit">Kirim Email</button>
        </div>
    </form>
@endsection
