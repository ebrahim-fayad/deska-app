@extends('Back.layouts.master', ['title' => __('keyWords.member')])
@section('content')
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <x-success-alert></x-success-alert>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keyWords.member') }}</h2>

                        <div class="page-title-right">
                            <x-action-button href="{{ route('admin.members.create') }}" type="create" name="{{ __('keyWords.add_new_member') }}"></x-action-button>
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
                            @forelse ($members as $Member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Member->name }}</td>
                                    <td>{{ $Member->position }}</td>
                                    <td> <img style="border-radius:50%" width="150px" height="150px" src="{{ asset("images/$Member->image ") }}" alt="{{ $Member->name }}">  </td>
                                    <td>
                                        <x-action-button href="{{ route('admin.members.edit', $Member) }}"
                                            name='edit' type="edit"></x-action-button>

                                        <x-action-button href="{{ route('admin.members.show', $Member) }}"
                                            name='show' type="show"></x-action-button>
                                        <x-delete-button href="{{ route('admin.members.destroy', $Member) }}"
                                            id="{{ $Member->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $members->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>



    </div>
@endsection
