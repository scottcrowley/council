# Council

This is an open source forum that was built and maintained at Laracasts.com.

## Installation

### Step 1.

> To run this project, you must have PHP 7 installed as a prerequisite.

Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

```bash
git clone git@github.com:JeffreyWay/council.git
cd council && composer install && npm install
php artisan council:install
npm run dev
```

### Step 2.

1. Visit: http://council.test/register and register an account.
1. Edit `config/council.php`, adding the email address of the account you just created.
1. Visit: http://council.test/admin/channels and add at least one channel. 

### Step 3.

Use your forum! Visit `http://council.test` to create a new account and publish your first thread.