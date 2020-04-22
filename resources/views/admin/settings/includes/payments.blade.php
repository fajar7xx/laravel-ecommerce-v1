<div class="card-body">
    <h5 class="card-title">Payments</h5>
    <hr>
    <form class="form-horizontal" action="{{ route('admin.settings.update') }}" method="post" role="form">
        @csrf
       <div class="form-group">
           <label for="stripe_payment_method">Stripe Payment Method</label>
           <select name="stripe_payment_method" id="stripe_payment_method" class="form-control">
               <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected':'' }}>Enabled</option>
               <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected':'' }}>Disabled</option>
           </select>
       </div>
       <div class="form-group">
           <label for="stripe_key">Stripe Key</label>
           <input type="text" class="form-control" name="stripe_key" id="stripe_key" placeholder="enter stripe key" value="{{ config('settings.stripe_key') }}">
       </div>
       <div class="form-group">
           <label for="secret_key">secret key</label>
           <input type="text" class="form-control" name="secret_key" id="secret_key" value="{{ config('settings.stripe_secret_key') }}" placeholder="enter stripe secret key">
       </div>

       <hr>

       <div class="form-group">
           <label for="paypal_payment_method">Paypal payment Method</label>
           <select name="paypal_payment_method" id="paypal_payment_method" class="form-control">
                <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected':'' }}>Enabled</option>
                <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected':'' }}>Disabled</option>
           </select>
       </div>
       <div class="form-group">
           <label for="client_id">Client ID</label>
           <input type="text" class="form-control" name="client_id" id="client_id" placeholder="enter paypal client id" value="{{ config('settings.paypal_client_id') }}">
       </div>
       <div class="form-group">
           <label for="secret_id">Secret ID</label>
           <input type="text" class="form-control" name="secret_id" id="secret_id" placeholder="enter paypal secret id" value="{{ config('settings.paypal_secret_id') }}">
       </div>
        <div class="mt-2">
            <button class="btn btn-success" type="submit">Update Settings</button>
        </div>
    </form>
</div>