@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">PDF Generator</h1>

    <div class="bg-white rounded shadow p-4">
        <form action="{{ route('pdf.generate') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-2 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-4 bg-red-100 text-red-700 p-2 rounded">
                {{ session('error') }}
            </div>
            @endif

            <div class="mb-4">
                <label for="pdf_file" class="block text-gray-700 font-medium mb-2">Convert PDF File (choose .docx only):</label>
                <input type="file" id="pdf_file" name="pdf_file"
                    class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500" required>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Generate PDF</button>
        </form>
    </div>
</div>
@endsection
