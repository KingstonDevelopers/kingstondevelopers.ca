### Developing

This project uses `@11ty/eleventy` to create a statically generated site.

Use `./build.sh` to generate a production ready build, or use `./dev.sh` to run
a local web server that also watches for updates to file.

Nunjucks files (`*.njk`) files are essentially jinja templating. If you're 
using phpstorm you can add `*.njk` to the Twig file type to get some decent 
syntax highlighting. 