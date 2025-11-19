@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create Modality</h1>

    @include('admin.modalities.partials.form', [
        'route' => route('admin.modalities.store'),
        'method' => 'POST',
        'modality' => null
    ])
@endsection
