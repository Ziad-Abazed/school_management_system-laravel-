@extends('layouts.master')
@section('css')

    @section('title')
    {{trans('main_trans.Attendancereport')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    {{trans('main_trans.Attendancereport')}}
    @stop
    <!-- breadcrumb -->

    @section('content')
        <!-- row -->
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                      
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">{{trans('Students_trans.name')}}</th>
                                        <th class="alert-success">{{trans('Students_trans.Grade')}}</th>
                                        <th class="alert-success">{{trans('Students_trans.section')}}</th>
                                        <th class="alert-success">{{trans('trans_gen.history')}}</th>
                                        <th class="alert-warning">{{trans('Sections_trans.Status')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Attendance as $student)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->students->name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->section->Name_Section}}</td>
                                            <td>{{$student->attendence_date}}</td>
                                            <td>

                                                @if($student->attendence_status == 0)
                                                    <span class="btn-danger">{{trans('Students_trans.absence')}}</span>
                                                @else
                                                    <span class="btn-success">{{trans('Students_trans.Attend')}}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @include('pages.Students.Delete')
                                    @endforeach
                                </table>
                            </div>
                       

                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
    @endsection
    @section('js')

    @endsection
