#!/bin/sh

# laradockの存在を確認
if [ ! -d laradock ]; then
    echo "laradock ga SONZAI simasen"
    exit
fi

cp laradock/env-example laradock/.env
# MySQL no version henkou
sed -i -e "s/MYSQL_VERSION=latest/MYSQL_VERSION=5.7/" laradock/.env

# nginx
mv laradock/nginx/sites/default.conf laradock/nginx/sites/default.conf.bak
cp laradock/nginx/sites/app.conf.example laradock/nginx/sites/app.laranale.conf

sed -i -e "s/server_name app.test/server_name app.laranale/" laradock/nginx/sites/app.laranale.conf
sed -i -e "s/root \/var\/www\/app/root \/var\/www\/Laranale-cms\/public/" laradock/nginx/sites/app.laranale.conf


cp Laranale-cms/.env.example Laranale-cms/.env

# .envファイルを編集
sed -i -e "s/DB_HOST=127.0.0.1/DB_HOST=mysql/" Laranale-cms/.env
sed -i -e "s/DB_DATABASE=homestead/DB_DATABASE=laranale/" Laranale-cms/.env
sed -i -e "s/DB_USERNAME=homestead/DB_USERNAME=root/" Laranale-cms/.env
sed -i -e "s/DB_PASSWORD=secret/DB_PASSWORD=root/" Laranale-cms/.env