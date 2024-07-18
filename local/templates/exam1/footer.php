<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
</div>
</div>
<!-- /content -->
<!-- side -->
<div class="side">
  <? $APPLICATION->IncludeComponent(
    "bitrix:menu",
    "left",
    array(
      "ALLOW_MULTI_SELECT" => "N",
      "CHILD_MENU_TYPE" => "left",
      "DELAY" => "N",
      "MAX_LEVEL" => "1",
      "MENU_CACHE_GET_VARS" => "",
      "MENU_CACHE_TIME" => "3600",
      "MENU_CACHE_TYPE" => "A",
      "MENU_CACHE_USE_GROUPS" => "Y",
      "ROOT_MENU_TYPE" => "left",
      "USE_EXT" => "Y",
    ),
    false
  ); ?>
  <!-- side anonse -->
  <? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "useful",
    array(
      "AREA_FILE_SHOW" => "sect",
      "AREA_FILE_SUFFIX" => "inc",
      "EDIT_TEMPLATE" => "",
      "COMPONENT_TEMPLATE" => "useful"
    ),
    false
  ); ?>
  <!-- /side anonse -->
  <!-- side wrap -->
  <div class="side-wrap">
    <div class="item-wrap">
      <!-- side action -->
      <div class="side-block side-action">
        <img src="<?= SITE_TEMPLATE_PATH ?>/img/side-action-bg.jpg" alt="" class="bg">
        <div class="photo-block">
          <img src="<?= SITE_TEMPLATE_PATH ?>/img/side-action.jpg" alt="">
        </div>
        <div class="text-block">
          <div class="title">Акция!</div>
          <p>Мебельная полка всего за 560 <span class="r">a</span>
          </p>
        </div>
        <a href="" class="btn-more">подробнее</a>
      </div>
      <!-- /side action -->
    </div>

    <!-- footer rew slider box -->
    <div class="item-wrap">
      <div class="rew-footer-carousel">
        <? $APPLICATION->IncludeComponent(
          "bitrix:catalog.section",
          "reviews-left",
          array(
            "IBLOCK_TYPE" => "rew",
            "IBLOCK_ID" => "5",
            "SECTION_ID" => "",
            "SECTION_USER_FIELDS" => array(
              0 => "",
              1 => "",
            ),
            "ELEMENT_SORT_FIELD" => "sort",
            "ELEMENT_SORT_ORDER" => "asc",
            "FILTER_NAME" => "",
            "INCLUDE_SUBSECTIONS" => "Y",
            "SHOW_ALL_WO_SECTION" => "N",
            "PAGE_ELEMENT_COUNT" => "2",
            "LINE_ELEMENT_COUNT" => "1",
            "PROPERTY_CODE" => array(
              0 => "",
              1 => "",
              2 => "",
            ),
            "SECTION_URL" => "/",
            "DETAIL_URL" => "/",
            "BASKET_URL" => "",
            "ACTION_VARIABLE" => "action",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_SHADOW" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "N",
            "AJAX_OPTION_HISTORY" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_GROUPS" => "N",
            "META_KEYWORDS" => "-",
            "META_DESCRIPTION" => "-",
            "BROWSER_TITLE" => "-",
            "ADD_SECTIONS_CHAIN" => "N",
            "DISPLAY_COMPARE" => "N",
            "SET_TITLE" => "N",
            "SET_STATUS_404" => "Y",
            "CACHE_FILTER" => "N",
            "PRICE_CODE" => array(),
            "USE_PRICE_COUNT" => "N",
            "SHOW_PRICE_COUNT" => "1",
            "PRICE_VAT_INCLUDE" => "N",
            "PRODUCT_PROPERTIES" => array(),
            "USE_PRODUCT_QUANTITY" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Ads",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "TREE_LINE_ELEMENT_COUNT" => "2",
            "TREE_DETAIL_PAGE_URL" => "Y",
          ),
          false
        ); ?>
      </div>
    </div>
    <!-- / footer rew slider box -->
  </div>
  <!-- /side wrap -->
</div>
<!-- /side -->
</div>
<!-- /content box -->
</div>
<!-- /page -->
<div class="empty"></div>
</div>
<!-- /wrap -->
<!-- footer -->
<footer class="footer">
  <div class="inner-wrap">
    <nav class="main-menu">
      <div class="item">
        <div class="title-block">О магазине</div>
        <ul>
          <li><a href="">Отзывы</a>
          </li>
          <li><a href="">Руководство </a>
          </li>
          <li><a href="">История</a>
          </li>
        </ul>
      </div>
      <div class="item">
        <div class="title-block">Каталог товаров</div>
        <ul>
          <li><a href="">Кухни</a>
          </li>
          <li><a href="">Гарнитуры</a>
          </li>
          <li><a href="">Спальни и матрасы</a>
          </li>
          <li><a href="">Столы и стулья</a>
          </li>
          <li><a href="">Раскладные диваны</a>
          </li>
          <li><a href="">Кресла</a>
          </li>
          <li><a href="">Кровати и кушетки</a>
          </li>
          <li><a href="">Тумобчки и прихожие</a>
          </li>
          <li><a href="">Аксессуары</a>
          </li>
          <li><a href="">Каталоги мебели</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="contacts-block">
      <div class="title-block"><?= GetMessage("CONTACT_INFO") ?></div>
      <div class="loc-block">
        <div class="address">ул. Летняя, стр.12, офис 512</div>
        <div class="phone">
          <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
              "AREA_FILE_SHOW" => "file",
              "PATH" => "/local/templates/exam1/include/phone.php",
            )
          ); ?>
        </div>
      </div>
      <div class="main-soc-block">
        <a href="" class="soc-item">
          <img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/soc01.png" alt="">
        </a>
        <a href="" class="soc-item">
          <img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/soc02.png" alt="">
        </a>
        <a href="" class="soc-item">
          <img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/soc03.png" alt="">
        </a>
        <a href="" class="soc-item">
          <img src="<?= SITE_TEMPLATE_PATH ?>/img/icons/soc04.png" alt="">
        </a>
      </div>
      <div class="copy-block">© 2000 - 2012 "Мебельный магазин"</div>
    </div>
  </div>
</footer>
<!-- /footer -->
</body>

</html>
