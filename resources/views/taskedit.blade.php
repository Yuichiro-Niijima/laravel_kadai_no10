@extends('layouts.app')
@section('content')
<div>
  <div class="mainBox">
    <img class="daily_background" src="{{asset('css/background.jpg')}}" alt="" width="375px" height="667px">
    <div class="wrapper_ediet">
    
        @include('common.errors')
        <form action="{{ route('tasks.update',$task->id)}}" method="POST">
          @method('PUT')
          @csrf
          
          <!-- task -->
          <div class="titleBox">
            <label for="task" class="task">{{$task->task}}</label>
            <input type="hidden" id="task" name="task" value="{{$task->task}}">
          </div>
          <!--timer--->


          <div class="timer_Box" id="startBtn">
              <label for="time"></label>
              <a class="btn-circle-fishy" id="timer" class="time" name="timer">25:00</a>
               <input type="hidden" id="comment" name="comment" value="{{$task->time}}">
          </div>
          <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
          
          <script>
            // $(".task").on("click", function(){
            //   alert("ok");
            // })
          </script>
          <!--timer jQuery-->
          <script>
        
        
    </script>
          
          
          <!-- deadline -->
          <div>
            <!--<label for="deadline">Deadline</label>-->
            <input type="hidden" id="deadline" name="deadline" value="{{$task->deadline}}">
          </div>
          <!-- comment -->
          <div>
            <!--<label for="comment">Comment</label>-->
            <input type="hidden" id="comment" name="comment" value="{{$task->comment}}">
          </div>
          
          
          <!--outcomeへ遷移-->
          <!--<form action="{{ route('tasks.edit',$task->id) }}" method="GET" class="nowtask">-->
          <!--             <p id="selected_task">-->
          <!--              @csrf-->
                       
                  <!--<button type="submit" class="atask">{{ $task->task }}</button>-->
          <!--             </p>-->
          <!--</form>-->
          
          <!-- Saveボタン/Backボタン -->
          <div class="analysis_buttonBox">
            <button type="submit" class="analysis_button" id="resetBtn">Done</button>
            <!--<a href="{{ route('tasks.index') }}">Back</a>-->
          </div>
        </form>
    </div>
  </div>
</div>
@endsection