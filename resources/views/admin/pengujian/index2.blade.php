@extends('layouts.dashboard')
@section('content')
    <style>
        iframe {
            width: 100%;
            border: 1px solid #696cff;
            border-radius: 5px;
        }
    </style>


    <div class="card">
        <div class="card-body">
            <div class="mb-4 d-flex justify-content-md-between">
                <a class="btn btn-outline-primary" href="{{ route('pengujian.export') }}" role="button">Export</a>
                <a class="btn btn-primary" href="{{ route('pengujian.create') }}" role="button">Create Uji Produk</a>
            </div>

            <iframe id="myIframe" src="{{ url('/admin/pengujian-livewire') }}"></iframe>


        </div>
    </div>
    <script>
        // Selecting the iframe element
        var iframe = document.getElementById("myIframe");

        // Adjusting the iframe height onload event
        iframe.onload = function() {
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
@endsection
