<!--
@isset($comments)

<div class="comments">

    <h4 class="comments-count" >{{ $commInfo[0]->countID }} Comment(s)</h4>
    @foreach($comments as $comm)
        <div class="blog-comments">

      <div id="comment-1" class="comment clearfix" style="border: 1px solid red;">

          @if($comm->src != null)
              <img src="{{ asset('/'.$comm->src) }}" alt="{{ $comm->alt }}" style="width: 100px; height: 100px;"   class="comment-img  float-left"/>
          @else
              <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $comm->alt }}" style="width: 100px; height: 100px;"  class="comment-img  float-left"  />
          @endif


                <h5><a href="{{ route('UserProfile', ['id'=> $comm->userID]) }}">{{ $comm->first_name . " " . $comm->last_name }}</a> </h5>
                <time >{{ date("F j, Y H:i", strtotime($comm->created)) }}</time>
                <p>
                    {{ '" ' . $comm->content . ' " ' }}
                </p>
            <p>@if(session()->has('user'))
        @if(session()->get('user')->id == $comm->id_user || session()->get('user')->roleName == 'admin')

                 <a href="{{ route('DeleteComment', ['id' => $comm->commID]) }}">Delete <span class="glyphicon glyphicon-trash"></span></a>
                   @endif
                @if(session()->get('user')->id == $comm->id_user)
                   <a href="{{ route('ShowComment', ['id' => $comm->commID]) }}">Edit <i class="fa fa-edit"></i></a>
                @endif
            </p>
          @endif
            </div>
    </div>
    @endforeach
</div>
@else
<h3>No comments</h3>
@endif

-->

<!-- START -->






