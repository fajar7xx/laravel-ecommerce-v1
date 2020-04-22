<div class="card-body">
    <h5 class="card-title">Site Logo</h5>
    <hr>
    <form class="form-horizontal" action="{{ route('admin.settings.update') }}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col-3"> 
                @if (config('settings.site_logo') != null)
                    <img src="{{ asset('storage/' . config('settings.site_logo')) }}" id="logoImg" style="width: 80px; height: auto;">
                @else
                    <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">
                @endif
            </div>
            <div class="form-group col-9">
                <label for="site_logo">Site Logo</label>
                <input 
                    type="file"  
                    class="form-control-file" 
                    name="site_logo"
                    id="site_logo" 
                    onchange="loadFile(event, 'logoImg')"
                >
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-3"> 
                @if (config('settings.sit_favicon') != null)
                    <img src="{{ asset('storage/' . config('settings.site_favicon')) }}" id="faviconImg" style="width: 80px; height: auto;">
                @else
                    <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                @endif
            </div>
            <div class="form-group col-9">
                <label for="site_favicon">Site Favicon</label>
                <input 
                    type="file" 
                    class="form-control-file" 
                    name="site_favicon"
                    id="site_favicon"
                    onchange="loadFile(event, 'faviconImg')" 
                >
            </div>
        </div>

        <div class="mt-2">
            <button class="btn btn-success" type="submit">Update Settings</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // script ini digunakan untuk mengubah img sebelum nya menjadi 
    // image preview sebelum d upload
    loadFile = function(event, id){
        let output = document.getElementById(id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endpush