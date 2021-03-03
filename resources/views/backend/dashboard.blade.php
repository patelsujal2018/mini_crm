@extends('layouts.backend')

@section('page_title') Dashboard @endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-blue">
                    <div class="inner">
                        <h3>{{ $employeeCount }}</h3>
                        <p>Employees</p>
                    </div>
                    <div class="icon"><i class="ion ion-bag"></i></div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $companyCount }}</h3>
                        <p>Companies</p>
                    </div>
                    <div class="icon"><i class="ion ion-person-add"></i></div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
