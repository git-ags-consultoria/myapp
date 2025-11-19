@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Modality</h1>

    @include('admin.modalities.partials.form', [
        'route' => route('admin.modalities.update', $modality),
        'method' => 'PUT',
        'modality' => $modality
    ])
@endsection
