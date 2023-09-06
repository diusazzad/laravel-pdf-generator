
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Upload DOCX File</h2>
    <form action="{{ route('convert.docx.to.pdf') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-4">
            <label for="docx_file" class="block text-gray-700 font-medium mb-2">Choose a DOCX file:</label>
            <input type="file" id="docx_file" name="docx_file" accept=".docx"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Convert
            to PDF</button>
    </form>
</div>
@endsection
