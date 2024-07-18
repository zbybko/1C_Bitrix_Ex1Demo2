<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$arResult = $arResult["ITEMS"];

foreach ($arResult as $item):

  if (isset($item["PREVIEW_PICTURE"]["ID"])) {
    $arFileTmp = CFile::ResizeImageGet(
      $item["PREVIEW_PICTURE"]["ID"],
      array("width" => 39, "height" => 39),
      BX_RESIZE_IMAGE_PROPORTIONAL,
    );
    \Bitrix\Main\Diag\Debug::writeToFile($arFileTmp, 'item', '1.txt');
    $src = $arFileTmp['src'];
  }
  else {
    $src = SITE_TEMPLATE_PATH. 'img/no_photo_left_block.jpg';
  }
?>
<div class="item">
  <div class="side-block side-opin">
    <div class="inner-block">
      <div class="title">
        <div class="photo-block">
          <img src="" alt="">
        </div>
        <div class="name-block"><a href="<?=$src ?>"><?=$item["NAME"]?></a></div>
        <div class="pos-block"><?=$item["PROPERTIES"]["POSITION"]["VALUE"] ?></div>
      </div>
      <div class="text-block"><?=$item["PREVIEW_TEXT"]?></div>
    </div>
  </div>
</div>

<?php endforeach; ?>

