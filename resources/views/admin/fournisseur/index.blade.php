@extends('layouts.admin')
@section('title', 'Fourinisseurs')
@section('content')
    <!-- Main content -->
   <livewire:fournisseur.fourisseur-show>

    <!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addFrs').modal('hide');
            $('#editFrs').modal('hide');
            $('#deleteFrs').modal('hide');
        })
    </script>
