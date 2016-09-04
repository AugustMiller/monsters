<div class="traits">
  <? $traits = $monster->special_traits()->toStructure() ?>
  <? if ($traits->count()) { ?>
    <ul class="special">
      <? foreach ($traits as $trait) { ?>
        <li class="trait">
          <strong><?= $trait->name()->html() ?></strong>
          <?= $trait->description()->kirbytext() ?>
        </li>
      <? } ?>
    </ul>
  <? } else { ?>
    This creature does not have any <?= Architect::field_label('monster', 'special_traits') ?>.
  <? } ?>
</div>
