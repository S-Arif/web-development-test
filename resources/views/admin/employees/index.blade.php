@extends('admin.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="d-inline-block @if(__('admin.direction') === 'rtl') float-right @endif">{{ __('admin.employee_list') }}</h2>
                        <a href="{{ route('admin.employee.create') }}" class="btn btn-primary @if(__('admin.direction') === 'ltr') float-right @else float-left  @endif">{{ __('admin.new_employee') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('admin.name') }}</th>
                                    <th scope="col">{{ __('admin.email') }}</th>
                                    <th scope="col">{{ __('admin.phone') }}</th>
                                    <th scope="col">{{ __('admin.company') }}</th>
                                    <th scope="col">{{ __('admin.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <th scope="row">{{ $employee->id }}</th>
                                        <td>
                                            <a href="{{ route('admin.employee.show', [$employee->id]) }}">
                                                {{ $employee->name }}
                                            </a>
                                        </td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->company->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('admin.employee.show', [$employee->id]) }}"><i class="fa fa-eye"></i> @lang('admin.detail') </a>
                                                    <a class="dropdown-item" href="{{ route('admin.employee.edit', [$employee->id]) }}"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
                                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                        document.getElementById('delete{{ $employee->id }}').submit();">
                                                        <i class="fa fa-trash"></i> @lang('admin.delete')
                                                    </a>
                                                    <form id="delete{{ $employee->id }}" action="{{ route('admin.employee.destroy', [$employee->id]) }}" method="POST" class="d-none">
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
                            {!! $employees->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
