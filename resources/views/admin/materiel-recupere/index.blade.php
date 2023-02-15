@extends('layouts.admin')
@section('title', 'Materiel Recupere')
@section('content')
<!-- Main content -->
<livewire:materiel-recupere.materiel-recupere-show>

<!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addMaterielRecupere').modal('hide');
            $('#editMaterielRecuperemodal').modal('hide');
            $('#deleteMaterielRecuperemodal').modal('hide');
        })
    </script>
