# Google reCAPTCHA v3 Setup Guide

This guide explains how to set up and use Google reCAPTCHA v3 for the contact form.

## Overview

Google reCAPTCHA v3 has been integrated into the Contact Livewire component. Unlike v2, reCAPTCHA v3 runs in the background and doesn't require user interaction (no checkbox). It returns a score (0.0 - 1.0) indicating how likely the user is human.

## Features Implemented

-   ✅ reCAPTCHA v3 script loaded directly from Google (no package required)
-   ✅ Token generation on form submission
-   ✅ Server-side verification with score checking (threshold: 0.5)
-   ✅ IP address tracking for better verification
-   ✅ Error handling and user feedback

## Setup Instructions

### 1. Get reCAPTCHA v3 Keys

1. Visit [Google reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin)
2. Click on "+" to create a new site
3. Fill in the details:
    - **Label**: Your site name (e.g., "Airnet Technologies Contact Form")
    - **reCAPTCHA type**: Select **reCAPTCHA v3**
    - **Domains**: Add your domains (e.g., `airnet-technologies.com`, `localhost` for testing)
4. Accept the terms and submit
5. You'll receive:
    - **Site Key** (used in frontend)
    - **Secret Key** (used in backend verification)

### 2. Configure Environment Variables

Add the following to your `.env` file:

```env
RECAPTCHA_SITE_KEY=your_actual_site_key_here
RECAPTCHA_SECRET_KEY=your_actual_secret_key_here
```

**Important**: Replace the placeholder values in your `.env` file with the actual keys from Google reCAPTCHA.

### 3. Clear Configuration Cache

After updating the `.env` file, clear the configuration cache:

```bash
php artisan config:clear
```

## How It Works

### Frontend (Blade Template)

The `contact.blade.php` file includes:

1. **reCAPTCHA Script**: Loaded from Google's CDN

    ```html
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    ```

2. **Hidden Input**: Stores the reCAPTCHA token

    ```html
    <input type="hidden" wire:model="recaptcha_token" id="recaptchaToken" />
    ```

3. **JavaScript Handler**: Generates token before form submission
    ```javascript
    grecaptcha.execute('SITE_KEY', {action: 'contact_form'}).then(function(token) {
        @this.set('recaptcha_token', token);
        @this.call('submit');
    });
    ```

### Backend (Livewire Component)

The `Contact.php` component:

1. **Validates** the reCAPTCHA token
2. **Verifies** the token with Google's API
3. **Checks the score** (must be >= 0.5)
4. **Processes** the form or shows an error

```php
private function verifyRecaptcha($token)
{
    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('services.recaptcha.secret_key'),
        'response' => $token,
        'remoteip' => request()->ip(),
    ]);

    $result = $response->json();
    return $result['success'] && ($result['score'] ?? 0) >= 0.5;
}
```

## Score Interpretation

reCAPTCHA v3 returns a score between 0.0 and 1.0:

-   **1.0**: Very likely a good interaction
-   **0.5**: Neutral (current threshold)
-   **0.0**: Very likely a bot

You can adjust the threshold in `Contact.php` by changing the comparison value:

```php
return $result['success'] && ($result['score'] ?? 0) >= 0.5; // Change 0.5 to your desired threshold
```

**Recommended thresholds**:

-   **0.5**: Balanced (default)
-   **0.7**: More strict (fewer false positives but may block some humans)
-   **0.3**: More lenient (fewer false negatives but may allow some bots)

## Testing

### Local Development

For local testing:

1. Add `localhost` to your reCAPTCHA domains in the Google Admin Console
2. Test the form submission
3. Check the browser console for any JavaScript errors
4. Monitor the score in your logs (you can add logging to the `verifyRecaptcha` method)

### Debugging

To see the reCAPTCHA response and score, you can add logging to the `verifyRecaptcha` method:

```php
private function verifyRecaptcha($token)
{
    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('services.recaptcha.secret_key'),
        'response' => $token,
        'remoteip' => request()->ip(),
    ]);

    $result = $response->json();

    // Debug: Log the result
    \Log::info('reCAPTCHA Response', $result);

    return $result['success'] && ($result['score'] ?? 0) >= 0.5;
}
```

## Troubleshooting

### Common Issues

1. **"reCAPTCHA verification failed"**

    - Check if your keys are correctly set in `.env`
    - Run `php artisan config:clear` after changing keys
    - Verify your domain is added in Google reCAPTCHA Console

2. **Script not loading**

    - Check if `@stack('scripts')` is present in your layout file
    - Verify your internet connection (script loads from Google's CDN)

3. **Low scores for legitimate users**

    - Lower the threshold from 0.5 to 0.3
    - Check if your users are behind VPNs or proxies

4. **High scores for suspected bots**
    - Increase the threshold from 0.5 to 0.7
    - Monitor patterns in your logs

## Security Best Practices

1. **Never expose your Secret Key** - Keep it in `.env` and never commit it to version control
2. **Use HTTPS** - reCAPTCHA v3 works best with HTTPS
3. **Monitor scores** - Regularly review the scores to adjust your threshold
4. **Keep keys secure** - Rotate keys if compromised

## Additional Resources

-   [Google reCAPTCHA v3 Documentation](https://developers.google.com/recaptcha/docs/v3)
-   [reCAPTCHA Admin Console](https://www.google.com/recaptcha/admin)
-   [Best Practices Guide](https://developers.google.com/recaptcha/docs/v3#interpreting_the_score)

## Files Modified

1. `app/Livewire/Contact.php` - Added reCAPTCHA verification logic
2. `resources/views/livewire/contact.blade.php` - Added reCAPTCHA script and token handling
3. `resources/views/layouts/app.blade.php` - Added @stack('scripts') directive
4. `config/services.php` - Already contains reCAPTCHA configuration (no changes needed)

## Support

If you encounter any issues, please check the Laravel logs at `storage/logs/laravel.log` for detailed error messages.
