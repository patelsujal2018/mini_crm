@extends('layouts.backend')

@section('page_title') Companies @endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Companies</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <a href="{{ route('company.create') }}" class="btn btn-default"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companyList  as $key => $c)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if($c->logo)
                                            <img src="{{ asset('/storage/companies/'.$c->logo) }}" width="100" height="100">
                                        @endif
                                    </td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->website }}</td>
                                    <td>
                                        <form action="{{ route('company.destroy',$c->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('company.edit',$c->id) }}" class="btn btn-block btn-default btn-sm">Edit</a>

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
                        {{ $companyList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
