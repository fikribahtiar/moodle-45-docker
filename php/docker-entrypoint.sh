#!/bin/bash
set -e

# set redis session.save_path from env (if provided)
if [ -n "$REDIS_HOST" ]; then
  REDIS_AUTH_PART=""
  if [ -n "$REDIS_PASS" ]; then
    REDIS_AUTH_PART="?auth=$REDIS_PASS"
  fi
  # tulis ke file override agar tidak merusak php.ini
  echo "session.save_handler = redis" > /usr/local/etc/php/conf.d/99-redis.ini
  echo "session.save_path = \"tcp://$REDIS_HOST:$REDIS_PORT$REDIS_AUTH_PART\"" >> /usr/local/etc/php/conf.d/99-redis.ini
fi

# ensure owner of moodledata is www-data (uid 33)
if [ -d "/var/moodledata" ]; then
  chown -R 33:33 /var/moodledata || true
fi

# ensure web files owned by www-data
chown -R 33:33 /var/www/html || true

# start php-fpm
exec php-fpm
