@extends('layouts.admin')
@section('title', 'Bon Livraison')
@section('content')
    <!-- Main content -->
   <livewire:bon-livraison.bon-livraison-show>

    <!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-default').modal('hide');
        })
    </script>
