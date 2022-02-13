<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                    id="exampleModalLabel">
                    {{ trans('classroom.add_classroom') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('classroom.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" name="name" class="form-control"
                                   placeholder="{{ trans('classroom.class_name_ar') }}">
                        </div>

                        <div class="col">
                            <input type="text" name="name_en" class="form-control"
                                   placeholder="{{ trans('classroom.class_name_en') }}">
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col">
                            <div class="form-check">

                                    <input
                                        type="checkbox"

                                        class="form-check-input"
                                        name="Status"
                                        id="exampleCheck1">

                                <label
                                    class="form-check-label"
                                    for="exampleCheck1">{{ trans('classroom.status') }}</label><br>

                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('Grades_list.name') }}</label>
                        <select name="Grade_id" class="custom-select"
                                onchange="console.log($(this).val())">
                            <!--placeholder-->
                            <option value="" selected
                                    disabled>{{ trans('Grades_list.chose_grade') }}
                            </option>
                            @foreach ($Grades as $grade)
                                <option value="{{ $grade->id }}"> {{ $grade->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('school_year.name') }}</label>
                        <select name="school_year_id" class="custom-select">

                        </select>
                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('teacher_trans.Name_Teacher') }}</label>
                        <select multiple name="teacher_id[]" class="custom-select">
                            <!--placeholder-->
                            <option value="" selected
                                    disabled>{{ trans('Grades_list.chose_grade') }}
                            </option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"> {{ $teacher->Name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <br>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('classroom.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


