@extends('layouts.admin')
@section('content')
    <div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Add Federation</h2>
        <form method="POST" action="{{ route('admin.federations.store') }}">
            @csrf
            @include('admin.federations.partials.form', ['buttonText' => 'Create'])
        </form>
    </div>
@endsection
