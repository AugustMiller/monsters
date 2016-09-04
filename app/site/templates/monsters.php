<? snippet('header') ?>

<section class="monster-list">
  <div class="wrap">
    <? foreach ($monsters as $monster) { ?>
      <? snippet('modules/cards/monster', ['monster' => $monster]) ?>
    <? } ?>
  </div>
</section>

<? snippet('footer') ?>
