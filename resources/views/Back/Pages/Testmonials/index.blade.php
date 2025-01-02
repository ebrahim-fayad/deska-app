@extends('Back.layouts.master', ['title' => __('keyWords.testmonials')])
@section('content')
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <x-success-alert></x-success-alert>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keywords.testmonials') }}</h2>

                        <div class="page-title-right">
                            <x-action-button href="{{ route('admin.testmonials.create') }}" type="create" name="{{ __('keyWords.add_new_testmonial') }}"></x-action-button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>{{ __('keywords.name') }}</th>
                                <th>{{ __('keywords.position') }}</th>
                                <th width="10%">{{ __('keywords.image') }}</th>
                                <th width="15%">{{ __('keywords.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testmonials as $testmonial)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $testmonial->name }}</td>
                                    <td>{{ $testmonial->position }}</td>
                                    <td> <img class="img-fluid flex-shrink-0 rounded-circle" width="150px" height="150px" src="{{ asset("images/$testmonial->image ") }}" alt="">  </td>
                                    <td>
                                        <x-action-button href="{{ route('admin.testmonials.edit', $testmonial) }}"
                                            name='edit' type="edit"></x-action-button>

                                        <x-action-button href="{{ route('admin.testmonials.show', $testmonial) }}"
                                            name='show' type="show"></x-action-button>
                                        <x-delete-button href="{{ route('admin.testmonials.destroy', $testmonial) }}"
                                            id="{{ $testmonial->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $testmonials->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>



    </div>
@endsection
