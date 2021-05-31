@extends('layouts.app')
@section('title','Daftar Akun')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/select.bootstrap4.min.css')}}">
@endsection
@section('page_js')
<script src="{{ asset('assets/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/modules-datatables.js') }}"></script>

@endsection
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-inverse table-hover" id="table-1">
                            <thead>                                 
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($account as $acc)
                                    <tr class="clickable-row" data-href="{{route('admin.profile_account',$acc->id)}}" style="cursor: pointer;">
                                        <td>{{$no++}}</td>
                                        <td><img src="{{asset('assets/images/avatar-1.png')}}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{$acc->name}}">&nbsp;&nbsp; {{$acc->name}} 
                                            @if($acc->role == 3)
                                                (Admin)
                                            @elseif($acc->role ==2)
                                                (Driver)
                                            @else
                                                (User)
                                            @endif</td>
                                        <td>{{$acc->email}}</td>
                                        <td>
                                            @foreach($addresses as $add)
                                                @if($add->id_users == $acc->id)
                                                    <div class="badge badge-success">Tersedia</div>
                                                    @else 
                                                    <div class="badge badge-danger">Tidak tersedia</div>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endsection