<div class="card-body">
    <h5 class="card-title">Analytics</h5>
    <hr>
    <form class="form-horizontal" action="{{ route('admin.settings.update') }}" method="post" role="form">
        @csrf
        <div class="form-group">
            <label for="google_analytics">Google Analitycs</label>
            <textarea name="google_analytics" id="google_analytics" rows="5" class="form-control">{!! Config::get('settings.google_analytics') !!}</textarea>
        </div>
        <div class="form-group">
            <label for="facebook_pixels">Facebook Pixels</label>
            <textarea name="facebook_pixels" id="facebok_pixels" rows="5" class="form-control">{!! Config::get('settings.facebok_pixels') !!}</textarea>
        </div>
        <div class="mt-2">
            <button class="btn btn-success" type="submit">Update Settings</button>
        </div>
    </form>
</div>