<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/portfolio/work/([a-z0-9_\\-]*)/([a-z0-9_\\-]*).html?(.+)#',
    'RULE' => 'SECTION_CODE=$1&CODE=$2',
    'ID' => '',
    'PATH' => '/portfolio/work/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/service/([a-z0-9_\\-]*)/([a-z0-9_\\-]*).html?(.+)#',
    'RULE' => 'SECTION_CODE=$1&CODE=$2',
    'ID' => '',
    'PATH' => '/service/detail.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/portfolio/work/([A-Za-z0-9\\-\\_]*)/#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => '',
    'PATH' => '/portfolio/work/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/about/news/([0-9]*).html?(.+)#',
    'RULE' => 'ID=$1',
    'ID' => '',
    'PATH' => '/about/news/detail.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/service/([a-z0-9_\\-]*)/?(.+)#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => '',
    'PATH' => '/service/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/portfolio/activity/([0-9]*)/#',
    'RULE' => 'ACT_ID=$1',
    'ID' => '',
    'PATH' => '/portfolio/activity/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/about/news/([0-9]*)/?(.+)#',
    'RULE' => 'section_id=$1',
    'ID' => '',
    'PATH' => '/about/news/',
    'SORT' => 100,
  ),
  16 => 
  array (
    'CONDITION' => '#^={SITE_DIR."service/"}#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/service/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/portfolio/client/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/portfolio/client/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/services/idea/#',
    'RULE' => '',
    'ID' => 'bitrix:idea',
    'PATH' => '/services/idea/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/about/photo/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/about/photo/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/about/blog/#',
    'RULE' => '',
    'ID' => 'bitrix:blog',
    'PATH' => '/about/blog/index.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/report/#',
    'RULE' => '',
    'ID' => 'simai:support',
    'PATH' => '/report/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/form/#',
    'RULE' => '',
    'ID' => 'bitrix:form',
    'PATH' => '/form/test.php',
    'SORT' => 100,
  ),
  14 => 
  array (
    'CONDITION' => '#^/shop/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/shop/index.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/faq/#',
    'RULE' => '',
    'ID' => 'bitrix:support.faq',
    'PATH' => '/faq/index.php',
    'SORT' => 100,
  ),
);
