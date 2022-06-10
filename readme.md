# Laravel + TDD の基礎

- 参考サイト
  - [Laravel+TDD の基礎を学ぶ](https://laravel-tdd.doc.tacck.net/)

## 試験の種類

- Unit テスト

  - DB とのデータのやり取りの部分をテスト
  - データを手動で登録し、登録後の ID でデータを検索する。
  - 検索したデータの中身（参考サイトではタイトル）が手動で作っていたものと同じになっていた場合、テスト OK という内容だった。
  - バリデーションに関しては記述を行わない。
  - バリデーションに関しては Feature テストで確認を行った。

- Feature テスト

  - HTTP のリクエスト部分のテスト
  - コントローラーに書いた処理が想定通りになっているかのテスト
  - リクエストに対し、レスポンスの値がどのような値になっているかをテストする。
  - バリデーションに関してもテストを実施する。
  - バリデーションはエラーのメッセージで確認を行う。

- Browser テスト
  - Dusk を使って、ブラウザ画面からの操作含めてのテストを行う。
  - 画面の遷移のテスト、画面に表示されている情報のテスト、画面上での操作、画面上での操作を実行した上での遷移先の確認のテストなどを実施
  - バリデーションに関するテストは、画面上にエラーメッセージが表示されているか、という観点で実施が可能。
  - DatabaseTransactions はテスト中に操作したデータだけの削除を行う。
  - RefreshDatabase はテスト中に操作したデータ含めすべてのデータの削除を行う。seeder で追加したようなデータがある場合はそれ含めて消える。
  - DatabaseMigrations はテーブル含めて削除される
