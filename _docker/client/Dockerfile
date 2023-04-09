FROM node:lts-alpine as front

WORKDIR /var/www/client
# EXPOSE 5000

# VOLUME ["/var/www/client"]

COPY ./frontend/laravel-vue-barbershop/package*.json .


# RUN apk add --no-cache bash

# RUN npm install -g @vue/cli

RUN npm install

COPY ./frontend/laravel-vue-barbershop .


RUN npm run build

FROM nginx:stable-alpine as production-stage
COPY --from=front /var/www/client/dist /opt/site
COPY ./_docker/nginx/client/nginx.conf /etc/nginx/nginx.conf
