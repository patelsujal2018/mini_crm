@extends('layouts.backend')

@section('page_title') Employees @endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Employees</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <a href="{{ route('employee.create') }}" class="btn btn-default"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeeList  as $key => $e)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $e->firstname }}</td>
                                    <td>{{ $e->lastname }}</td>
                                    <td>{{ $e->email }}</td>
                                    <td>{{ $e->phone }}</td>
                                    <td>{{ $e->company->name }}</td>
                                    <td>
                                        <form action="{{ route('employee.destroy',$e->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('employee.edit',$e->id) }}" class="btn btn-block btn-default btn-sm">Edit</a>

                                            <button class="btn btn-block btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $employeeList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
