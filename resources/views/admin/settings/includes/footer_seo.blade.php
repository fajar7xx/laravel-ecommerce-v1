<div class="card-body">
    <h5 class="card-title">Footer and SEO Settings</h5>
    <hr>
    <form class="form-horizontal" action="{{ route('admin.settings.update') }}" method="post" role="form">
        @csrf
        <div class="form-group">
            <label for="footer">Footer</label>
            <textarea name="footer" id="footer" rows="5" class="form-control">{{ config('settings.footer_copyright_text') }}</textarea>
        </div>
        <div class="form-group">
            <label for="meta_title">Seo Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ config('settings.seo_meta_title') }}">
        </div>
        <div class="form-group">
            <label for="meta_description">SEO Meta Description</label>
            <textarea name="meta_description" id="meta_description" rows="5" class="form-control">{{ config('settings.seo_meta_description') }}</textarea>
        </div>

        <div class="mt-2">
            <button class="btn btn-success" type="submit">Update Settings</button>
        </div>
    </form>
</div>