<form role="form" method="post" action="">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名：</label>
        <div class="col-sm-5">
            <input type="text" name="Student[name]" value="{{ old('Student')['name'] ? old('Student')['name'] : $student->name }}"
                   class="form-control" id="exampleInputEmail1" placeholder="Enter name">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.name') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄：</label>
        <div class="col-sm-5">
            <input type="text" name="Student[age]" value="{{ old('Student')['age'] ? old('Student')['age'] : $student->age }}"
                   class="form-control" id="exampleInputPassword1" placeholder="Enter age">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.age') }}</p>
        </div>
    </div>

    <div class="form-group">
        <label for="sex" class="col-sm-2 control-label">性别：</label>
        <div class="col-sm-5">
            @foreach($student->getSex() as $key=>$val)
                <label class="radio-inline">
                    <input type="radio" name="Student[sex]"
                           {{ (isset(old('Student')['sex']) && old('Student')['sex'] == $key) ? 'checked' : ((isset($student->sex) && $student->sex == $key) ? 'checked' : '') }}
                           id="inlineRadio1" value="{{ $key }}"> {{ $val }}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.sex') }}</p>
        </div>
    </div>

    <button type="submit" class="btn btn-default">提交</button>
</form>