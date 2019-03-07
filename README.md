# 書籍アプリ
- 書籍情報の登録
- 貸し出し機能

## セットアップ

### Laravel
```bash
$ make setup
```

※初回以降、開発時には以下のコマンドのみを実行してください
```bash
$ php artisan serve
```

### Nuxt
Laravelのセットアップとは別タブのターミナルで実行
``` bash
$ npm install

$ npm run generate

$ npm run dev
```

※初回以降、開発時には以下のコマンドのみを実行してください
```bash
$ npm run dev
```

## スマホでローカル（PC）をみる
1. スマホとPCを同じwifiにつなぐ

2. .envの `NUXT_APIDOMAIN` をPCのIPアドレスにかきかえる

```dotenv
NUXT_APIDOMAIN=http:[PCのIPアドレス]//127.0.0.1:8000
```

### MacでのIPアドレスの確認方法
システム環境設定 > ネットワーク

3. Laravel、Nuxtどちらも立ち上げなおす

```bash
$ php artisan serve --host 0.0.0.0

$ npm run dev
```

※Laravelにはオプションをつけることに注意

## テスト

```bash
$ make test
```