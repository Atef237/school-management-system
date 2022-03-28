@extends('empty')

@section('css')
    @toastr_css
@endsection

@section('pageInfo')

    <div class="col-sm-6">
        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="default-color">Questions </a></li>
            <li class="breadcrumb-item active"> Questions </li>
        </ol>

    </div>

@endsection

@section('title')
    Questions
@endsection

@section('page-header')
    Questions
@endsection

@section('PageTitle')
    Questions
@endsection


@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('questions.index')}}" class="btn btn-success btn-sm" role="button"
                       aria-pressed="true">قائمة الاسئلة</a><br><br>
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
                            <form action="{{ route('questions.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title"> arاسم السؤال</label>
                                        <input type="text" name="title_ar" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>

                                    <div class="col">
                                        <label for="title"> en اسم السؤال</label>
                                        <input type="text" name="title_en" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">الاجابات ar </label>
                                        <textarea name="answers_ar" class="form-control" id="exampleFormControlTextarea1"
                                                  rows="4"></textarea>
                                    </div>

                                    <div class="col">
                                        <label for="title"> en الاجابات</label>
                                        <textarea name="answers_en" class="form-control" id="exampleFormControlTextarea1"
                                                  rows="4"></textarea>
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">الاجابة الصحيحة ar</label>
                                        <input type="text" name="right_ar" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>

                                    <div class="col">
                                        <label for="title">en الاجابة الصحيحة</label>
                                        <input type="text" name="right_en" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">اسم الاختبار : <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="quizze_id">
                                                <option selected disabled>حدد اسم الاختبار...</option>
                                                @foreach($quizzes as $quizze)
                                                    <option value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">الدرجة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled> حدد الدرجة...</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
