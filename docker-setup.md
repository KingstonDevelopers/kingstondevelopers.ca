# Setting up docker
You'll need to have [dinghy-http-proxy](https://github.com/codekitchen/dinghy-http-proxy) running on docker.
This part of the setup will vary based on your docker setup (Windows/OSX/Linux, Native Docker vs VM).

## Dinghy Proxy - Linux / OSX / Windows (WSL2)
```bash
docker run -d --restart=always \
  -v /var/run/docker.sock:/tmp/docker.sock:ro \
  -v ~/.dinghy/certs:/etc/nginx/certs \
  -p 80:80 -p 443:443 -p 19322:19322/udp \
  -e CONTAINER_NAME=http-proxy \
  --name http-proxy \
  codekitchen/dinghy-http-proxy
```

# Setting up the domain
You'll need to point the `*.kingstondevelopers.dev` domain to your proxy.


## Resolver method (preferred)
This will redirect all `*.dev` DNS queries to 127.0.0.1 (dinghy-http-proxy). This is useful to use for development in general, not just Kingston Developers.

Create a new file called `/etc/resolver/dev` with the contents:
```
nameserver 127.0.0.1
port 19322
```

Voila! Easy peasy setup and now all `.dev` domains (and subdomains) will ask the dinghy proxy to resolve DNS. 

## /etc/hosts method
You can do this either with your `/etc/hosts` file or by directing DNS queries to dinghy-http-proxy.

```
# Example /etc/hosts entries. You may need to substitute 127.0.0.1 with your docker VM IP.
127.0.0.1 kingstondevelopers.test
```

Voila! Also easy, however needs regular maintenance when new services are added.

Finally you can run `docker-compose up -d --build`
