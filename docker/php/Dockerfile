#イメージのベースを指定
FROM php:7.2-fpm

#composerのインストール
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

#npmのインストール
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

#パッケージ管理ツールapt-getの更新と必要パッケージのインストール
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
&& docker-php-ext-install pdo_mysql bcmath 


# COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get -y install libzip-dev
RUN docker-php-ext-install zip


RUN apt-get -y install libnss3
RUN apt-get -y install libasound2-data  libasound2 xdg-utils
RUN apt install sudo
RUN apt-get install -y wget
RUN apt-get install -y gnupg2

RUN wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add -
RUN echo "deb http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google.list
RUN sudo apt update
RUN sudo apt-get install -y google-chrome-stable
RUN apt-get install -y fonts-ipafont 

# RUN npm install -g create-nuxt-app 

#コンテナ内に入った時のディレクトリを指定
WORKDIR /var/www/html