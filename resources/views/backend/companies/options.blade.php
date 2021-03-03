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
                    @if(isset($company))
                    <form method="post" action="{{ route('company.update',$company->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input name="company_name" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('company_name')){{old('company_name')}}@else{{$company->name}}@endif">
                                @if ($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Company Email</label>
                                <input name="company_email" type="text" class="form-control" placeholder="Enter Company Email" value="@if(old('company_email')){{old('company_email')}}@else{{$company->email}}@endif">
                                @if ($errors->has('company_email'))
                                    <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Company Website</label>
                                <input name="company_website" type="text" class="form-control" placeholder="Enter Company website" value="@if(old('company_website')){{old('company_website')}}@else{{$company->website}}@endif">
                                @if ($errors->has('company_website'))
                                    <span class="text-danger">{{ $errors->first('company_website') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Company Logo</label>
                                @if($company->logo)
                                    <img src="{{ asset('/storage/companies/'.$company->logo) }}" width="100" height="100">
                                @endif
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="company-logo" name="company_logo">
                                        <label class="custom-file-label" for="company-logo">Choose file</label>
                                    </div>
                                </div>
                                @if ($errors->has('company_logo'))
                                    <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <a href="{{route('company.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    @else
                    <form method="post" action="{{ route('company.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                                <label>Company Name</label>
                                <input name="company_name" type="text" class="form-control" placeholder="Enter Company Name" value="@if(old('company_name')){{old('company_name')}}@endif">
                                @if ($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Company Email</label>
                                <input name="company_email" type="text" class="form-control" placeholder="Enter Company Email" value="@if(old('company_email')){{old('company_email')}}@endif">
                                @if ($errors->has('company_email'))
                                    <span class="text-danger">{{ $errors->first('company_email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Company Website</label>
                                <input name="company_website" type="text" class="form-control" placeholder="Enter Company website" value="@if(old('company_website')){{old('company_website')}}@endif">
                                @if ($errors->has('company_website'))
                                    <span class="text-danger">{{ $errors->first('company_website') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Company Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="company-logo" name="company_logo">
                                        <label class="custom-file-label" for="company-logo">Choose file</label>
                                    </div>
                                </div>
                                @if ($errors->has('company_logo'))
                                    <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <a href="{{route('company.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
