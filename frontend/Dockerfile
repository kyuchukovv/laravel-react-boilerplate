FROM node:13.10.1-alpine
WORKDIR /app
COPY . .
EXPOSE 3003
RUN npm install
RUN npm run build
ENTRYPOINT npm start