@extends('layouts.admin')
@section('title', 'Bon Entre')
@section('content')
    <!-- Main content -->
   <livewire:bon-entre.bon-entre-show>

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
