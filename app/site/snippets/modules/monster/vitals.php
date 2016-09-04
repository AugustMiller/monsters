<ul class="vitals">
  <li class="vital ac">
    <h4 class="label"><?= Architect::field_label('monster', 'ac') ?></h4>
    <span class="ac-value"><?= $monster->ac()->html() ?></span>
    <span class="ac-type"><?= $monster->ac_type()->html() ?></span>
  </li>
  <li class="vital hp">
    <h4 class="label"><?= Architect::field_label('monster', 'hp') ?></h4>
    <span class="hp-value"><?= $monster->hp()->html() ?></span>
    <? if ($monster->hp_formula()->isNotEmpty()) { ?>
      <span class="hp-formula"><?= $monster->hp_formula()->html() ?></span>
    <? } ?>
  </li>
  <li class="vital speed">
    <h4 class="label"><?= Architect::field_label('monster', 'speed') ?></h4>
    <span class="speed-value"><?= $monster->speed()->html() ?></span>
  </li>
</ul>
