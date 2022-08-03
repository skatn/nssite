<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
  include_once(G5_THEME_MOBILE_PATH . '/head.php');
  return;
}

include_once(G5_THEME_PATH . '/head.sub.php');
include_once(G5_LIB_PATH . '/latest.lib.php');
include_once(G5_LIB_PATH . '/outlogin.lib.php');
include_once(G5_LIB_PATH . '/poll.lib.php');
include_once(G5_LIB_PATH . '/visit.lib.php');
include_once(G5_LIB_PATH . '/connect.lib.php');
include_once(G5_LIB_PATH . '/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
  <h1 id="hd_h1" class="absolute fs-0 lh-0 overflow-hidden"><?php echo $g5['title'] ?></h1>
  <div id="skip_to_container" class="z-100000 absolute top-0 left-0 w-px h-px fs-0 kh-0 overflow-hidden"><a href="#container">본문 바로가기</a></div>

  <?php
  if (defined('_INDEX_')) { // index에서만 실행
    include G5_BBS_PATH . '/newwin.inc.php'; // 팝업레이어
  }
  ?>
</div>

<section id="topbar" class="bg-indigo-500 text-white py-2 text-base">
  <div class="container mx-auto flex justify-between px-2 lg:px-0">
    <div class="hidden lg:block">
      <i class="bi bi-envelope inline-flex items-center"><a href="mailto:info@gnutail.com"><span class="pl-1">info@gnutail.com</span></a></i>
      <i class="bi bi-phone inline-flex items-center ml-4"><span> 02) 0000-0000</span></i>
    </div>
    <div class="w-full lg:w-1/2 flex justify-end items-center">
      <?php if ($is_member) {  ?>
        <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php" class="pl-4">정보수정</a>
        <a href="<?php echo G5_BBS_URL ?>/logout.php" class="pl-4">로그아웃</a>
        <?php if ($is_admin) {  ?>
          <a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" class="pl-4">관리자</a>
        <?php }  ?>
      <?php } else {  ?>
        <a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a>
        <a href="<?php echo G5_BBS_URL ?>/login.php" class="pl-4">로그인</a>
      <?php }  ?>
    </div>
  </div>
</section>

