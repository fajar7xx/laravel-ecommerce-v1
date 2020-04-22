<div class="card-body">
    <h5 class="card-title">General Settings</h5>
    <hr>
    <form class="form-horizontal" action="{{ route('admin.settings.update') }}" method="post" role="form">
        @csrf
        <div class="form-group">
            <label for="site_name">Site Name</label>
            <input 
                type="text" 
                placeholder="enter site name" 
                class="form-control" 
                name="site_name"
                id="site_name" 
                value="{{ Config::get('') }}"
            >
        </div>
        <div class="form-group">
            <label for="site_title">Site Title</label>
            <input 
                type="text" 
                placeholder="enter site title" 
                class="form-control" 
                name="site_title"
                id="site_title" 
                value="{{ config('settings.site_title') }}"
            >
        </div>
        <div class="form-group">
            <label for="default_email_address">Default Email Address</label>
            <input 
                type="email" 
                placeholder="enter email address" 
                class="form-control" 
                name="default_email_address"
                id="default_email_address" 
                value="{{ config('settings.default_email_address') }}"
            >
        </div>
        <div class="form-group">
            <label for="currency_code">Currency Code</label>
            <input 
                type="text" 
                placeholder="enter Currency Code" 
                class="form-control" 
                name="currency_code"
                id="currency_code" 
                value="{{ config('settings.currency_code') }}"
            >
        </div>
        <div class="form-group">
            <label for="currency_symbol">Currency Symbol</label>
            <input 
                type="text" 
                placeholder="enter Currency Symbol" 
                class="form-control" 
                name="currency_symbol"
                id="currency_symbol" 
                value="{{ config('settings.currency_symbol') }}"
            >
        </div>
        <button class="btn btn-success" type="submit">Update Settings</button>
    </form>
</div>