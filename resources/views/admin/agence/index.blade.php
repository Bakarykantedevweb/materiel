@extends('layouts.admin')
@section('title', 'Agence')
@section('content')
    <!-- Main content -->
   <livewire:agence.agence-show>

    <!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-default').modal('hide');
            $('#modal-default1').modal('hide');
            $('#modal-default2').modal('hide');
        })
    </script>
