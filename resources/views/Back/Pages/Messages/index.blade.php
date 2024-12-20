@extends('Back.layouts.master', ['title' => __('keyWords.messages')])
@section('content')
    <div class="row">
        <div class="col-md-12 my-4">
            <div class="card shadow">
                <div class="card-body">
                    <x-success-alert></x-success-alert>
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                        <h2 class="h5 page-title">{{ __('keywords.messages') }}</h2>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                  <th width="5%">#</th>
                                    <th>{{ __('keywords.name') }}</th>
                                    <th>{{ __('keywords.email') }}</th>
                                    <th>{{ __('keywords.subject') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}  </td>
                                    <td>{{ $message->subject }}  </td>
                                    <td>
                                        {{-- <x-action-button href="{{ route('admin.messages.edit', $message) }}" name='edit'
                                            type="edit"></x-action-button> --}}

                                        <x-action-button href="{{ route('admin.messages.show', $message) }}" name='show'
                                            type="show"></x-action-button>
                                        <x-delete-button href="{{ route('admin.messages.destroy', $message) }}"
                                            id="{{ $message->id }}"></x-delete-button>
                                    </td>
                                </tr>
                            @empty
                                <x-empty-alert></x-empty-alert>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $messages->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>



    </div>
@endsection
