@extends('Back.layouts.master', ['title' => __('keyWords.edit_member')])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">{{ __('keyWords.edit_member') }}</h2>

                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.members.update', $member) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-label field="title"></x-form-label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('keywords.name') }}" value="{{ $member->name }} ">
                                    <x-validation-error field="name"></x-validation-error>
                                </div>

                                <div class="col-md-6">
                                    <x-form-label field="position"></x-form-label>
                                    <input type="text" name="position" class="form-control"
                                        placeholder="{{ __('keywords.position') }}" value="{{ $member->position }}">
                                    <x-validation-error field="position"></x-validation-error>
                                </div>

                               <div class="col-md-4 mt-3">
                                    <x-form-label field="facebook"></x-form-label>
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="{{ __('keywords.facebook') }}" value="{{$member->facebook}}">
                                    <x-validation-error field="facebook"></x-validation-error>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <x-form-label field="twitter"></x-form-label>
                                    <input type="text" name="twitter" class="form-control"
                                        placeholder="{{ __('keywords.twitter') }}" value="{{$member->twitter}}">
                                    <x-validation-error field="twitter"></x-validation-error>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <x-form-label field="linkedin"></x-form-label>
                                    <input type="text" name="linkedin" class="form-control"
                                        placeholder="{{ __('keywords.linkedin') }}" value="{{$member->linkedin }}">
                                    <x-validation-error field="linkedin"></x-validation-error>
                                </div>
                                <div class="col-md-12 mt-2 mb-15">
                                    <div class="custom-file " style="height: 100%">
                                        <div class=" row align-items-center">
                                            <div class="col-md-6">
                                                <input type="file" class="custom-file-input" name="image"
                                                    onChange="loadFile(event)" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <x-validation-error field="image"></x-validation-error>
                                            </div>
                                            <div class="col-md-6">
                                                <img style="border-radius:50%" src="{{ asset("images/$member->image") }}"width="150px" height="150px"
                                                    id="output" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <x-submit-button></x-submit-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
