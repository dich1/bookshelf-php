# bookshelf

## 実行環境
- Mac
- Apache 2.4.x
- MySQL 5.6.26
- PHP 7.1.x

## 環境構築
- XAMPPインストール
```
curl -s https://sourceforge.net/projects/xampp/files/XAMPP%20Mac%20OS%20X/5.6.12/xampp-osx-5.6.12-0-installer.dmg/download
```
- 解凍してApplication直下に配置
- PHP7.1.xにバージョンアップ
```
curl -s http://php-osx.liip.ch/install.sh | bash -s 7.1
```
- MySQL、PHPのPATHを通す
```
vim ~/.bash_profile

//以下を追加
  export PATH=$PATH:/Applications/XAMPP/xamppfiles/bin
  export PATH=/usr/local/php5/bin:$PATH

//読み込み
source ~/.bash_profile
```
- Apache起動、mysql起動
- MySQL初期設定
```
mysql_secure_installation
```
文字コード設定
http://qiita.com/YusukeHigaki/items/2cab311d2a559a543e3a

- ローカルにディレクトリ作成
```
cd ディレクトリを作成する位置に移動
mkdir bookshelf
```

- ソース取り込み
```
git clone https://github.com/dich1/bookshelf.git
```

- シンボリックリンクを貼る
```
ln -s $(pwd) /Applications/XAMPP/htdocs/bookshelf
```

## DB構築
- データベース、テーブル、テストデータの作成
```
cd sqlファイル位置に移動
mysql -u **** -p**** < create_table_bookshelf.sql
```
- config.phpのUSERNAMEとPASSWORDを設定

## 動作確認
- 以下をアドレスバーに入力しアクセス
```
localhost/bookshelf
```

