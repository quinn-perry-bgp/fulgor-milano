# Docker configuration

Docker image is built by Google Cloud Build, hosted partially with Google File Store, and deployed to Google Cloud Run. Three branches are managed by Cloud Build: 

- `origin/development` - the Development branch
- `origin/staging` - the Staging branch
- `origin/master` - the Production branch

In each branch the Dockerfile copies and executes the correct `run.sh` file.  
The run.sh file sets up Google File Store mount for each environment and symlinks the correct site folder. These settings are controlled by the environment variables (set up in Cloud Run): 

- FILESTORE_IP_ADDRESS
- FILE_SHARE_NAME
- FILESTORE_SITE_FOLDER 

The filestore folder for each site is symlinked to `wp-content/uploads`. Values for FILESTORE_SITE_FOLDER listed below: 

- `uploads-development` - the Development branch
- `uploads-staging` - the Staging branch
- `uploads-production` - the Production branch
