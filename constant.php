<?PHP
/**
 *  EZ-VC.jp作業環境共通定数
 *
 *  http://sagyou-ezvc.dyndns.biz/
 */

/**
 *  ホスト名・ディレクトリ
 */
define('HOST_NAME','sagyou-ezvc.dyndns.biz/');
define('HTTP_HOST_URL','http://'.HOST_NAME);
define('HTTPS_HOST_URL','https://'.HOST_NAME);
define('HTTP_DIR','/home/httpd/vhosts/sagyou-ezvc.dyndns.biz/httpdocs/');
define('HTTPS_DIR','/home/httpd/vhosts/sagyou-ezvc.dyndns.biz/httpsdocs/');

/**
 *  MYSQL DB接続情報
 */
define( 'DB_CONNECT_HOST' , "localhost");   // DBサーバー情報
define( 'DB_CONNECT_DBNAME' , "ez-vc_m");   // 使用するDATABASE名
define( 'DB_CONNECT_USER' , "easyvc");      // DBユーザー名
define( 'DB_CONNECT_PASS' , "vx9g37rs");    // DBパスワード

/**
 *  Web会議システム用の定数
 * （/fms/meet/getparam.php を経て /fms/meet/meet.swf へ渡る）
 */
define( 'WEBMEETING_HOST', 'sagyou-ezvc.dyndns.biz');
define( 'WEBMEETING_BASE_URL', 'http://'.WEBMEETING_HOST.'/fms/meeting/');
define( 'WEBMEETING_APP_NAME', 'meeting');
define( 'WEBMEETING_FLIST_URL', WEBMEETING_BASE_URL.'getflist.php');
define( 'WEBMEETING_UPLOAD_URL', WEBMEETING_BASE_URL.'save.php');
define( 'WEBMEETING_DOWNLOAD_URL', WEBMEETING_BASE_URL.'tmp/');
define( 'WEBMEETING_SEND_URL', WEBMEETING_BASE_URL.'settime.php');
define( 'WEBMEETING_LIMIT', 3);             // 有効期限日数

// 録音ファイル格納場所
define( 'WEBMEETING_FMSLOG_DIR', '/opt/adobe/fms/applications/meeting/streams/');

/**
 *  各種メールアドレス
 */
//define('ADMIN_EMAIL', 'it@funwardstrategy.com' );
//define('ADMIN_EMAIL', 'orui@dream-projects.co.jp' );
//define('ADMIN_EMAIL', 'tacchy.mail@gmail.com' );
define('ADMIN_EMAIL', 'testmail1@nex-pro.com' );

//define('PAYPAL_KESSAI_EMAIL', 'account@synergy-gate.com' );
//define('PAYPAL_KESSAI_EMAIL', 'orui@crossweb.co.jp' );
define('PAYPAL_KESSAI_EMAIL', 'account@funward.jp' );

/**
 *  メールシグネチャ
 */
define('MAIL_SIGNATURE', 
'───────────────────────────────────
※お問い合わせ、ご意見はこちらで承ります。
E-mail info@ez-vc.jp
───────────────────────────────────

ご不明な点などございましたら、お気軽にお問い合わせください。
今後ともよろしくお願いいたします。
	
───────────────────────────────────
ファンワード株式会社　EZ-VC事業部
〒103-0002
東京都中央区日本橋馬喰町1-5-3
陽光日本橋ビル10F
');

/**
 *  関連サイトリンク
 */
define('LINK_NEXPRO','http://www.nex-pro.com/');
define('LINK_NEXPRO_TITLE','「明日のビジネススタイルを変えるサイバーサービス市場　ネクプロ」');
define('LINK_PACCEL','http://www.p-accel.com/');
define('LINK_PACCEL_TITLE','サイバープロジェクトを全速力で駆け抜けろ！！');
define('LINK_CPAJ','http://www.cpa-j.org/');
define('LINK_CPAJ_TITLE','一般社団法人日本サイバープロジェクト協会');

/**
 *  各種メール文章など
 */
define('MAIL_TITLE_CONTACT', '【ファンワード株式会社】お問い合わせをしました' );
define('MAIL_ADMIN_TITLE_CONTACT', '【ファンワード株式会社】お問い合わせがありました' );
define('MAIL_USER_REGIST_ADMIN', '【ファンワード株式会社】利用者登録がありました' );
define('MAIL_USER_REGIST_USER', '【ファンワード株式会社】利用者登録をしました' );
define('MAIL_RESERVE_ADMIN', '【ファンワード株式会社】会議予約の登録がありました' );
define('MAIL_RESERVE_USER', '【ファンワード株式会社】会議予約の登録をしました' );
define('MAIL_USER_SEMINAR_USER', '【ファンワード株式会社】Webセミナーの購読を受付けました' );
/**
 *  テキストフォルダ・ファイル名）
 */
define('TEXT_DIR',HTTP_DIR.'text/');
/**
 *  イメージフォルダ名
 */
define('IMAGES_DIR',HTTP_DIR.'images/');

/**
 *  エラーメッセージ
 */
define( 'NEXPRO_DBERR'   , '時間をおいてから再度行ってください');

/**
 *  MAX
 */
define( 'MEMBER_TITLE_STRLEN' , 25);

/**
 *  1IDの参加者数MAX 主催者＋参加者数
 */
define( 'ENTRY_MAX_ID_CNT' , 30);

/**
 *  入会時支払料金((初期費用：\30,000)+(月額：\9,800))
 */
//define( 'ENTRANCE_FEE' , 39800);
define( 'ENTRANCE_FEE' , 2);
//define( 'MONTHLY_FEE' , 9800);
define( 'MONTHLY_FEE' , 7);
?>
