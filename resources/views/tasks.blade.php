@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの表示に使用するエラーファイル-->
  @include('common.errors')
  <!-- タスク登録フォーム -->

  <!-- この下に登録済みタスクリストを表示 -->
  <!-- 表示領域 -->
@if (count($tasks) > 0)
<div class="mainBox">
  <img class="daily_background" src="{{asset('css/background.jpg')}}" alt="" width="375px" height="667px">
  
  <div class="wrapper">
    <div class="title">TASK</div>
    
    <!--以下、コピー-->
    <div class="incomplete_list">
        <ul id="list">
            <li class="item">
                <i class="fas fa-star"></i>
                <p id="selected_task"></p>
                <!-- <i class="fas fa-edit"></i> -->
                <i class="far fa-trash-alt"></i>
            </li>
        </ul>
        @foreach ($tasks as $task)
        <ul id='list'>
            <li class='item'>
                <i class="fas fa-star"></i>
                <!--<p id="selected_task">-->
                    <form action="{{ route('tasks.edit',$task->id) }}" method="GET" class="nowtask">
                       <!--<p id="selected_task">-->
                        @csrf
                       
                  <button type="submit" class="atask"> {{ $task->task }}</button>
                       <!--</p>-->
                    </form>
                <!--</p>-->
                 <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                    @method('delete')
                    @csrf　
                    <button type="submit" class="trash_button">
                      <i class="far fa-trash-alt"> 
                </i>
                    </button>
                 </form>
            </li>
        </ul>
        @endforeach
    </div>
    @endif
    
    <!--コピー以上-->
    
    <!--  <div>-->
    <!--    <table>-->
          <!-- テーブルヘッダ -->
     
          <!-- テーブル本体 -->
    <!--      <tbody>-->
    <!--        @foreach ($tasks as $task)-->
    <!--        <tr>-->
    <!--          <td>-->
    <!--            <div>{{ $task->task }}</div>-->
    <!--          </td>-->
              <!--<td >-->
              <!--  <div>{{ $task->deadline }}</div>-->
              <!--</td>-->
              <!--<td>-->
              <!--  <div>{{ $task->comment }}</div>-->
              <!--</td>-->
              <!-- 更新ボタン -->
    <!--          <td>-->
    <!--            <form action="{{ route('tasks.edit',$task->id) }}" method="GET">-->
    <!--              @csrf-->
    <!--              <button type="submit" >更新</button>-->
    <!--            </form>-->
    <!--          </td>-->
    <!--          <td>-->
                <!-- 削除ボタン -->
    <!--              <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">-->
    <!--                @method('delete')-->
    <!--                @csrf-->
    <!--                <button type="submit">削除</button>-->
    <!--              </form>-->
    <!--          </td>-->
    <!--        </tr>-->
    <!--        @endforeach-->
    <!--      </tbody>-->
    <!--  </table>-->
    <!--</div>-->
    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
    @csrf
      <div>
        <!-- タスク名 -->
        <div>
          <label for="task">Task</label>
          <input type="text" name="task" id="task">
        </div>
        <!-- deadline -->
        <div>
          <label for="deadline">Deadline</label>
          <input type="date" name="deadline" id="deadline">
        </div>
        <!-- comment -->
        <div>
          <label for="comment">Comment</label>
          <input type="text" name="comment" id="comment">
        </div>
      </div>
    <!-- タスク登録ボタン -->
      <div>
        <div>
          <button type="submit">Save</button>
        </div>
      </div>
    </form>
  </div>

<!-- ここまでタスクリスト -->
</div>
@endsection