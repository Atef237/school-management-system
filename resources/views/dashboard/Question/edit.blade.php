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
                            <form action="{{ route('questions.update','test') }}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">اسم السؤال ar</label>
                                        <input type="text" name="title_ar" id="input-name"
                                               class="form-control form-control-alternative" value="{{$question->getTranslation('title','ar')}}">
                                        <input type="hidden" name="id" value="{{$question->id}}">
                                    </div>

                                    <div class="col">
                                        <label for="title">اسم السؤال en</label>
                                        <input type="text" name="title_en" id="input-name"
                                               class="form-control form-control-alternative" value="{{$question->getTranslation('title','en')}}">
                                        <input type="hidden" name="id" value="{{$question->id}}">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">الاجابات</label>
                                        <textarea name="answers_ar" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$question->getTranslation('answers','ar')}}</textarea>
                                    </div>

                                    <div class="col">
                                        <label for="title">الاجابات</label>
                                        <textarea name="answers_en" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$question->getTranslation('answers','en')}}</textarea>
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">الاجابة الصحيحة</label>
                                        <input type="text" name="right_ar" id="input-name" class="form-control form-control-alternative" value="{{$question->getTranslation('right_answer','ar')}}">
                                    </div>

                                    <div class="col">
                                        <label for="title">الاجابة الصحيحة</label>
                                        <input type="text" name="right_en" id="input-name" class="form-control form-control-alternative" value="{{$question->getTranslation('right_answer','en')}}">
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
                                                    <option value="{{ $quizze->id }}" {{$quizze->id == $question->quizze_id ? 'selected':'' }} >{{ $quizze->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">الدرجة : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled> حدد الدرجة...</option>
                                                <option value="5" {{$question->score == 5 ? 'selected':''}}>5</option>
                                                <option value="10" {{$question->score == 10 ? 'selected':''}}>10</option>
                                                <option value="15" {{$question->score == 15 ? 'selected':''}}>15</option>
                                                <option value="20" {{$question->score == 20 ? 'selected':''}}>20</option>
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
