<div class="card-body">
    <h5 class="card-title">Social Link Settings</h5>
    <hr>
    <form class="form-horizontal" action="{{ route('admin.settings.update') }}" method="post" role="form">
        @csrf
        <div class="form-group">
            <label for="facebok">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ config('settings.social_facebook') }}" placeholder="enter facebook profile link">
        </div>
        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="enter twitter profile link" value="{{ config('settings.social_twitter') }}">
        </div>
        <div class="form-group">
            <label for="instagram">instagram</label>
            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="enter instagram profile link" value="{{ config('settings.social_instagram') }}">
        </div>
        <div class="form-group">
            <label for="linkedin">Linkedin</label>
            <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="enter linkedin profile link" value="{{ config('settings.social_linekdin') }}">
        </div>
        <div class="mt-2">
            <button class="btn btn-success" type="submit">Update Settings</button>
        </div>
    </form>
</div>