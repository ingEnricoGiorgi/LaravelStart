<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="{{$idea->user->getImageURL()}}" alt="User Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>

            <div>
                <form method="POST" action="{{route('ideas.destroy', $idea->id)}}">
                    @csrf
                    @method('delete')
                    <a class='mx-2' href="{{route('ideas.show', $idea->id)}}">Show</a>
                    @auth()
                        <a class='mx-2' href="{{route('ideas.edit', $idea->id)}}">Edit</a>
                        <button class="btn btn-danger btn-sm">X</button>
                    @endauth
                </form>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if($editing ?? false)
            <!--se non è impostata metto false di base -->
            <form action="{{route('ideas.update', $idea->id)}}" method="post">
                @csrf
                @method('put') <!--devo dichiarare che è un update request -->
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{$idea->content}}</textarea>
                    @error('content')
                    <span class="fs-6 text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{$idea->content}}
            </p>
        @endif
        <div class="d-flex justify-content-between">

            @include('ideas.shared.like-button')

            <div>
                                    <span class="fs-6 fw-light text-muted">
                                        <span class="fas fa-clock">

                                        {{$idea->created_at}}
                                        </span>
                                    </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
