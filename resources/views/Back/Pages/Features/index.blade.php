@extends('Back.layouts.master', ['title' => __('keyWords.features')])
@section('content')
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <x-success-alert></x-success-alert>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keywords.features') }}</h2>

                        <div class="page-title-right">
                            <x-action-button href="{{ route('admin.features.create') }}" type="create"
                                name="{{ __('keyWords.add_new_feature') }}"></x-action-button>

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
                            @forelse ($Features as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feature->title }}</td>
                                    <td><i class="{{ $feature->icon }}"> </i> </td>
                                    <td>
                                        <x-action-button href="{{ route('admin.features.edit', $feature) }}" name='edit'
                                            type="edit"></x-action-button>

                                        <x-action-button href="{{ route('admin.features.show', $feature) }}" name='show'
                                            type="show"></x-action-button>
                                        <x-delete-button href="{{ route('admin.features.destroy', $feature) }}"
                                            id="{{ $feature->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $Features->appends(['trashed_Features_page' => $trashedFeatures->currentPage()])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">

                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keywords.features_trashed') }}</h2>
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
                            @forelse ($trashedFeatures as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feature->title }}</td>
                                    <td><i class="{{ $feature->icon }}"> </i> </td>
                                    <td>
                                        <x-action-button href="{{ route('admin.features.restore', $feature) }}" name='restore'
                                            type="restore"></x-action-button>
                                        <x-delete-button href="{{ route('admin.features.force-delete', $feature) }}"
                                            id="{{ $feature->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $trashedFeatures->appends(['Features_page' => $Features->currentPage()])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>
@endsection
