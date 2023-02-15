@extends('layouts.admin')
@section('title', 'Materiel Sorti')
@section('content')
<!-- Main content -->
<livewire:materiel-sorti.materiel-sorti-show>

<!-- /.content -->
@endsection
@section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addMaterielSorti').modal('hide');
            $('#editMaterielSortimodal').modal('hide');
            $('#deleteMaterielSortimodal').modal('hide');
        })
    </script>
