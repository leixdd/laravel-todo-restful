@extends('layouts/lay')

@section('content')




 <div class="container" style="margin-top: 5%">
   
   @if(Session::has('message'))
     <div class="alert alert-info fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{Session::get('message')}}
     </div>
   @endif

   <div class="row">
     <div class="col-lg-12">
       <div class="panel panel-primary">

          <div class="panel-heading">
             {!! Form::open(array('action' => 'todoCnt@store', 'class'=> 'form-inline', 'enctype' => 'multipart/form-data')) !!}
              {!! Form::text('task_name', $value = null, $attributes = ['required','class' => 'form-control', 'name' => 'task_name', 'placeholder' => 'Add new Task']) !!}
              {!! Form::submit('Submit',$attributes = ['class' => 'btn btn-success btn-md']); !!}
             {!! Form::close() !!}
           </div>

           <div class="panel-body">
             <ul class="list-group">
               @foreach($todos as $todo => $t)
                <a href="/todo/{{$t->id}}" class="list-group-item">{{$t->task_name}}</a>
               @endforeach
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

@endsection
