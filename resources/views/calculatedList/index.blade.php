@extends('./base')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <th>PostCode</th>
            <th>Price</th>
            <th>Total amount</th>
            <th>Long product( Additional cost )</th>
            <th>Discount applied</th>
            <th>Value</th>
            </thead>

            @foreach($data as $row)
                <tr>
                    <td>{{$row['postcode']}}</td>
                    <td>{{$row['price']}}</td>
                    <td>{{$row['total_amount']}}</td>
                    <td>{{$row['long_product']}}</td>
                    <td>{{$row['discount_applied']?($row['discount_applied']*100).'%':''}}</td>
                    <td>{{$row['value']}}</td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection
