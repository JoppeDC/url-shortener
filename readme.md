# URL Shortener

This is a simple URL Shortener using Symfony 6 and a Vuejs front component.

## Setup

This project uses Docker to run  MySQL container.
We'll also assume you have the Symfony binary installed, and the symfony proxy configured for a custom .wip domain.

### Install dependencies
```
composer install
```

### Run docker container
```
docker-compose up -d
```

### Run symfony server
We'll attach a domain for local development.
The following command will make the following domain available: `https://shortn.wip`
```
symfony proxy:domain:attach shortn
symfony serve -d
```


### Frontend
You can install frontend dependencies with yan
```
yarn install
```

To enable live updates, you can watch for changes
```
yarn watch
```

To build for deployment
```
yarn build
```