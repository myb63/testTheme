# 商品一覧と商品詳細について

ポートフォリオの追加要件として商品一覧と商品詳細を実装していただきます。  
商品一覧に関してはページで作成してもらう予定でしたが、わざわざページにする必要もないので TOP ページにセクションを追加するなどして入れ込む形でコーディングをお願いします。  
今回ダウンロードして使用いただくのは下記の2ファイルになります。
- post.php
  - 商品一覧のコンポーネント
- single.php
  - 商品詳細ページ
    - 管理画面の「投稿」からページを追加できます。

## 商品一覧

post.php が商品一覧のコンポーネントになります。  
こちらをポートフォリオの入れ込みたい箇所に呼び出して使用してください。(例として front-page.php でも使用してます)  
html タグやクラス名は適宜修正してデザインを組んでみてください。(php のコードも編集可能です)

`<?php get_template_part('posts'); ?>`

## 商品詳細

single.php が商品詳細ページになります。  
商品一覧同様 html タグやクラス名を適宜修正してデザインを組んでみてください。
