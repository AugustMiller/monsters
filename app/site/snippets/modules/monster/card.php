<article class="monster-card">
  <? foreach ([
    'basic',
    'vitals',
    'attributes',
    'extended',
    'traits',
    'actions',
    'more'
  ] as $section) snippet("modules/monster/$section", ['monster' => $monster]) ?>
</article>
