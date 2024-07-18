<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$arResult = $arResult["ITEMS"];

foreach ($arResult as $item):
  \Bitrix\Main\Diag\Debug::writeToFile($item, 'item', '1.txt');
  if (isset($item["DETAIL_PICTURE"]["ID"])) {
    $arFileTmp = CFile::ResizeImageGet(
      $item["DETAIL_PICTURE"]["ID"],
      array("width" => 39, "height" => 39),
      BX_RESIZE_IMAGE_PROPORTIONAL,
    );
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
          <img src="<?=$src ?>" alt="">
        </div>
        <div class="name-block"><a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a></div>
        <div class="pos-block"><?=$item["PROPERTIES"]["POSITION"]["VALUE"] ?></div>
      </div>
      <div class="text-block"><?=$item["PREVIEW_TEXT"]?></div>
    </div>
  </div>
</div>

<?php endforeach; ?>

