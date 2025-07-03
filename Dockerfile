# Start with Ubuntu 24.04 LTS base image
FROM ubuntu:24.04

# Set environment variables to avoid prompts during installation
ENV DEBIAN_FRONTEND=noninteractive

# Update packages and install required dependencies
RUN apt-get update && apt-get install -y \
    software-properties-common \
    curl \
    wget \
    gnupg \
    lsb-release

# Add repository for PHP 8.0
RUN add-apt-repository ppa:ondrej/php -y && apt-get update

# Install Nginx, PHP 8.0.2, and PHP extensions
RUN apt-get install -y \
    nginx \
    php8.0-cli \
    php8.0-fpm \
    php8.0-mysql \
    php8.0-curl \
    php8.0-mbstring \
    php8.0-xml \
    php8.0-zip \
    php8.0-gd

# Clean up to reduce image size
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure Nginx
RUN echo "\
server {\n\
    listen 80;\n\
    root /var/www/html/public;\n\
    add_header X-Frame-Options \"SAMEORIGIN\";\n\
    add_header X-Content-Type-Options \"nosniff\";\n\
    index index.php;\n\
    charset utf-8;\n\
    location / {\n\
        try_files \$uri \$uri/ /index.php?\$query_string;\n\
    }\n\
    location = /favicon.ico { access_log off; log_not_found off; }\n\
    location = /robots.txt  { access_log off; log_not_found off; }\n\
    error_page 404 /index.php;\n\
    location ~ \.php$ {\n\
        fastcgi_pass unix:/run/php/php8.0-fpm.sock;\n\
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;\n\
        include fastcgi_params;\n\
    }\n\
    location ~ /\.(?!well-known).* {\n\
        deny all;\n\
    }\n\
}\n" > /etc/nginx/sites-available/default

# Enable the Nginx site
RUN [ -e /etc/nginx/sites-enabled/default ] && rm /etc/nginx/sites-enabled/default || true && \
    ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/


# Expose port 80
EXPOSE 80 443

# Start PHP-FPM and Nginx services
CMD ["sh", "-c", "service php8.0-fpm start && nginx -g 'daemon off;'"]
