@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Data Identitas</h1>
@stop

@section('content')
<table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor ID</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Jenis ID</th>
            <th>Alamat</th>
            <th>Agama</th>
            <th>Status Perkawinan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->idNumber}}</td>
            <td>{{$row->fullname}}</td>
            <td>{{$row->gender}}</td>
            <td>{{$row->IDType}}</td>
            <td>{{$row->address}}</td>
            <td>{{$row->religion}}</td>
            <td>{{$row->maritalStatus}}</td>
            <td>{{$row->pob}}</td>
            <td>{{$row->dob}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
@stop

@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@stop