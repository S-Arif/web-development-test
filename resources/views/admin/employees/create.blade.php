@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $employee->id? __('admin.edit_employee'): __('admin.new_employee') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ $employee->id? route('admin.employee.update', [$employee->id]):  route('admin.employee.store') }}">
                            @csrf
                            @if($employee->id) @method('put') @endif
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">@lang('admin.first_name')</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" autofocus="autofocus" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">@lang('admin.last_name')</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" autofocus="autofocus" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">@lang('admin.email_address')</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company" class="col-md-4 col-form-label text-md-right">@lang('admin.company')</label>
                                <div class="col-md-6">
                                    <select name="company_id" id="company" class="form-control @error('company_id') is-invalid @enderror">
                                        <option value="">@lang('admin.choose_company')</option>
                                        @foreach(\App\Models\Company::pluck('name', 'id') as $id => $company)
                                            <option value="{{ $id }}" {{ old('company_id', $employee->company_id) == $id? 'selected': '' }}>{{ $company }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">@lang('admin.phone')</label>
                                <div class="col-md-6">
                                    <input id="phone" value="{{ old('phone', $employee->phone) }}" type="tel" name="phone" class="form-control @error('email') is-invalid @enderror">
                                    @error('phone')
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
