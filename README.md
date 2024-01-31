# Laravel Spatie Activitylog Package
<hr/>
<h5>Use for tracking user activity on the application</h5>
<h6>Installation, Setup & Usage: </h6>
<h6>Setup:</h6>
<ul>
<li>Package official link <a href="https://spatie.be/docs/laravel-activitylog/v4/installation-and-setup">Link</a></li>
<li>composer require spatie/laravel-activitylog</li>
<li>php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-migrations"</li>
<li>php artisan migrate</li>
<li>php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="activitylog-config"</li>
<li>Installation Done!</li>
</ul>
<h6>Usage:</h6>
<ul>
<li>To auto store Model events like created, updated, deleted you can use as below</li>
<li>On your model</li>
<li>use Spatie\Activitylog\Traits\LogsActivity;</li>
<li>use Spatie\Activitylog\LogOptions;</li>
<li>Inside class use LogsActivity</li>
<li>To set activity log name you can do as below into your model class</li>
<li>
 // use this name for logging
    public function getLogNameToUse(string $eventName = ''): string
    {
        return 'Marketplace';
    }
</li>
<li>To track which activities are performed, you can set below on your model</li>
<li>
 // the filed that will add in activity properties
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name']);
    }
</li>
<li>Check web.php file and User Model to confirm</li>
<li>To reuse code use this advance useages</li>
<li>Just add Loggable.php as a trait on your application, and just use the trait into your Model, dont need to call anything from your model, just use the Loggable trait.</li>
<li>Syntax with specific guard: // Log an activity for the 'admin' guard
activity()->useLog('admin')->log('Some activity for admin user');

// Log an activity for the 'user' guard
activity()->useLog('user')->log('Some activity for user');</li>
</ul>
<h5>Author: Mazharul Islam</h5>
<h6>mazharulislam1998r@gmail.com</h6>
<h6>Date: 30th January, 2024</h6>
