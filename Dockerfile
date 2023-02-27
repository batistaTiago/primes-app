FROM node:18-bullseye-slim
WORKDIR /usr/app

COPY package.json .

RUN npm install --omit-dev

COPY index.js .