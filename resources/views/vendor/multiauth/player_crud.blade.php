@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Players Details</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>S.No.</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <td>Account Detail</td>
                                <th>Date</th>
                                <th>Actions</th>
                                <th>Wallet</th>
                                <th>Other</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $i=1; @endphp
                            @foreach($cruds as $row)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>
                                        @if($row->account_detail == "Bank")
                                            <a href="#" onclick="get_detail('{{$row->bank_name}}', '{{$row->bank_ifsc}}', '{{$row->bank_holder_name}}', '{{$row->account_number}}')" >Bank</a>
                                        @else
                                            {{$row->account_detail}}
                                        @endif
                                    </td>
                                    <td>{{date('d/m/Y,  h:i:s a', strtotime($row->created_at))}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3">
                                                <a href="{{route('admin.player.edit', ['id' => $row->id])}}" id="edit" class="text-secondary"><i class="fa fa-money"></i></a>
                                            </li>
                                            <li class="mr-3">
                                                <a href="{{route('admin.player.forgot_pass', ['id' => $row->id])}}" id="forgot_pass" class="text-secondary"><i class="fa fa-key" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="mr-3"><a href="" onclick="delete_player({{$row->id}})" class="text-danger"><i class="ti-trash"></i></a></li>
                                            <li class="mr-3"><a href="{{route('admin.player.wd', ['id' => $row->id])}}" class="text-secondary"><i class="fa fa-bank"></i></a></li>
                                            <li class="mr-3"><a href="{{route('admin.player.txns', ['id' => $row->id])}}" class="text-secondary"><i class="fa fa-exchange"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>{{$row->wallet}}</td>
                                    <td>...</td>
                                </tr>
                                @php  $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->



@include('multiauth::includes.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script>
    $(document).ready(function () {
        function delete_player(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.player.delete') }}",
                type: "GET",
                success: function(response) {
                    // $('#msg').html(response["count"]);
                    alert("sss");
                    location.reload(true); 
                }
            });
        }
    });
</script> -->
<script>
    function get_detail(bank_name, bank_ifsc, bank_holder_name, account_number){
        alert("Bank Name  : "+bank_name+"\n Bank IFSC  :  "+bank_ifsc+"\n Bank Holder Name  :  "+bank_holder_name+"\n Bank Account Number  :  "+account_number);
    }
</script>
