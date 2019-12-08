@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('admin.company_detail') }}
                        <a href="{{ route('admin.companies.index') }}" class="btn btn-primary float-right">Go to list page</a>
                    </div>
                    <div class="card-body preview">
                        <div class="row justify-content-center mb-4">
                            <div class="logo-container">
                                <img src="{{ old('logo-base64', $company->logo) }}" alt="Logo" id="logo-preview">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" value="{{ old('name', $company->name) }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" value="{{ old('email', $company->email) }}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                            <div class="col-md-6">
                                <input id="website" value="{{ old('website', $company->website) }}" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
