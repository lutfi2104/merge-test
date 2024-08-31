@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <!-- Card for All SOPs -->
        <div class="col-md-3">
            <a href="{{ route('sop.index') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-secondary"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_all }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #ffffff;">ALL
                        </h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for SOP -->
        <div class="col-md-3">
            <a href="{{ route('sop.sopfinal') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-secondary"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_sop }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #ffffff;">SOP
                        </h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for WI -->
        <div class="col-md-3">
            <a href="{{ route('sop.wi') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-secondary"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_wi }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #ffffff;">WI
                        </h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for HACCP -->
        <div class="col-md-3">
            <a href="{{ route('sop.haccp') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-secondary"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_haccp }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #ffffff;">
                            HACCP PLAN</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Card for Form -->
        <div class="col-md-3">
            <a href="{{ route('sop.form') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-light"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px; color: #4e4d4d;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_form }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #4e4d4d;">FORM
                        </h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for Standard -->
        <div class="col-md-3">
            <a href="{{ route('sop.standar') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-light"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px; color: #4e4d4d;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light" <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_standar }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #4e4d4d;">
                            STANDARD</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card for Verification -->
        <div class="col-md-3">
            <a href="{{ route('sop.verifikasi') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-light"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px; color: #4e4d4d;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_verifikasi }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #4e4d4d;">
                            VERIFIKASI</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Conditionally shown Draft Card -->
        @if (App\Models\Usersop::where('user_id', Auth::user()->id)->exists() ||
                (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC')))
            <div class="col-md-3">
                <a href="{{ route('sop.draft') }}" style="text-decoration: none;">
                    <div class="mb-3 text-white card bg-light"
                        style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                        <div class="card-header d-flex justify-content-between align-items-center"
                            style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px; color: #4e4d4d;">
                            <span>{{ Auth::user()->departement->departement }}</span>
                            <span class="badge badge-light"
                                style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_draft }}</span>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-center"
                            style="padding: 2rem;">
                            <h5 class="text-center card-title"
                                style="font-size: 1.5rem; margin-bottom: 0; color: #4e4d4d;">DRAFT</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <!-- Card for Copy Document -->
        <div class="col-md-3">
            <a href="{{ route('sop.copy') }}" style="text-decoration: none;">
                <div class="mb-3 text-white card bg-dark"
                    style="max-width: 18rem; border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="font-weight: bold; font-size: 1.2rem; padding: 1rem 1.5rem; background-color: rgba(0, 0, 0, 0.1); border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        <span>{{ Auth::user()->departement->departement }}</span>
                        <span class="badge badge-light"
                            style="background-color: #ffc107; color: #000; padding: 0.5rem 1rem; border-radius: 12px;">{{ $sop_count_copy }}</span>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center"
                        style="padding: 2rem;">
                        <h5 class="text-center card-title" style="font-size: 1.5rem; margin-bottom: 0; color: #ece6e6;">
                            COPY DOC</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
