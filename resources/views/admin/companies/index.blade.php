@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="d-inline-block @if(__('admin.direction') === 'rtl') float-right @endif">{{ __('admin.companies_list') }}</h2>
                        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary @if(__('admin.direction') === 'ltr') float-right @else float-left @endif">{{ __('admin.new_company') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('admin.name') }}</th>
                                    <th scope="col">{{ __('admin.email') }}</th>
                                    <th scope="col">{{ __('admin.website') }}</th>
                                    <th scope="col">{{ __('admin.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <th scope="row">{{ $company->id }}</th>
                                        <td>
                                            <a href="{{ route('admin.companies.show', [$company->id]) }}">
                                                <img src="{{ $company->logo }}" alt="{{ $company->name }} logo" width="50" height="50" class="img-thumbnail rounded-circle"> {{ $company->name }}
                                            </a>
                                        </td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('admin.companies.show', [$company->id]) }}"><i class="fa fa-eye"></i> @lang('admin.detail')</a>
                                                    <a class="dropdown-item" href="{{ route('admin.companies.edit', [$company->id]) }}"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
                                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                        document.getElementById('delete{{ $company->id }}').submit();">
                                                        <i class="fa fa-trash"></i> @lang('admin.delete')
                                                    </a>
                                                    <form id="delete{{ $company->id }}" action="{{ route('admin.companies.destroy', [$company->id]) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $companies->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
