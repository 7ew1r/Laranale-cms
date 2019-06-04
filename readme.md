# Laranale

[![CircleCI](https://circleci.com/gh/7ew1r/Laranale-cms/tree/master.svg?style=svg)](https://circleci.com/gh/7ew1r/Laranale-cms/tree/master)

画像

## 概要

Laravelで構築したCMSアプリケーションです。

## 機能一覧

このアプリケーションは以下の機能を実装しています

- 記事一覧閲覧機能
- 記事詳細閲覧機能
- コメント投稿機能
- ページネーション機能
- ユーザー登録/ログイン機能
- 記事投稿機能（Markdownで記入できます）*
- 記事編集/削除機能*
- 単体テスト (PHPUnit)
- CircleCIによる自動テスト


## 使用技術

- フレームワーク
  - Laravel

- インフラ
  - Heroku

- データベース
  - PostgreSQL (Heroku Postgres)

- CI (CircleCI)

登録ユーザー

- 記事の投稿
- 投稿記事の編集・削除


## 必要

- Docker

## インストール方法

作業用ディレクトリを作成し、移動

```
mkdir workdir && cd workdir
```

リポジトリをクローン

```
git clone https://github.com/7ew1r/Laranale-cms.git
```

Laradockをクローン

```
git clone https://github.com/laradock/laradock.git
```

セットアップスクリプトを実行 (macOS/Linux)

```
sh Laranale-cms/script/init.sh
```

```
cd laradock
```

```
docker-compose up -d nginx mysql
```

```
docker exec -it laradock_mysql_1 bash
mysql -u root -p
root
mysql> create database laranale;
mysql> exit
exit
```

```
docker-compose exec workspace bash
cd Laranale-cms
composer install
php artisan key:generate
php artisan migrate --seed
```