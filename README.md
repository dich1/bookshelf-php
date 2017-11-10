# bookshelf

## 実行環境
- Mac
- Apache 2.4.x
- MySQL 5.6.26
- PHP 7.1.x

## 環境構築
- XAMPPインストール
https://sourceforge.net/projects/xampp/files/XAMPP%20Mac%20OS%20X/5.6.12/
```
- 解凍してApplication直下に配置
- PHP7.1.xにバージョンアップ
```
curl -s http://php-osx.liip.ch/install.sh | bash -s 7.1
```
- MySQL、PHPのPATHを通す
```
vim ~/.bash_profile

//以下を追加し、保存
export PATH=$PATH:/Applications/XAMPP/xamppfiles/bin
export PATH=/usr/local/php5/bin:$PATH

//読み込み
source ~/.bash_profile

- VirtualHost設定
```
vim /Applications/XAMPP/xamppfiles/etc/httpd.conf

//以下のコメントアウトを外しバーチャルホストを有効化
#Include etc/extra/httpd-vhosts.conf
    ↓
Include etc/extra/httpd-vhosts.conf

```
vim /Applications/XAMPP/etc/extra/httpd-vhosts.conf

//以下を末尾に追加
Listen 1000
<VirtualHost *:1000>
    DocumentRoot "/Applications/XAMPP/bookshelf/public"
</VirtualHost>

<Directory "/Applications/XAMPP/bookshelf/">
    Options Indexes
    AllowOverride All
    Require all granted
</Directory>
```
- Apache起動、mysql起動
- MySQL初期設定
```
mysql_secure_installation
```
- 文字コード設定
```
vi /Applications/XAMPP/xamppfiles/etc/my.cnf
```
http://qiita.com/YusukeHigaki/items/2cab311d2a559a543e3a

- ローカルにディレクトリ作成
```
cd ディレクトリを作成する位置に移動
mkdir bookshelf
```

- ソース取り込み
```
cd bookshelf
git clone https://github.com/dich1/bookshelf.git
```

- DB構築(データベース、テーブル、テストデータの作成)
```
cd database
mysql -u **** -p**** < create_table_bookshelf.sql
```

- シンボリックリンクを貼る
```
ln -nfs $(pwd) /Applications/XAMPP/bookshelf
ls -l /Applications/XAMPP
```

- config.phpのUSERNAMEとPASSWORDを設定

## 動作確認
- 以下をアドレスバーに入力しアクセス
```
localhost:1000
```

