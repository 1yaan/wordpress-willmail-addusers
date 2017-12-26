WordPress "WiLL Mail" Put Plugin ( wp_willmail_put.php )
========

WP WiLL Mail Put Plugin は、 WordPress のプラグインです。
誰でも簡単に、[Contact Form 7](https://ja.wordpress.org/plugins/contact-form-7/) プラグインを使って、[WiLL Mail](https://willcloud.jp/) のターゲット DB へデータ登録をするフォームを作ることができます。

Details and examples: https://1yaan.github.io/wp-willmail-put/

Your feedback is highly appreciated. You can send requests and bug reports as [Issues on GitHub](https://github.com/1yaan/wp-willmail-put).

## Requirements

* WordPress 4.7 or above.
* PHP 5.6+ or above.
* This plug-in requires the [Contact Form 7](https://ja.wordpress.org/plugins/contact-form-7/) plug-in.

## For users

The master branch is development version.
Instead you can get a stable version from [released tags](https://github.com/1yaan/wp-willmail-put/releases).

## For developers

An automated testing status of *master* branch: [![Build Status](https://travis-ci.org/1yaan/wp-willmail-put.svg?branch=master)](https://travis-ci.org/1yaan/wp-willmail-put)

## Usage

* [WiLL Cloud ログイン](https://willap.jp/login?wordpres-plugin=wp-willmail-put) より、ログインしてください。
* まずはメニューの「データベース」から、「データベース設計」を選択してください。
* "ターゲットDB"を作成ください。ご不明点はWiLL Mailのサポートセンターへどうぞ！ターゲットDBのIDを以下のフォームへ設定してください。
* 次にメニューの「アカウント」から、「API情報」を選択してください。
* API情報画面にて表示される"アカウントキー"と"APIキー"を以下のフォームへ設定してください。
* 次に、 [Contact Form 7](https://contactform7.com/) でフォームを作ります。
* フォームの各項目の名前を先ほど作ったデータベースの項目のJSONフィールド名と同じにしてください。
* 項目のJSONフィールド名は、API情報画面の"データベースAPI情報"に表示される"JSONフィールド情報"を見てください。
* フォームの中に `[hidden wwp_mail]` もしくは `[hidden wwp_submit]` を設定します。この項目を設定することで、当プラグインは動きます。
* `[hidden wwp_mail]` を設定した場合は、Contact Form 7がメールを送信するときに、WiLL Mailへputします。
* `[hidden wwp_submit]` を設定した場合は、Contact Form 7で作ったフォームで、送信ボタンを押した処理の最後にWiLL Mailへputします。
* 今のところ、2つの違いは特にありません！
* これで準備完了です。

### Contact Form 7 sample

WiLL Mail のターゲット DB に、以下のようなデータベースを作った場合、

| WiLL Mail 項目名 | フィールド名 | データ型        | 型       |
|:--------------- |:----------:|:-------------- |:------- |
| 名前             |  field_1   | 文字列型        | string  |
| メールアドレス     |   field_2  | メールアドレス型 | string  |
| 性別             |   field_3  | 選択型         | [string] |

JSONオブジェクト構造は以下のようになるでしょう。
これは、「アカウント」から、「API情報」を選択し、"データベースAPI情報"を選択することで、表示されます。

    {
        "field_1" : string,
        "field_2" : string,
        "field_3" : [string],
    }

この場合の Contact Form 7 の入力欄は以下のようになります。

    お名前 (必須)
    [text* field_1]

    メールアドレス (必須)
    [email* field_2]

    性別
    [radio field_3 default:1 "男" "女"]

    [hidden wwp_mail]

    [submit "送信"]


Contact Form 7 の入力フォームの中に、 `[hidden wwp_mail]` か `[hidden wwp_submit]` を入れることを忘れないでください。
このフォームをページに設置してください。
必要事項を入力し、送信ボタンを押すと、 WiLL Mail のターゲット DB へ登録されます。
WiLL Mail からは、登録完了メール等は送信されませんので、 Contact Form 7 に自動返信の内容等を盛り込むことをおすすめします！

## License

[GNU General Public License version 2 or later](http://www.gnu.org/licenses/gpl-2.0.html)

Copyright (c) 2017- [@1yaan](https://twitter.com/1yaan)

The WordPress Popular Posts plugin is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

The WordPress Popular Posts plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with the WordPress Popular Posts plugin; if not, see [http://www.gnu.org/licenses](http://www.gnu.org/licenses/).
