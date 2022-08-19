@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Assignments</div>
                    <div id="demo_info" class="box"></div>
                        <div id="example_wrapper" class="dataTables_wrapper">
                            
                        <table id="example" class="display dataTable" style="width:100%" aria-describedby="example_info">
                            <thead>
                                <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 131.172px;">ID</th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 131.172px;">Τύπος/type</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 218.172px;">Τίτλος/title</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 96.9688px;">Είδος/kind</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 39.0156px;">Διεύθυνση/address</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 85.5469px;">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 73.3125px;">User Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 73.3125px;">Λεπτομέρειες/details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter=0;$class='odd';@endphp
                                @foreach($assignments as $assignment)
                                    @php $counter ++;@endphp
                                    @php if($counter % 2 == 0)
                                        $class = 'even';
                                    else
                                    $class = 'odd';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td class="sorting_1">{{$counter}}</td>
                                        <td>{{$assignment->assig_type_quantity}}</td>
                                        <td>{{$assignment->invoice_title}}</td>
                                        <td>{{$assignment->user->UserInfo->species}}</td>
                                        <td>{{$assignment->user->UserInfo->address}}</td>
                                        <td>{{$assignment->	start_date}}</td>
                                        <td>{{$assignment->user->name}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info justify-content-center" id="example_info" role="status" aria-live="polite">{{$assignments->links()}}</div>
                        <!--<div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                            <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="-1" id="example_previous">Previous</a>
                            <span>
                                <a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a>
                                <a class="paginate_button " aria-controls="example" data-dt-idx="2" tabindex="0">2</a>
                                <a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">3</a>
                                <a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">4</a>
                                <a class="paginate_button " aria-controls="example" data-dt-idx="5" tabindex="0">5</a>
                                <a class="paginate_button " aria-controls="example" data-dt-idx="6" tabindex="0">6</a>
                            </span>
                            <a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a>
                        </div>-->
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection