モジュールやテーマのアップデートを短時間で行えるモジュールです。

○ 動作環境

- PHP 5.2.0 以上, curlとzlibライブラリ上のZipArchiveが使用できること。
- コア XOOPS Cube Legacy 2.1.x 以上 (2.2.0 以上推奨）

○ 履歴
- 2012-2-17 プalpha by domifara
　　　とりあえず、エラーなく動くようにしました。
　　　テーブルレイアウト検討中のため
　　　(アップデイトでは対応していません)
　　　旧をアンイストールして、再度インストールしてください。

- 2012-1-28 プロトタイプ by naao
　　　tubsonpを使って作り、ロジックを適当に当てはめただけなので、
　　　XCLぽい書き方になっていません。
　　　クラス継承もおかしいと思うので、勉強して直さないと。。


○ ToDo
- Theme インストーラの実装
- ストアサイトの情報を見てリスト表示
- ストアサイトの登録と参照ページ作成
　　現状、表側に何の制限もなく出てます。
　　管理画面に移動するか、管理者限定アクセス制限をかける。
- SFTP（SSH-FTP）のライブラリ追加し実装

- インストール中の追加処理、割り込みなど
-- 複製可能モジュールの、ディレクトリ名変更
-- 既にインストール済みのモジュールがあるときの選択・上書き警告

- その他、色々ありすぎて書ききれません。

