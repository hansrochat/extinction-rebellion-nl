## Requirements

- [Docker](https://www.docker.com/products/docker-desktop). If you use Linux, you'll also have to separately install [docker-compose](https://linuxhandbook.com/docker-compose-ubuntu/).
- [Node.js](https://nodejs.org/en/)

## Install
[Contact](/SUPPORT.md) one of the website admins to obtain the license keys for some commercial plugins we use on the website. The keys then need to be added to the `.env` file.

```sh
# create environment variables with required configurations
cp .env.example .env
# now open the .env file in a text editor and paste in the license keys

# install npm packages
cd web/app/themes/xrnl
npm install
```

Lastly, follow the next step to run the website and then [pull the production database](/docs/sync-production-data.md)

## Run

First, you must activate Docker. Then:

```sh
# start website
docker-compose up -d
# compile css files and enable hot reloading (from within web/app/themes/xrnl)
npm run watch 
```

The website should be active at `http://localhost:8000`

## Shutdown

```sh
docker-compose down
```

This way of shutting down the website is likely to cause less errors than directly quitting Docker. 

## Install new plugins

If you want to install a new plugin
```sh
docker-compose exec composer require wpackagist-plugin/{{PLUGIN_NAME}}
```

If you want to update a plugin
```sh
docker-compose exec composer update wpackagist-plugin/{{PLUGIN_NAME}}
```

