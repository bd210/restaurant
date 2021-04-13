

@isset($singleMenu)
    <!-- Sadrzaj -->

    <div class="col-md-8">


        <!-- Title -->
       <h1 class="mt-4"> <b style="color: #cda45e">{{ $singleMenu->name }}</b> - <span class="glyphicon glyphicon-eye-open"></span> Hits: {{ $singleMenu->visits }}<br/><br/></h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="{{ route('UserProfile', ['id'=>$singleMenu->userID]) }}">{{ $singleMenu->first_name . " " . $singleMenu->last_name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <b style="color: #cda45e">{{ date("F j, Y H:i", strtotime($singleMenu->created)) }} </b></p>

        <p> Price :<b style="color: #cda45e"> ${{ $singleMenu->price }} </b></p>
        <p> Description : <b style="color: #cda45e"> {{ $singleMenu->description }} </b></p>
        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ asset('/'. $singleMenu->src) }}" alt="{{$singleMenu->alt}}">

        <hr>

        <!-- Post Content -->
        <p> </p>

        <hr>

        <!-- Comments Form -->

        <!--// Comments Form -->
    @isset($comments)
        @foreach($comments as $comm)
            <!-- Single Comment -->
                <div class="media mb-4">
                    @if($comm->src != null)
                        <img src="{{ asset('/'.$comm->src) }}" alt="{{ $comm->alt }}" style="width: 150px; height: 150px;"   class="comment-img  float-left"/>
                    @else
                        <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $comm->alt }}" style="width: 150px; height: 150px;"  class="comment-img  float-left"  />
                    @endif
                    <div class="media-body">
                        <h5 class="mt-0"><a href="{{  route('UserProfile', ['id'=>$comm->userID]) }}" >
                                {{ $comm->first_name . " " . $comm->last_name }}</a> <br/>  created - {{ date("F j, Y H:i", strtotime($comm->created)) }}  @if($comm->modified != null)
                                    <p> modified -  {{  date("F j, Y H:i", strtotime($comm->modified)) }} </p>
                                @endif</h5>

                        <i class="bx bxs-quote-alt-left quote-icon-left" style="color:#8a6d3b "></i>
                        {{ $comm->content  }}
                        <i class="bx bxs-quote-alt-right quote-icon-right" style="color:#8a6d3b "></i>

                        @if(session()->has('user'))
                            <p>        @if(session()->get('user')->id == $comm->userID || session()->get('user')->roleName == 'admin')

                                    <a href="{{ route('DeleteComment', ['id' => $comm->commID]) }}">Delete </a>
                                @endif
                                @if(session()->get('user')->id == $comm->userID)
                                    <a href="{{ route('ShowComment', ['id' => $comm->commID]) }}">Edit </a>
                                @endif
                        </p>
                        @endif

                    </div>
                </div>
                <!--// Single Comment -->
            @endforeach
        @if(count($comments) == 0)
        <h3 style="color: red">THERE ARE NO COMMENTS YET</h3>
            @endif
        @endisset
    </div>
    <!--// Sadrzaj -->

        <!-- All comments -->

        <!-- Insert comment -->
    @include('components.commentForm')

@else
    <div  style="text-align: center; ">
    <p style="font-size: 50px;color: red">MENU DOES NOT EXIST</p>

    </div>
@endisset


