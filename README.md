## About Kingston Developers
A group where local Kingston Developers meet up and talk about development things. This repository is for the Kingston Developers website where upcoming meetups are posted.

## Prerequisites (Should be installed on your system)
- [PHP 8.0](https://php.net/)
- [Composer 2](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/)
- [Docker](https://www.docker.com/community-edition)
- [Docker Compose](https://docs.docker.com/compose/install/)

You'll need to setup `kingstondevelopers.test` domain as well as a proxy service. You can read how [here](docker-setup.md).

## Installation
Run the following commands:
- `composer install`
- `yarn install`
- `yarn dev`
- `php artisan key:generate`
- `docker-compose up -d`

## Development

### Compiling Assets
You can use `npm run watch` to automatically recompile assets when you change them.

### Local Environment Setup
You'll need to create your own `.env` file in the root project directory. Copy the `.env.example` file and rename it as your `.env` file. In order to view API information related to related to meetup.com, you'll need to [generate a new API key](https://secure.meetup.com/meetup_api/key/) and add the key in your `.env` file as the value for `MEETUP_API_KEY`.

## Contributing

Thank you for considering contributing to Kingston Developers website! If you'd like to contribute to the website take a look at some of our current [issues](https://github.com/KingstonDevelopers/kingstondevelopers.ca/issues) to see what needs to be completed and make sure to read the [contribution guidelines](contributing.md) before submitting a PR.

## Security Vulnerabilities

If you discover a security vulnerability within our website, please get in touch with one of the organizers of Kingston Developers. Don't hack us.

## License

The Kingston Developers website is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
