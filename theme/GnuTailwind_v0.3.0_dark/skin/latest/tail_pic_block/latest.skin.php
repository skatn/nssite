<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="pic_lt relative mb-4">
    <h2 class="lat_title border-t py-2 bg-gray-100 mb-4"><a href="<?php echo get_pretty_url($bo_table); ?>" class="text-lg font-semibold px-2"><?php echo $bo_subject ?></a></h2>
    <ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 xl:gap-6">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="w-full">';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <li class="galley_li">
            <a href="<?php echo $wr_href; ?>" class="lt_img pb-2"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
            <div class="border-l border-r border-b pt-4 pb-2 px-2">
	            <?php
	            if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i><span class=\"sound_only\">비밀글</span> ";

	            echo "<a href=\"".$wr_href."\"> ";
	            if ($list[$i]['is_notice'])
	                echo "<strong>".$list[$i]['subject']."</strong>";
	            else
	                echo $list[$i]['subject'];
	            echo "</a>";

				if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
	            if ($list[$i]['icon_hot']) echo "<span class=\"hot_icon\">H<span class=\"sound_only\">인기글</span></span>";

	            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
	            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

				// echo $list[$i]['icon_reply']." ";
				// if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
	            // if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;

	            if ($list[$i]['comment_cnt'])  echo "
	            <span class=\"lt_cmt\">".$list[$i]['wr_comment']."</span>";

	            ?>

	            <div class="lt_info pt-2 flex justify-between items-center text-sm">
					<span class="lt_nick"><?php echo $list[$i]['name'] ?></span>
	            	<span class="lt_date"><?php echo $list[$i]['datetime2'] ?></span>
	            </div>
            </div>
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li text-base text-center font-normal  py-6 mb-2 border-b">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <a href="<?php echo get_pretty_url($bo_table); ?>" class="lt_more absolute top-0 right-0 text-indigo-400 pr-2 py-3"><span class="sound_only"><?php echo $bo_subject ?></span><i class="fa fa-plus"></i></a>

</div>
