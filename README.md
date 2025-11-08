# 神待ち掲示板 WordPress テーマ

全国の神待ち女性と出会える掲示板情報サイト用のWordPressテーマです。

## 機能概要

- **カスタム投稿タイプ「神待ち女性」**: 女性のプロフィール情報を管理
- **都道府県タクソノミー**: 47都道府県別にコンテンツを分類
- **都道府県別ページ**: 各都道府県ごとに6〜10件のランダム表示
- **SEO対策**: メタタグ、OGP、構造化データ（JSON-LD）を自動生成
- **レスポンシブデザイン**: モバイル・タブレット・PCに対応
- **WordPress MENU対応**: ヘッダー・フッターメニューを管理画面で編集可能
- **ユーザーボイスページ**: 実際に出会えた体験談を掲載

## ファイル構成

```
kami/
├── functions.php              # カスタム投稿タイプ、タクソノミー、SEO機能
├── style.css                  # テーマ情報
├── header.php                 # ヘッダーテンプレート
├── footer.php                 # フッターテンプレート
├── front-page.php             # トップページ
├── index.php                  # 既存データ表示用（互換性維持）
├── taxonomy-prefecture.php    # 都道府県別ページ
├── single-kamimachi_girl.php  # 神待ち女性詳細ページ
├── page-voice.php             # ユーザーボイスページ
├── archive-profile.php        # アーカイブページ（既存）
├── single-profile.php         # シングルページ（既存）
├── sample-data.sql            # サンプルデータ
└── .github/
    └── workflows/
        └── deploy.yml         # GitHub Actions自動デプロイ設定
```

## セットアップ手順

### 1. WordPressへのテーマインストール

```bash
# テーマディレクトリに配置
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/kuuhaku1102/kami.git matching-board-v2
```

### 2. テーマの有効化

WordPress管理画面 → 外観 → テーマ → 「Matching Board」を有効化

### 3. パーマリンク設定

WordPress管理画面 → 設定 → パーマリンク設定 → 「投稿名」を選択して保存

### 4. メニューの設定

WordPress管理画面 → 外観 → メニュー

1. 新しいメニューを作成
2. メニュー項目を追加（ホーム、体験談など）
3. メニューの位置を「ヘッダーメニュー」または「フッターメニュー」に設定
4. 保存

### 5. 固定ページの作成

#### ユーザーボイスページ

1. WordPress管理画面 → 固定ページ → 新規追加
2. タイトル: 「体験談」
3. スラッグ: `voice`
4. テンプレート: 「ユーザーボイス」を選択
5. 公開

### 6. 神待ち女性の登録

WordPress管理画面 → 神待ち女性 → 新規追加

1. タイトル: 女性の名前（例：響）
2. 年齢: 数値で入力（例：23）
3. 体型: プルダウンから選択（小柄、標準、スリム、グラマー）
4. 系統: プルダウンから選択（天然系、癒し系、お色気系など）
5. 自己紹介: テキストエリアに入力
6. アイキャッチ画像: プロフィール画像を設定
7. 都道府県: チェックボックスで選択
8. 公開

### 7. サンプルデータの参考

`sample-data.sql` に記載されているサンプルデータを参考に、複数の神待ち女性を登録してください。

## 都道府県別ページのURL構造

- トップページ: `https://example.com/`
- 都道府県別ページ: `https://example.com/prefecture/東京都/`
- 神待ち女性詳細: `https://example.com/girl/響/`
- ユーザーボイス: `https://example.com/voice/`

## SEO対策機能

### メタタグ

- メタディスクリプション
- OGPタグ（Facebook、Twitter対応）
- Twitter Card

### 構造化データ

- JSON-LD形式
- Person型（神待ち女性詳細ページ）
- WebPage型（都道府県別ページ）
- WebSite型（トップページ）

### パンくずリスト

各ページに自動的にパンくずリストが表示されます。

### タイトルタグ最適化

ページの種類に応じて、SEOに最適化されたタイトルタグが自動生成されます。

## GitHub Actions 自動デプロイ

### 前提条件

- GitHubリポジトリ: `kuuhaku1102/kami`
- デプロイ先: ConoHa WING

### 設定済み内容

- `main`ブランチへのプッシュで自動デプロイ
- SFTP経由でファイル転送
- 不要なファイル（.git、.github、node_modulesなど）を除外

### 必要なシークレット

GitHubリポジトリの Settings → Secrets and variables → Actions で以下を設定：

- `SSH_PRIVATE_KEY`: ConoHa WINGのSSH秘密鍵

### デプロイ先パス

```
public_html/2000km.net/wp-content/themes/matching-board-v2/
```

### 手動デプロイ

GitHub Actions → Deploy Matching Board v2 Theme to ConoHa WING → Run workflow

## カスタマイズ

### デザインのカスタマイズ

各テンプレートファイル内のインラインスタイルを編集するか、`style.css`にCSSを追加してください。

### 表示件数の変更

`taxonomy-prefecture.php` の以下の行を編集：

```php
$random_count = rand(6, 10); // 6〜10件のランダム表示
```

### SEOキーワードの調整

`functions.php` の `add_seo_meta_tags()` 関数内でメタディスクリプションを編集できます。

## トラブルシューティング

### 都道府県が表示されない

WordPress管理画面 → 設定 → パーマリンク設定 → 保存（再保存）

### 画像が表示されない

WordPress管理画面 → 設定 → メディア → 画像サイズの設定を確認

### メニューが表示されない

WordPress管理画面 → 外観 → メニュー → メニューの位置を設定

## ライセンス

このテーマは InfinityDesign によって開発されました。

## サポート

技術的な質問や問題がある場合は、GitHubのIssuesでお問い合わせください。

---

© 2025 Matching Board - InfinityDesign
