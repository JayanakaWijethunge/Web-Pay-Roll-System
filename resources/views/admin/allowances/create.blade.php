@extends('app')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    New Allowance
                </div>
                <div class="panel-body">

                    <form action="{{ route("allowances.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
                            <label for="employee">Employee No*</label>
                            <select name="employee_id" id="employee" class="form-control select2" required>
                                @foreach($employees as $id => $employee)
                                    <option value="{{ $id }}" {{ (isset($allowance) && $allowance->employee ? $allowance->employee->id : old('employee_id')) == $id ? 'selected' : '' }}>{{ $employee }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('employee_id'))
                                <p class="help-block">
                                    {{ $errors->first('employee_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                            <label for="year">Year</label>
                            <select id="year" name="year" class="form-control">
                                <option value="" disabled {{ old('year', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Allowance::YEAR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('year', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('year'))
                                <p class="help-block">
                                    {{ $errors->first('year') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('month') ? 'has-error' : '' }}">
                            <label for="month">Month*</label>
                            <select id="month" name="month" class="form-control" required>
                                <option value="" disabled {{ old('month', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Allowance::MONTH_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('month', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('month'))
                                <p class="help-block">
                                    {{ $errors->first('month') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('allowance_type') ? 'has-error' : '' }}">
                            <label for="allowance_type">Allowance type*</label>
                            <input type="varchar" id="allowance_type" name="allowance_type" class="form-control" value="{{ old('allowance_type', isset($allowance) ? $allowance->allowance_type : '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <p class="help-block">
                                    {{ $errors->first('allowance_type') }}
                                </p>
                            @endif

                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label for="amount">Amount*</label>
                            <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount', isset($allowance) ? $allowance->amount : '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <p class="help-block">
                                    {{ $errors->first('amount') }}
                                </p>
                            @endif

                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="Save">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection