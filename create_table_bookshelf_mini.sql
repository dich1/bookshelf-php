/* データベース、テーブル作成 */
CREATE DATABASE bookshelf_mini;
USE bookshelf_mini;
CREATE TABLE bookshelf_mini.books (
    /* 本のタイトル、作成日時 */
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    book_title VARCHAR(100),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

/* テストデータ作成 */
INSERT INTO bookshelf_mini.books (book_title) VALUES("テスト1");
INSERT INTO bookshelf_mini.books (book_title) VALUES("テスト2");
INSERT INTO bookshelf_mini.books (book_title) VALUES("テスト3");
SELECT * FROM bookshelf_mini.books;