<div class="modal fade"
     id="edit{{ $classroom->id }}"
     tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    style="font-family: 'Cairo', sans-serif;"
                    id="exampleModalLabel">
                    {{ trans('classroom.edit_classroom') }}
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form
                    action="{{route('classroom.update','test')}}"
                    method="POST">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ $classroom->getTranslation('name', 'ar') }}">
                        </div>

                        <div class="col">
                            <input type="text"
                                   name="name_en"
                                   class="form-control"
                                   value="{{ $classroom->getTranslation('name', 'en') }}">
                            <input id="id"
                                   type="hidden"
                                   name="id"
                                   class="form-control"
                                   value="{{ $classroom->id }}">
                        </div>

                    </div>
                    <br>


                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('classroom.grade') }}</label>
                        <select name="Grade_id"
                                class="custom-select"
                                onclick="console.log($(this).val())">
                            <!--placeholder-->
                            @foreach ($Grades as $Grade)
                                <option
                                    value="{{ $Grade->id }}" @if($Grade->id == $classroom->grade->id )selected @endif >
                                    {{ $Grade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <label for="inputName"
                               class="control-label">{{ trans('classroom.schoolYear') }}</label>
                        <select name="school_year_id"
                                class="custom-select">
                            <option
                                value="{{ $school_year->id }}">
                                {{ $school_year->name }}
                            </option>
                        </select>
                    </div>
                    <br>

                    <div class="col">
                        <div class="form-check">

                            @if ($classroom->status === 1)
                                <input
                                    type="checkbox"
                                    checked
                                    class="form-check-input"
                                    name="status"
                                    id="exampleCheck1">
                            @else
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="status"
                                    id="exampleCheck1">
                            @endif
                            <label
                                class="form-check-label"
                                for="exampleCheck1">{{ trans('classroom.status') }}</label><br>


                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                <button type="submit"
                        class="btn btn-danger">{{ trans('classroom.update') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
