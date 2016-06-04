<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
           'dateFormat' => 'd-M-Y',
           'datetimeFormat' => 'd-M-Y H:i:s',
           'timeFormat' => 'H:i:s',

           'locale' => 'th-TH', //your language locale
           'defaultTimeZone' => 'Asia/Bangkok', // time zone
      ],
    ],
];
