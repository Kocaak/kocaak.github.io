<?php
/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için 
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define('DB_NAME', 'wordpress');

/** MySQL veritabanı kullanıcısı */
define('DB_USER', 'root');

/** MySQL veritabanı parolası */
define('DB_PASSWORD', '');

/** MySQL sunucusu */
define('DB_HOST', 'localhost');

/** Yaratılacak tablolar için veritabanı karakter seti. */
define('DB_CHARSET', 'utf8mb4');

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>Wt{*|Yy<V@~a= =@`217V}>rTI+y&=)f]UXNa}Lku_zAV^QFK1Vf=4N.)!9i*h|');
define('SECURE_AUTH_KEY',  '[LDp(+)2+phH./nCD2XWu,Pkb>EDSIe!D0F[SI#[^W9T_LzON$@&:du8XcCXfUf_');
define('LOGGED_IN_KEY',    '6cnG4yqvZL(yp*#@oAo=D]ys?OKK!BFd^xi!Cf&fmnmC*P,%QKOvII/@[UEbOlr1');
define('NONCE_KEY',        'LrS?Kyrf@#cR!K%A5UpYsuXXs^UB(1~={aGIHjH0)i93I#+S3,Ua07nW`j<1z0.u');
define('AUTH_SALT',        '|&>a]8>FdE1&uJ{z{;~*<KaM<X5)/#1/;wg5S%5;_~YspE*T{wAL]@/-]8jSeOkJ');
define('SECURE_AUTH_SALT', 'T^)UR=7<W36~j>>oxHUiNDp>}d8IZ8+MV-D$:<]HmLFzE$&.Rzt_Fm_qjP2{t,-z');
define('LOGGED_IN_SALT',   'y4<j|mbB4|l>ELZ6WAJ&aZ.+%,&1g26a<Q?a}s]m3+F5w@[zj]TeHml7%0L90[Nc');
define('NONCE_SALT',       'Ghnvc*R9#B)QQVn%=0ws:wk0rqf#0`ZE<Yj}rd-B;^Zeo>)yBTH-2$tj3gW{#Aeo');
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix  = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');
