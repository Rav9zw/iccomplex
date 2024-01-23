@extends('./base')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <th>Price</th>
            <th>Zones</th>
            </thead>
            @foreach($zonesGroups as $price=>$group)
                <tr>
                    <td>{{$price}}</td>
                    <td>
                        @foreach($group as $zone)
                            {{$zone}},
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
