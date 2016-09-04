<ul class="attributes">
  <? $attrs = Architect::blueprint('fields/types-attributes') ?>
  <? foreach ($attrs['options'] as $attribute => $name) { ?>
    <li class="attribute <?= $attribute ?>">
      <h5><abbr title="<?= Architect::field_label('monster', $attribute) ?>"><?= $attrs['abbreviations'][$attribute] ?></abbr></h5>
      <span class="value"><?= $monster->$attribute()->html() ?></span>
      <span class="modifier"><?= Help::adjustment($modifier = Help::ability_modifier($monster->$attribute()->int())) ?></span>
    </li>
  <? } ?>
</ul>
