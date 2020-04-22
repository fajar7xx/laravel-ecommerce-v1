<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{

    protected $settings = [
        [
            'key' => 'Site_name',
            'value' => 'Ecommerce Application',
        ],
        [
            'key' => 'site_title',
            'value' => 'E-Commerce',
        ],
        [
            'key' => 'default_email_address',
            'value' => 'admin@mail.com',
        ],
        [
            'key' => 'currency_code',
            'value' => 'IDR',
        ],
        [
            'key' => 'currency_symbol',
            'value' => 'Rp',
        ],
        [
            'key' => 'site_logo',
            'value' => '',
        ],
        [
            'key' => 'site_favicon',
            'value' => '',
        ],
        [
            'key' => 'footer_copyright_text',
            'value' => '',
        ],
        [
            'key' => 'seo_meta_title',
            'value' => '',
        ],
        [
            'key' => 'seo_meta_description',
            'value' => '',
        ],
        [
            'key' => 'social_facebook',
            'value' => '',
        ],
        [
            'key' => 'social_twitter',
            'value' => '',
        ],
        [
            'key' => 'social_instagram',
            'value' => ''
        ],
        [
            'key' => 'social_linkedin',
            'value' => ''
        ],
        [
            'key' => 'google_analitycs',
            'value' => '',
        ],
        [
            'key' => 'facebook_pixels',
            'value' => '',
        ],
        [
            'key' => 'stripe_payment_method',
            'value' => '',
        ],
        [
            'key' => 'stripe_key',
            'value' => '',
        ],
        [
            'key' => 'stripe_secret_key',
            'value' => '',
        ],
        [
            'key' => 'paypal_payment_method',
            'value' => '',
        ],
        [
            'key' => 'paypal_client_id',
            'value' => '',
        ],
        [
            'key' => 'paypal_secret_id',
            'value' => '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->settings as $index => $setting){
            $result = Setting::create($setting);
            if(!$result){
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->settings) . ' records');
    }
}
