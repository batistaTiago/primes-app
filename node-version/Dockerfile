FROM node:18-bullseye-slim
WORKDIR /usr/app

COPY ./node-version/package.json .

RUN npm install --omit-dev

COPY ./node-version/index.js .