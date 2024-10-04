<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{url('idea')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea  name="ideaTextarea" class="form-control" id="idea" rows="3"></textarea>
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share</button>
        </div>
    </form>
</div>
<hr>
