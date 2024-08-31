@extends('layouts.dashboard')

@section('content')
<form action="{{ route('wo.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card">
    
</div>
</form>
@endsection
