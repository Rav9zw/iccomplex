@extends('./base')
@section('content')
    <div class="container">
        <form class="form-control" action="{{Route('orderCalculate')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="postcode" class="form-label">Postcode:</label>
                <input type="text" class="form-control" id="postcode" name="postcode" required>
                @if($errors->has('postcode'))
                    <div class="alert alert-danger">{{ $errors->first('postcode') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Order Amount:</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" required>
                @if($errors->has('total_amount'))
                    <div class="alert alert-danger">{{ $errors->first('total_amount') }}</div>
                @endif
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="long_product" name="long_product">
                <label class="form-check-label" for="long_product">Long Product</label>
            </div>

            <button class="btn btn-primary" type="submit">Calculate</button>
        </form>

        @if (session('value'))
            <div class="alert alert-success">
                Calculated value saved in database: {{ session('value') }}
            </div>
        @endif

    </div>
@endsection
