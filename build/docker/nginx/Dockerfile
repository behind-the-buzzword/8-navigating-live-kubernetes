FROM nginx

RUN apt update && \
    apt install -y curl && \
    curl -sLo /usr/local/bin/ep https://github.com/kreuzwerker/envplate/releases/download/v0.0.8/ep-linux && \
    chmod +x /usr/local/bin/ep

ADD build/docker/nginx/nginx.conf /etc/nginx
COPY src/public /usr/share/nginx/html
WORKDIR /usr/share/nginx/html

CMD [ "/usr/local/bin/ep", "-v", "/etc/nginx/nginx.conf", "--", "/usr/sbin/nginx", "-g", "daemon off;" ]
