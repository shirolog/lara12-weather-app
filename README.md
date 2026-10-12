# Laravel Weather App

Laravelで制作した天気予報アプリです。

## 概要

Open-Meteo APIを利用して、選択した都市の現在の気温・風速と、時間別の気温を取得・表示するWebアプリケーションです。

## 使用技術

- PHP 8.2
- Laravel
- Blade
- Tailwind CSS
- JavaScript
- Open-Meteo API

## 機能

- 都市別の天気情報の表示
- 都市の切り替え
- 現在の気温・風速の表示
- 時間別の気温の表示
- モーダルによる詳細な天気情報の表示
- 不正な都市名の判定
- API通信エラーへの対応

## 対応都市

- 高松
- 東京
- 大阪
- 札幌
- 福岡
- 名古屋

## 使用API

**Open-Meteo API**

https://open-meteo.com/

現在の天気情報と時間別の気温を取得しています。

## 設計

- **Enum**：都市名、緯度・経度、日本語名の管理
- **Service**：外部APIとの通信処理
- **Controller**：都市の判定、天気データの取得、Viewへの受け渡し
- **Blade**：天気情報の表示
- **JavaScript**：都市切り替え、モーダルの開閉

## 起動方法

1. リポジトリをクローンします。

   ```bash
   git clone リポジトリのURL
   ```

2. プロジェクトのディレクトリに移動します。

   ```bash
   cd プロジェクト名
   ```

3. Composerの依存パッケージをインストールします。

   ```bash
   composer install
   ```

4. 環境設定ファイルを作成します。

   ```bash
   cp .env.example .env
   ```

5. アプリケーションキーを生成します。

   ```bash
   php artisan key:generate
   ```

6. Laravelの開発サーバーを起動します。

   ```bash
   php artisan serve
   ```

7. ブラウザで以下にアクセスします。

   http://127.0.0.1:8000/weather

※ データベースは使用していません。Windows環境では、必要に応じて `.env.example` を `.env` にコピーする操作をPowerShellなどで行ってください。

## 今後の改善案

- 天気に応じたイラストの切り替え
- API通信エラー時のユーザー向け画面の改善
- 天気情報の表示項目の拡充
