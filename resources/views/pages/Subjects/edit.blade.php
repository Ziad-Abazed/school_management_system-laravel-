@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('trans_gen.edit') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('trans_gen.edit') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('subjects.update','test')}}" method="post" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('trans_gen.subAR')}}</label>
                                        <input type="text" name="Name_ar"
                                               value="{{ $subject->getTranslation('name', 'ar') }}"
                                               class="form-control">
                                        <input type="hidden" name="id" value="{{$subject->id}}">
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('trans_gen.subER')}}</label>
                                        <input type="text" name="Name_en"
                                               value="{{ $subject->getTranslation('name', 'en') }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">       <th> {{trans('Students_trans.Grade')}} </th></label>
                                        <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option
                                                    value="{{$grade->id}}" {{$grade->id == $subject->grade_id ?'selected':''}}>{{$grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState"><th> {{trans('Students_trans.classrooms')}} </th></label>
                                        <select name="Class_id" class="custom-select">
                                            <option
                                                value="{{ $subject->classroom->id }}">{{ $subject->classroom->Name_Class }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState"><th>{{trans('main_trans.teachername')}} </th></label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option
                                                    value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{ trans('My_Classes_trans.submit') }}
                                    البيانات
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection