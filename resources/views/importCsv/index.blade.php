@extends('./base')
@section('content')
    <div class="container">
        <form action="{{Route('importCsvFile')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Select CSV File:</label>
                <input type="file" class="form-control" name="file" id="file" accept=".csv">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>

        </form>


        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
@endsection
