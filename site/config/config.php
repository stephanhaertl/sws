<?php

return [
  'locale' => [
    LC_ALL      => 'de_DE.utf-8',
    LC_COLLATE  => 'de_DE.utf-8',
    LC_MONETARY => 'de_DE.utf-8',
    LC_NUMERIC  => 'de_DE.utf-8',
    LC_TIME     => 'de_DE.utf-8',
    LC_MESSAGES => 'de_DE.utf-8',
    LC_CTYPE    => 'de_DE.utf-8'
  ],
  'debug' => true,
  'date.handler' => 'strftime',
    'thumbs' => [
      'srcsets' => [
                'default' => [300, 800, 1024],
                'cover' => [800, 1024, 2048]
          ]
    ],

    'bnomei.robots-txt.sitemap' => 'sitemap.xml',
    'bnomei.robots-txt.groups' => [
        '*' => [
            'disallow' => [
              '/kirby/',
              '/site/',
          ],
          'allow' => [
              '/',
          ],
        ],
        'googlebot-images' => [
            'allow' => [
                '/',
            ],
          ],
    ],

    'omz13.xmlsitemap' => [
      'cacheTTL' => 60,
      'includeUnlistedWhenSlugIs' => [],
      'includeUnlistedWhenTemplateIs' => [],
      'excludePageWhenTemplateIs' => [],
      'excludePageWhenSlugIs' => [],
      'excludeChildrenWhenTemplateIs' => [],
      'disableImages' => false,
    ],


    // other options...
    'pedroborges.meta-tags.default' => function ($page, $site) {

      $resultData = [
          'title' =>  ( $page->metatitle()->toString() ) ? $site->title() . " | " .  $page->metatitle() : $site->title() . " | " .  $page->title(),
          'meta' => [
            'description' => $page->metadescription(),
            'keywords' =>  $page->metakeywords(),
            ],
          'link' => [
              'canonical' => $page->url()
          ],
          'og' => [
              'title' => ( $page->metatitle()->toString() ) ? $site->title() . " | " .  $page->metatitle() : $site->title() . " | " .  $page->title(),
              'type' => 'website',
              'site_name' => $site->title(), //
              'url' => $page->url()
          ],
          'twitter' => [
            'card' => 'summary',
            'title' => ( $page->metatitle()->toString() ) ? $site->title() . " | " .  $page->metatitle() : $site->title() . " | " .  $page->title(),
            'description' => $page->metadescription(),
          ]
      ];

      if($page->ogImage()->isNotEmpty()){
        $thumb = $page->ogImage()->toFile();
        $resultData['og']['image'] = $thumb->url();
      }

      return $resultData;
   }
];
