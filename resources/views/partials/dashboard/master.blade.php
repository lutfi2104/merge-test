{{-- <!-- Super Admin --}}
@if (auth()->user()->hasRole('Super Admin'))
    @include('partials.dashboard.super-admin')
@endif

{{-- Rnd --}}
@if (auth()->user()->hasRole('Rnd')) 
   @include('partials.dashboard.rnd')
@endif

{{-- Purchasing --}}
@if (auth()->user()->hasRole('Purchasing'))
    @include('partials.dashboard.purchasing')
@endif


{{-- Admin --}}

@if (auth()->user()->hasRole('Admin'))
    @include('partials.dashboard.admin')
@endif


{{-- QC --}}
@if (auth()->user()->hasRole('QC'))
    @include('partials.dashboard.qc')
@endif

{{-- Admin QC --}}
@if (auth()->user()->hasRole('Admin QC'))
    @include('partials.dashboard.admin-qc')
@endif

{{-- Sales & Warehouse --}}

@if (auth()->user()->hasRole('Sales'))
    @include('partials.dashboard.sales')
@endif

@if (auth()->user()->hasRole('Warehouse'))
    @include('partials.dashboard.warehouse')
@endif


{{-- Admin Prd --}}

@if (auth()->user()->hasRole('Admin PRD'))
    @include('partials.dashboard.admin-prd')
@endif

{{-- Leader PRD & Spv PRD --}}

@if (auth()->user()->hasRole('Leader PRD'))
    @include('partials.dashboard.leader-prd')
@endif

{{-- Packing --}}
@if (auth()->user()->hasRole('Packing'))
    @include('partials.dashboard.packing')
@endif


{{-- Backing G2 --}}
@if (auth()->user()->hasRole('Baking G2'))
    @include('partials.dashboard.baking-g2')
@endif

@if (auth()->user()->hasRole('Auditor'))
    @include('partials.dashboard.auditor')
@endif
