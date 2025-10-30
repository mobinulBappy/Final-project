# 1. Base Image: PHP image with FPM and Alpine (lightweight)
FROM php:8.2-fpm-alpine

# 2. Install System Dependencies & PHP Extensions
RUN apk add --no-cache \
    nginx \
    git \
    supervisor \
    curl \
    mysql-client \
    nodejs \
    npm \
    # Install PHP extensions
    && docker-php-ext-install pdo pdo_mysql opcache \
    # Install Composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 3. Set Working Directory
WORKDIR /var/www/html

# 4. Copy Application Code
COPY . .

# 5. Run Composer and Build Assets 
# **গুরুত্বপূর্ণ: SASS ত্রুটি এড়াতে আপনার বিল্ড কমান্ড এখানে রাখা হয়েছে**
RUN composer install --optimize-autoloader --no-dev \
    && npm install \
    && npm run build \
    && php artisan key:generate \
    && php artisan config:cache \
    && php artisan storage:link

# 6. Set File Permissions (Laravel-এর জন্য জরুরি)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# 7. Define Start Command (CMD)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Expose port 
EXPOSE 8000
