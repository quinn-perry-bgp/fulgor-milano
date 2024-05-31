#!/usr/bin/env bash

set -eo pipefail

mkdir -p /mnt/nfs/filestore
echo "Mounting Cloud Filestore - $FILESTORE_IP_ADDRESS:/$FILE_SHARE_NAME"
mount -o nolock,tcp,rw,intr $FILESTORE_IP_ADDRESS:/$FILE_SHARE_NAME /mnt/nfs/filestore 
echo "Mounting completed."

# Ensure Site uploads folder exists
echo "Symlinking site folder $FILESTORE_SITE_FOLDER"
mkdir -p /mnt/nfs/filestore/$FILESTORE_SITE_FOLDER/uploads
# Link NFS uploads folder to Wordpress uploads 
ln -f -s /mnt/nfs/filestore/uploads /var/www/html/wp-content/uploads
chown www-data:www-data /mnt/nfs/filestore/uploads

# Set up environment variables
export APACHE_RUN_USER=www-data
export APACHE_RUN_GROUP=www-data
export APACHE_LOG_DIR=/var/log/apache2
export APACHE_PID_FILE=/var/run/apache2.pid
export APACHE_RUN_DIR=/var/run/apache2
export APACHE_LOCK_DIR=/var/lock/apache2
export APACHE_SERVERADMIN=admin@localhost
export APACHE_SERVERNAME=localhost
export APACHE_SERVERALIAS=docker.localhost
export APACHE_DOCUMENTROOT=/var/www

echo "Starting Apache"
/usr/sbin/apache2 -D FOREGROUND
