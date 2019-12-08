@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $company->id? __('admin.edit_company'): __('admin.new_company') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ $company->id? route('admin.companies.update', [$company->id]):  route('admin.companies.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if($company->id) @method('put') @endif
                            <div class="row justify-content-center mb-4">
                                <div class="logo-container">
                                    <img src="@error('logo') {{ asset('images/logo_placeholder.jpg') }} @else {{ old('logo-base64', $company->logo) }} @enderror" alt="Logo" id="logo-preview">
                                    <label for="logo">
                                        <i class="fa fa-camera"></i>
                                    </label>
                                    <input type="hidden" name="logo-base64" id="logo-base64">
                                </div>
                                <input type="file" class="d-none @error('logo') is-invalid @enderror" name="logo" id="logo">
                                @error('logo')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('admin.name')</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" name="name" value="{{ old('name', $company->name) }}" autocomplete="name" autofocus="autofocus" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">@lang('admin.email_address')</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website" class="col-md-4 col-form-label text-md-right">@lang('admin.website')</label>
                                <div class="col-md-6">
                                    <input id="website" value="{{ old('website', $company->website) }}" type="url" name="website" class="form-control @error('email') is-invalid @enderror">
                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function readFile() {
            if (this.files && this.files[0]) {
                let fileReader = new FileReader();
                fileReader.addEventListener("load", function(e) {
                    document.getElementById("logo-preview").src = e.target.result;
                    document.getElementById("logo-base64").value = e.target.result;
                });
                fileReader.readAsDataURL( this.files[0] );
            }
        }
        $(function(){
            document.getElementById("logo").addEventListener("change", readFile);
        });
    </script>
@endsection
