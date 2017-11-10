/* データベース、テーブル作成 */
CREATE DATABASE bookshelf;
USE bookshelf;
CREATE TABLE bookshelf.books (
    /* id、本のタイトル、画像URL、ステータス、作成日時 */
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(100),
    image VARCHAR(100),
    status VARCHAR(10),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

/* テストデータ作成 */
INSERT INTO bookshelf.books (title, image, status) VALUES ("EFFECTIVE JAVA 第2版 (The Java Series)", "./images/item_book_0.jpg", "unread");
INSERT INTO bookshelf.books (title, image, status) VALUES ("Webを支える技術 -HTTP、URI、HTML、そしてREST (WEB+DB PRESS plus)", "./images/item_book_1.jpg", "finished");
INSERT INTO bookshelf.books (title, image, status) VALUES ("体系的に学ぶ 安全なWebアプリケーションの作り方 脆弱性が生まれる原理と対策の実践", "./images/item_book_2.jpg", "reading");
INSERT INTO bookshelf.books (title, image, status) VALUES ("達人に学ぶDB設計 徹底指南書", "./images/item_book_3.jpg", "unread");
INSERT INTO bookshelf.books (title, image, status) VALUES ("基礎からのWordpress", "./images/item_book_4.jpg", "unread");
INSERT INTO bookshelf.books (title, image, status) VALUES ("いきなり はじめるPHP", "./images/item_book_5.jpg", "unread");
SELECT * FROM bookshelf.books;