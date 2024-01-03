@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="card">
        <div class="card-body">
            <iframe src="{{ $route }}" style="width: 100%; height: 400px;"></iframe>
        </div>
    </div>
</div>
@endsection