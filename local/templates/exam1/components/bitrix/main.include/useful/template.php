<?php
if (file_exists($arResult['FILE']) && ($str = trim(file_get_contents($arResult['FILE'])))): //Проверка что файл существует и на контент в файле забирая его в переменную
?>
<div class="side-block side-anonse">
  <div class="title-block"><span class="i i-title01"></span><?=GetMessage('USEFUL_INFO')?></div>
  <div class="item">
    <p><?=$str ?></p>
  </div>
</div>
<?php endif; ?>
