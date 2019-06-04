# Laranale

[![CircleCI](https://circleci.com/gh/7ew1r/Laranale-cms/tree/master.svg?style=svg)](https://circleci.com/gh/7ew1r/Laranale-cms/tree/master)

## 概要

Laravelで構築したCMSアプリケーションです。

## 機能一覧

このアプリケーションは以下の機能を実装しています

- 記事一覧閲覧機能
- 記事詳細閲覧機能
- コメント投稿機能
- ページネーション機能
- ユーザー登録/ログイン機能
- 退会（ユーザー削除）機能
- 記事投稿機能（Markdownで記入できます）*
- 記事編集/削除機能*
- 単体テスト (PHPUnit)
- CircleCIによる自動テスト

*要ログイン

## 使用技術

- フレームワーク
  - Laravel 5.5
- データベース
  - MySQL 5.7 [開発環境]
  - PostgreSQL (Heroku Postgres)
- インフラ
  - Heroku
- CI
  - CircleCI

## 要件

- macOS / Linux
- Docker
- Docker Compose

## 使い方

作業用ディレクトリを作成・移動。

```
mkdir workdir && cd workdir
```

リポジトリをクローン

```
git clone https://github.com/7ew1r/Laranale-cms.git
```

Laravelの開発環境として、Laradockを使用しています。  
Laradockをクローン

```
git clone https://github.com/laradock/laradock.git
```

セットアップスクリプトを実行 (macOS/Linux)

```
sh Laranale-cms/script/init.sh
```

laradockによる開発環境の構築・起動

```
cd laradock
docker-compose up -d nginx mysql
```

データベースの作成

```
docker exec -it laradock_mysql_1 bash
mysql -u root -p
root
mysql> create database laranale;
mysql> exit
exit
```

Laranaleのインストール

```
docker-compose exec workspace bash
cd Laranale-cms
composer install
php artisan key:generate
php artisan migrate --seed
```

http://localhost にアクセスする