@extends('layouts.backend')

@section('page_title') {{ $page_title }} @endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ $page_title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(isset($employee))
                    <form method="post" action="{{ route('employee.update',$employee->id) }}" role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="firstname" type="text" class="form-control" placeholder="Enter First Name" value="@if(old('firstname')){{old('firstname')}}@else{{$employee->firstname}}@endif">
                                @if ($errors->has('firstname'))
                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="lastname" type="text" class="form-control" placeholder="Enter Last Name" value="@if(old('lastname')){{old('lastname')}}@else{{$employee->lastname}}@endif">
                                @if ($errors->has('lastname'))
                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Enter Email" value="@if(old('email')){{old('email')}}@else{{$employee->email}}@endif">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Enter Phone" value="@if(old('phone')){{old('phone')}}@else{{$employee->phone}}@endif">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Select Company</label>
                                <select name="company_name" class="form-control">
                                    <option value="">select company</option>
                                    @forelse($companyList as $c)
                                        <option value="{{ $c->id }}" @if($c->id == $employee->company_id) selected @endif>{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <a href="{{route('employee.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    @else
                    <form method="post" action="{{ route('employee.store') }}" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="firstname" type="text" class="form-control" placeholder="Enter First Name" value="@if(old('firstname')){{old('firstname')}}@endif">
                                @if ($errors->has('firstname'))
                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="lastname" type="text" class="form-control" placeholder="Enter Last Name" value="@if(old('lastname')){{old('lastname')}}@endif">
                                @if ($errors->has('lastname'))
                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Enter Email" value="@if(old('email')){{old('email')}}@endif">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Enter Phone" value="@if(old('phone')){{old('phone')}}@endif">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Select Company</label>
                                <select name="company_name" class="form-control">
                                    <option value="">select company</option>
                                    @forelse($companyList as $c)
                                        <option value="{{ $c->id }}" >{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <a href="{{route('employee.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
