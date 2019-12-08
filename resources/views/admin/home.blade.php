@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('admin.dashboard')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card widget">
                                <i class="fa fa-users"></i>
                                <h3>@lang('admin.total_employee') <span>{{ \App\Models\Employee::count() }}</span></h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card widget">
                                <i class="fa fa-building"></i>
                                <h3>@lang('admin.total_company') <span>{{ \App\Models\Company::count() }}</span></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