<header id="header" class="sticky top-0 flex items-center">
  <div class="container mx-auto text-black">
    <div x-data="{ open: false }" class="flex flex-col mx-auto lg:items-center justify-between lg:flex-row">
      <div class="p-4 flex flex-row items-center justify-between">
        <a href="<?php echo G5_URL ?>" class="text-lg font-semibold tracking-widest text-indigo-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img src="<?php echo G5_THEME_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
      </div>

      <nav :class="{'flex': open, 'hidden': !open}" class="w-full flex-col flex-grow pb-4 lg:pb-0 hidden lg:flex lg:justify-center lg:flex-row z-50">
        <?php
        $sql = " select *
                  from {$g5['menu_table']}
                  where me_use = '1'
                  and length(me_code) = '2'
                  order by me_order, me_id ";
        $result = sql_query($sql, false);
        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
        $menu_datas = array();

        for ($i = 0; $row = sql_fetch_array($result); $i++) {
          $menu_datas[$i] = $row;

          $sql2 = " select *
                    from {$g5['menu_table']}
                    where me_use = '1'
                    and length(me_code) = '4'
                    and substring(me_code, 1, 2) = '{$row['me_code']}'
                    order by me_order, me_id ";
          $result2 = sql_query($sql2);
          for ($k = 0; $row2 = sql_fetch_array($result2); $k++) {
            $menu_datas[$i]['sub'][$k] = $row2;
          }
        }

        $i = 0;
        foreach ($menu_datas as $row) {
          if (empty($row)) continue;

          if (empty($menu_datas[$i]['sub']['0'])) {
        ?>
            <a href="<?php echo $row['me_link']; ?>" class="flex items-center px-3 py-1 mt-2 rounded-lg lg:mt-0 focus:text-indigo-500 hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline"><?php echo $row['me_name'] ?>
            </a>
            <?php
          }

          $k = 0;
          foreach ((array) $row['sub'] as $row2) {

            if (empty($row2)) continue;

            if ($k == 0) { ?>
              <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-3 py-1 mt-2 text-left rounded-lg lg:w-auto lg:mt-0 focus:text-indigo-500 hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline">
                  <span class=""><?php echo $row['me_name'] ?></span>
                  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform lg:-mt-1">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">
                    </path>
                  </svg>
                </button>
                <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg lg:w-48">
                  <div class="dropdownItem px-2 py-2 mb-0.5 rounded-md shadow relative z-50">
                  <?php } ?>

                  <a href="<?php echo $row2['me_link']; ?>" class="block px-4 py-1 rounded-lg hover:text-black focus:text-blxk hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline"><?php echo $row2['me_name'] ?>
                  </a>
                <?php
                $k++;
              }   //end foreach $row2

              if ($k > 0)
                echo '</div></div></div>' . PHP_EOL;
              $i++;
            }   //end foreach $row
            if ($i == 0) {  ?>
                <div class="text-center">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?>
                </div>
              <?php } else { ?>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                  <button @click="open = !open" class="flex flex-row items-center w-full px-3 py-1 mt-2 text-left rounded-lg lg:w-auto lg:inline lg:mt-0 hover:text-indigo-900 focus:text-indigo-900 hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline text-base">
                    <span>기본 메뉴</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 transition-transform duration-200 transform lg:-mt-1">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                  <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg lg:w-48">
                    <div class="dropdownItem px-2 py-2 rounded-md shadow relative z-50">
                      <a class="block px-4 py-1 mb-0.5 rounded-lg hover:text-black focus:text-blxk hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline" href="<?php echo G5_BBS_URL ?>/faq.php" target="_<?php echo $row2['me_target']; ?>">FAQ</a>
                      <a class="block px-4 py-1 mb-0.5 rounded-lg hover:text-black focus:text-blxk hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline" href="<?php echo G5_BBS_URL ?>/qalist.php" target="_<?php echo $row2['me_target']; ?>">Q&A</a>
                      <a class="block px-4 py-1 mb-0.5 rounded-lg hover:text-black focus:text-blxk hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline" href="<?php echo G5_BBS_URL ?>/new.php" target="_<?php echo $row2['me_target']; ?>">새글</a>
                      <a class="block px-4 py-1 mb-0.5rounded-lg hover:text-black focus:text-blxk hover:bg-indigo-200 focus:bg-indigo-200 focus:outline-none focus:shadow-outline" href="<?php echo G5_BBS_URL ?>/current_connect.php" target="_<?php echo $row2['me_target']; ?>">현재접속자 수<?php echo connect('theme/basic'); ?></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div id="theme-toggle" class="px-2 text-xl self-center cursor-pointer bi"></div>
      </nav>

      <!-- 검색 토글 버튼 -->
      <div class="search-icon ml-0 lg:ml-8">
        <div id="search-toggle" class="search-icon cursor-pointer pl-6 flex align-items">
          <svg class="fill-current pointer-events-none text-grey-darkest w-4 h-4 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
          </svg>
        </div>
      </div>

      <button class="hamburger pr-4 lg:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
          <path x-show="!open" x-cloak fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" x-cloak fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
  </div>

  <!-- 검색 입력 -->
  <div class="w-full hidden bg-white shadow-xl z-9999 absolute top-20" id="search-content">
    <div class="container border-t mx-auto py-4 text-black flex justify-center">
      <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
        <input type="hidden" name="sfl" value="wr_subject||wr_content">
        <input type="hidden" name="sop" value="and">
        <label for="sch_stx" class="sr-only">검색어 필수</label>
        <input id="searchfield" type="text" name="stx" id="sch_stx" placeholder="검색어를 입력해주세요" maxlength="20" autofocus="autofocus" class="mr-2 text-grey-800 bg-white transition focus:outline-none p-2 appearance-none leading-normal text-base border">
        <button type="submit" id="sch_submit" value="검색" class="text-lg"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only">검색</span></button>
      </form>

      <script>
        function fsearchbox_submit(f) {
          if (f.stx.value.length < 2) {
            alert("검색어는 두글자 이상 입력하십시오.");
            f.stx.select();
            f.stx.focus();
            return false;
          }

          // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
          var cnt = 0;
          for (var i = 0; i < f.stx.value.length; i++) {
            if (f.stx.value.charAt(i) == ' ')
              cnt++;
          }

          if (cnt > 1) {
            alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
            f.stx.select();
            f.stx.focus();
            return false;
          }

          return true;
        }
      </script>
    </div>
  </div>

  <script>
    /* Toggle dropdown list */
    /* https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8 */
    var searchMenuDiv = document.getElementById("search-content");
    var searchMenu = document.getElementById("search-toggle");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //User Menu
      if (!checkParent(target, searchMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, searchMenu)) {
          // click on the link
          if (searchMenuDiv.classList.contains("hidden")) {
            searchMenuDiv.classList.remove("hidden");
            searchfield.focus();
          } else {
            searchMenuDiv.classList.add("hidden");
          }
        } else {
          // click both outside link and outside menu, hide menu
          searchMenuDiv.classList.add("hidden");
        }
      }
    }

    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  </script>
</header>
<!-- } 상단 끝 -->

<!-- 콘텐츠 시작 { -->
<div id="container" class="container mx-auto sm:px-4">
  <?php if (!defined("_INDEX_")) { ?><h2 id="container_title" class="relative text-center mt-6"><span title="<?php echo get_text($g5['title']); ?>" class="text-xl font-semibold mb-4 block"><?php echo get_head_title($g5['title']); ?></span></h2><?php }
