
@if(session()->has('user'))

    <div >
        <h3>{{(isset($comment)? 'Edit a Comment' : 'Leave a Comment')}}</h3>
        <form action="{{(isset($comment)) ? route('EditComment', ['id' => $comment->commID]) : route('InsertComment', ['menuId' => $singleMenu->menuID ])  }}" method="POST">
            @csrf
            <textarea  name="comment" cols="77" rows="3" placeholder="Say something....">
            {{ (isset($comment)? $comment->content : old('comment')) }}
        </textarea><br/>

            <input type="submit" value="{{ (isset($comment)? 'Update': 'Send') }}" class="btn-outline-primary">
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @else
        <h4>In order to comment, you must <a href="{{ route('ShowLoginForm') }}">login</a> first</h4>
    @endif

