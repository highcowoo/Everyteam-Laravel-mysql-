<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/main.css" />
    @include('header')
</head> 
<script>
  function Click(){
    if(confirm("정말 삭제하시겠습니까? 삭제후에는 복구가 불가능합니다")==true){
      document.forma.submit();
    }
    else{
      return;
    }
  }
  </script>

<body>   

<div class="mainl basicl">
    <div class="infosmalll">
    <br> <a class="titletext">팀 정보</a>
    
    <table class="list-table">
        <thead>
            <tr>
                 <th width="100">분류</th>
                 <th width="500">제목</th>
                 <th width="250">모임위치</th>
                 <th width="80">모집인원</th>
              </tr>
        <tbody>
            <tr>
                <td width="100">{{$team -> class}}</td>
                <td width="500">{{$team -> title}}</td>
                <td width="250">{{$team -> address}}</td>
                <td width="80">{{$team -> countm}}</td>
            </tr>
       </thead>
        </tbody>
     </table>
      <table class="list-table">
        <thead>
            <tr>
                 <th width="464">공고 게시일</th>
                 <th width="464">최종 수정일</th>
              </tr>
        <tbody>
        
            <tr>
                <td width="464">{{$team -> created_at}}</td>
                <td width="464">{{$team -> updated_at}}</td>
        </tr>
    </thead>
        </tbody>
      </table>
<div class="teaminfotextboxl">
      <table class="list-table">
        <thead>
            <tr>
                 <th width="930">상세내용</th>
              </tr>
      <tbody>
            <tr>
               <td><div class="teaminfotextbox">{{$team -> content}}</div></td> 
        </tr>
      </tbody>
    </thead>
      </table>
      <table class="list-table">
        <thead>
            <tr>
                 <th width="464">이름</th>
                 <th width="464">이메일</th>
                 <th width="464">채팅방</th>
 
              </tr>
        <tbody>
            @foreach ($voluser as $item)
            <tr>
                <td width="464">{{$item -> name}}</td>
                <td width="464">{{$item -> email}}</td>
                <td width="464"><a href="{{$item -> kakao}}" target="_blank" >채팅입장하기</a></td>
            </tr>
           @endforeach 
    </thead>
        </tbody>
      </table>
  

      <form name="forma" action="{{ route('apps.delete') }}" method="POST">
        @csrf
      <input type="hidden" name="teamid" value="{{$team -> id}}">
      <input type="hidden" name="userid" value="{{Auth::user()->id}}">
      <input type="button" class="create_team_button" value="삭제" onclick="Click()">
      </form>

    </div>
    

</div>
</div>
@include("bottom")
</body>

</html>