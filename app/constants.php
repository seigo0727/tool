<?php
# 名前
if (!defined('TOOL__NAME')) {
	define('TOOL__NAME', 'tool');
}

# 本番環境
if (!defined('TOOL__ENV_PROD')) {
	define('TOOL__ENV_PROD', 'prod');
}

# テスト環境
if (!defined('TOOL__ENV_STAGING')) {
    define('TOOL__ENV_STAGING', 'staging');
}

# 開発環境
if (!defined('TOOL__ENV_DEVELOP')) {
    define('TOOL__ENV_DEVELOP', 'dev');
}