@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">

            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">User</th>
                        <th class="text-center" scope="col">Event</th>
                        <th class="text-center" scope="col">Changes</th>
                        <th class="text-center" scope="col">Before</th>
                        <th class="text-center" scope="col">After</th>
                        {{-- <th class="text-center" scope="col">Deskripsi</th> --}}
                        <th class="text-center" scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log_activities as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->causer ? $item->causer->name : 'By System' }}</td>
                            <td class="text-center"> {{ $item->event }}</td>
                            <td class="text-center">
                                @if (@is_array($item->changes['attributes']))
                                    @foreach ($item->changes['attributes'] as $key => $value)
                                        @if (!in_array($key, ['updated_at', 'created_at', 'password', 'email_verified_at', 'remember_token']))
                                            {{ $key }} <br>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                @if (@is_array($item->changes['old']))
                                    @foreach ($item->changes['old'] as $key => $value)
                                        @if (!in_array($key, ['updated_at', 'created_at', 'password', 'email_verified_at', 'remember_token']))
                                            {{ $value }} <br>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                @if (@is_array($item->changes['attributes']))
                                    @foreach ($item->changes['attributes'] as $key => $value)
                                        @if (!in_array($key, ['updated_at', 'created_at', 'password', 'email_verified_at', 'remember_token']))
                                            {{ $value }} <br>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            {{-- <td class="text-center">{{ $item->description }}</td> --}}
                            <td class="text-center">{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
