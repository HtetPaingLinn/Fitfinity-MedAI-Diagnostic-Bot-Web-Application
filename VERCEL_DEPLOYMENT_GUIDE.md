# Vercel Deployment Guide for Laravel

## Critical: Environment Variables Setup

The 500 error is likely caused by missing environment variables. You **MUST** set these in Vercel Dashboard:

### Required Environment Variables

1. Go to your Vercel project dashboard
2. Navigate to **Settings** → **Environment Variables**
3. Add the following variables:

#### Essential Variables:
```
APP_KEY=base64:EnArwhs6UjF/1knIIp0cr4SQKA/vD6YwqkhlQIlSB4s=
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.vercel.app

DB_CONNECTION=sqlite
DB_DATABASE=/tmp/database.sqlite

SESSION_DRIVER=cookie
CACHE_DRIVER=array
QUEUE_CONNECTION=sync

LOG_CHANNEL=stderr
VIEW_COMPILED_PATH=/tmp/storage/framework/views
```

### How to Generate APP_KEY

Run this command locally:
```bash
php artisan key:generate --show
```

Copy the output (it will look like: `base64:xxxxxxxxxxxxx`) and paste it as the `APP_KEY` value in Vercel.

### Database Setup

You need a production database. Options:
- **PlanetScale** (MySQL, free tier available)
- **Railway** (PostgreSQL/MySQL)
- **AWS RDS**
- **DigitalOcean Managed Database**

### Additional Variables (if needed)

Check your `.env.example` file for other variables your app needs:
- Mail configuration (MAIL_*)
- Cache/Session drivers
- Third-party API keys
- AWS credentials (if using S3)

## Deployment Steps

1. Set all environment variables in Vercel Dashboard
2. Push your code changes to Git
3. Vercel will automatically redeploy
4. Check deployment logs if errors occur

## Troubleshooting

If you still get 500 errors:
1. Check Vercel deployment logs
2. Verify APP_KEY is set correctly
3. Ensure database credentials are correct
4. Check that all required PHP extensions are available
5. Review Laravel logs (if accessible)

## Storage Directory

Laravel needs writable storage directories. Vercel's filesystem is read-only except for `/tmp`. 

If you use file-based sessions or cache, update your `.env`:
```
SESSION_DRIVER=cookie
CACHE_DRIVER=array
```

Or use external services like Redis.
