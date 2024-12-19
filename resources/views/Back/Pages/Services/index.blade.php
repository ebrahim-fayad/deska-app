@extends('Back.layouts.master', ['title' => __('keyWords.services')])
@section('content')
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <x-success-alert></x-success-alert>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keywords.services') }}</h2>

                        <div class="page-title-right">
                            <x-action-button href="{{ route('admin.services.create') }}" type="create"
                                name="{{ __('keyWords.add_new_service') }}"></x-action-button>

                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('keyWords.title')</th>
                                <th width="15%">@lang('keyWords.icon')</th>
                                <th width="15%">@lang('keyWords.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td><i class="{{ $service->icon }}"> </i> </td>
                                    <td>
                                        <x-action-button href="{{ route('admin.services.edit', $service) }}" name='edit'
                                            type="edit"></x-action-button>

                                        <x-action-button href="{{ route('admin.services.show', $service) }}" name='show'
                                            type="show"></x-action-button>
                                        <x-delete-button href="{{ route('admin.services.destroy', $service) }}"
                                            id="{{ $service->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $services->appends(['trashed_services_page' => $trashedServices->currentPage()])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keywords.services_trashed') }}</h2>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>@lang('keyWords.title')</th>
                                <th width="15%">@lang('keyWords.icon')</th>
                                <th width="15%">@lang('keyWords.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashedServices as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td><i class="{{ $service->icon }}"> </i> </td>
                                    <td>
                                        <x-action-button href="{{ route('admin.service.restore', $service) }}" name='restore'
                                            type="restore"></x-action-button>
                                        <x-delete-button href="{{ route('admin.service.force-delete', $service) }}"
                                            id="{{ $service->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $trashedServices->appends(['services_page' => $services->currentPage()])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>
@endsection
