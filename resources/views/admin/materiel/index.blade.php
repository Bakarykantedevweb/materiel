@extends('layouts.admin')
@section('title', 'Materiel')
@section('content')
<!-- Main content -->
<livewire:materiel.materiel-show>

<!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addMateriel').modal('hide');
            $('#editMaterielmodal').modal('hide');
            $('#deleteMaterielmodal').modal('hide');
        })
    </script>
