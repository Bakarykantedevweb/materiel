@extends('layouts.admin')
@section('title', 'Fourinisseurs')
@section('content')
    <!-- Main content -->
   <livewire:departement.departement-show>

    <!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#adddepartement').modal('hide');
            $('#editdepartement').modal('hide');
            $('#deletedepartement').modal('hide');
        })
    </script>
