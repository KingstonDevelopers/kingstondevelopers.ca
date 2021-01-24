#!/bin/bash
####
#### Description: Build and tag images (mostly for local building)
####
set -o errexit
set -o pipefail
#set -o nounset
# set -o xtrace

# Set magic variables for current file & dir
__dir="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
__file="${__dir}/$(basename "${BASH_SOURCE[0]}")"
__base="$(basename ${__file} .sh)"
__root="$(cd "$(dirname "${__dir}")/.." && pwd)"

BACKEND_DOCKERFILE="./tools/docker/app/app.docker"
BACKEND_DOCKER_TAG="gcr.io/voziv-web/kingston-developers-backend:latest"
FRONTEND_DOCKERFILE="./tools/docker/nginx/nginx.docker"
FRONTEND_DOCKER_TAG="gcr.io/voziv-web/kingston-developers-backend:latest"
NODE_DOCKEFILE="./tools/docker/node/node.docker"
NODE_DOCKER_TAG="kingston_developers_node_build:latest"

BUILD_DATE=$(TZ="America/Toronto" date +"%Y-%m-%dT%H:%M:%SZ")

cd "$__root"

docker build \
    --tag "${NODE_DOCKER_TAG}" \
    --file "${NODE_DOCKEFILE}" \
    .

docker build \
    --cache-from "${BACKEND_DOCKER_TAG}" \
    --build-arg BUILD_DATE="${BUILD_DATE}" \
    --build-arg VCS_REF="LOCALBUILD" \
    --build-arg VERSION="LOCALBUILD" \
    --tag "${BACKEND_DOCKER_TAG}" \
    --file "${BACKEND_DOCKERFILE}" \
    .

docker build \
    --cache-from "${FRONTEND_DOCKER_TAG}" \
    --build-arg BUILD_DATE="${BUILD_DATE}" \
    --build-arg VCS_REF="LOCALBUILD" \
    --build-arg VERSION="LOCALBUILD" \
    --tag "${FRONTEND_DOCKER_TAG}" \
    --file "${FRONTEND_DOCKERFILE}" \
    .
