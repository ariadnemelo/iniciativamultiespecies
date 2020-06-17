<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'HuM/}{kjc^FQi,)jfA~jU|x09;CflngEmaa7$}UPS)Zejdt3b( D3u$=S*8R2@5}' );
define( 'SECURE_AUTH_KEY',  '/%s.if~=NKdIwX}^WIx84ixO:dwV&I|y5gSG$T$@H5q&$)t{RD4j:0|r3:s6^,Z3' );
define( 'LOGGED_IN_KEY',    'x=XmtQ)lY>HAFtnpE&(#I xME?lGpD9~rP2d@Vsx  )y`mzm!eqXA@h0vk[h`0Ih' );
define( 'NONCE_KEY',        'MC7W=?MG Ztjfdw/M1W-032pL#Foc^PY$@9H+/yTV A?bUJPkYrToq2_b|6c3Jy)' );
define( 'AUTH_SALT',        '$uI/Z]=tn}TZXi6e[3_L7x_UQ!&wwZX7 3&!xG@[XOc9nkP-VdUQi*oXmYU]%r<2' );
define( 'SECURE_AUTH_SALT', '-rQ#qfDa4GDo)nmVEE<>X.3fCpuLtNWGm=S:JN8Wk@I}7Aw[Kc^.Bed)x:H#`Ef;' );
define( 'LOGGED_IN_SALT',   '{*.:3&R,IL?vf06B+TL,-m;@YzW6gqL,a76]P7F%/E~!Tgz/WKf<K]MAf/MQjnke' );
define( 'NONCE_SALT',       'U%J3jN[|;5d4dJ^cVGggUm3{^2bRFrNxI9kfJ-7;VRyu44(8LIuOm=o{>^d[Wb0>' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
