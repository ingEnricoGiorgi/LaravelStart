<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{url('ideas')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea  name="ideaTextarea" class="form-control" id="idea" rows="3"></textarea>
            @error('ideaTextarea')
            <span class="fs-6 text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share</button>
        </div>
    </form>
</div>
<hr>
