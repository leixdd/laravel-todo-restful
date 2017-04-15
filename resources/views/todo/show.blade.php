@extends('layouts/lay')

@section('content')

  <div class="container" style="margin-top: 5%">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
             Task - " {{$todo->task_name}}"
          </div>
          <div class="panel-body">
            <div class="panel panel-default">
              <div class="panel-heading">
                Edit this task name
              </div>
              <div class="panel-body">
                {!! Form::open(array('action' => ['todoCnt@update', $todo->id], 'class'=> 'form-inline', 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
                  {!! Form::text('task_name', $value = $todo->task_name, $attributes = ['required','class' => 'form-control', 'name' => 'task_name', 'placeholder' => 'Add new Task']) !!}
                  {!! Form::submit('Submit',$attributes = ['class' => 'btn btn-success btn-md']); !!}
                {!! Form::close() !!}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                Delete this task
              </div>
              <div class="panel-body">
                <div class="text-center">
                  {!! Form::open(array('action' => ['todoCnt@destroy', $todo->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) !!}
                      <button type="submit" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp; Delete this task</button>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
