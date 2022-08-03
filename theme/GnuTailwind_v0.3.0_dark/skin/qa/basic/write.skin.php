<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . $qa_skin_url . '/style_tailwind.css">', 0);
?>

<section id="bo_w">
  <h2 class="sr-only">1:1문의 작성</h2>
  <!-- 게시물 작성/수정 시작 { -->
  <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="qa_id" value="<?php echo $qa_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="token" value="<?php echo $token ?>">
    <?php
    $option = '';
    $option_hidden = '';
    $option = '';

    if ($is_dhtml_editor) {
      $option_hidden .= '<input type="hidden" name="qa_html" value="1">';
    } else {
      $option .= "\n" . '<input type="checkbox" id="qa_html" name="qa_html" onclick="html_auto_br(this);" value="' . $html_value . '" ' . $html_checked . '>' . "\n" . '<label for="qa_html">html</label>';
    }

    echo $option_hidden;
    ?>

    <div class="form_01 pt-4">
      <ul class="grid grid-cols-6 gap-4">
        <?php if ($category_option) { ?>
          <li class="bo_w_select write_div col-span-6">
            <label for="qa_category" class="sr-only">분류<strong>필수</strong></label>
            <select name="qa_category" id="qa_category" required class="p-2 border w-full">
              <option value="">분류를 선택하세요</option>
              <?php echo $category_option ?>
            </select>
          </li>
        <?php } ?>

        <?php if ($is_email) { ?>
          <li class="bo_w_mail chk_box col-span-6 md:col-span-3">
            <label for="qa_email" class="sr-only">이메일</label>
            <input type="text" name="qa_email" value="<?php echo get_text($write['qa_email']); ?>" id="qa_email" <?php echo $req_email; ?> class="<?php echo $req_email . ' '; ?>frm_input full_input email p-2 border w-full mb-2 md:mb-0 outline-none" maxlength="100" placeholder="이메일">
            <label class="flex items-center mt-1">
				<div class="bg-white border rounded border-gray-400 w-4 h-4 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-indigo-500">
					<input type="checkbox" class="opacity-0 absolute"  name="qa_email_recv" id="qa_email_recv" value="1" <?php if ($write['qa_email_recv']) echo 'checked="checked"'; ?>>
					<svg class="fill-current hidden w-3 h-3 text-indigo-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
				</div>
				<span class="inline">답변받기</span>
			</label>
          </li>
        <?php } ?>

        <?php if ($is_hp) { ?>
          <li class="bo_w_hp chk_box col-span-6 md:col-span-3">
            <label for="qa_hp" class="sr-only">휴대폰</label>
            <input type="text" name="qa_hp" value="<?php echo get_text($write['qa_hp']); ?>" id="qa_hp" <?php echo $req_hp; ?> class="<?php echo $req_hp . ' '; ?>frm_input full_input p-2 border w-full outline-none" placeholder="휴대폰">
            <?php if ($qaconfig['qa_use_sms']) { ?>
            	<label class="flex items-center mt-1">
					<div class="bg-white border rounded border-gray-400 w-4 h-4 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-indigo-500">
						<input type="checkbox" class="opacity-0 absolute" name="qa_sms_recv" id="qa_sms_recv" value="1" <?php if ($write['qa_sms_recv']) echo 'checked="checked"'; ?>>
						<svg class="fill-current hidden w-3 h-3 text-indigo-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
					</div>
					<span class="inline">답변등록 SMS알림 수신</span>
				</label>
            <?php } ?>
          </li>
        <?php } ?>

        <li class="bo_w_sbj col-span-6">
          <label for="qa_subject" class="sr-only">제목<strong class="sr-only">필수</strong></label>
          <input type="text" name="qa_subject" value="<?php echo get_text($write['qa_subject']); ?>" id="qa_subject" required class="frm_input full_input required p-2 border w-full outline-none" maxlength="255" placeholder="제목">
        </li>

        <li class="qa_content_wrap <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?> col-span-6">
          <label for="qa_content" class="sr-only">내용<strong class="sr-only">필수</strong></label>
          <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출
          ?>

        </li>

        <?php if ($option) { ?>
          <li>
            옵션
            <?php echo $option; ?>
          </li>
        <?php } ?>

        <li class="bo_w_flie col-span-6">
          <div class="file_wr flex">
            <label for="bf_file_1" class="lb_icon inline-flex justify-center items-center px-3 md:px-6 bg-gray-100 text-gray-500 border border-r-0"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sr-only"> 파일 #1</span></label>
            <input type="file" name="bf_file[1]" id="bf_file_1" title="파일첨부 1 :  용량 <?php echo $upload_max_filesize; ?> 이하만 업로드 가능" class="frm_file p-2 border w-full flex-1 block">
            <?php if ($w == 'u' && $write['qa_file1']) { ?>
              <input type="checkbox" id="bf_file_del1" name="bf_file_del[1]" value="1"> <label for="bf_file_del1"><?php echo $write['qa_source1']; ?> 파일 삭제</label>
            <?php } ?>
          </div>
        </li>

        <li class="bo_w_flie col-span-6">
          <div class="file_wr flex">
            <label for="bf_file_2" class="lb_icon inline-flex justify-center items-center px-3 md:px-6 bg-gray-100 text-gray-500 border border-r-0"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sr-only"> 파일 #2</span></label>
            <input type="file" name="bf_file[2]" id="bf_file_2" title="파일첨부 2 :  용량 <?php echo $upload_max_filesize; ?> 이하만 업로드 가능" class="frm_file p-2 border w-full flex-1 block">
            <?php if ($w == 'u' && $write['qa_file2']) { ?>
              <input type="checkbox" id="bf_file_del2" name="bf_file_del[2]" value="1"> <label for="bf_file_del2"><?php echo $write['qa_source2']; ?> 파일 삭제</label>
            <?php } ?>
          </div>
        </li>
      </ul>
    </div>

    <div class="btn_confirm write_div flex justify-center mt-6 pb-6">
      <a href="<?php echo $list_href; ?>" class="btn_cancel btn leading-8 h-8 px-3 inline-block text-center font-normal border-0 text-base transition transition-colors duration-300 ease-out text-white bg-gray-500 hover:bg-gray-600 rounded mr-1">취소</a>
      <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn leading-8 h-8 px-3 text-center font-normal border-0 text-base transition transition-colors duration-300 ease-out text-white bg-indigo-500 hover:bg-indigo-600 rounded">작성완료</button>
    </div>

  </form>

  <script>
    function html_auto_br(obj) {
      if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
          obj.value = "2";
        else
          obj.value = "1";
      } else
        obj.value = "";
    }

    function fwrite_submit(f) {
      <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함
      ?>

      var subject = "";
      var content = "";
      $.ajax({
        url: g5_bbs_url + "/ajax.filter.php",
        type: "POST",
        data: {
          "subject": f.qa_subject.value,
          "content": f.qa_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
          subject = data.subject;
          content = data.content;
        }
      });

      if (subject) {
        alert("제목에 금지단어('" + subject + "')가 포함되어있습니다");
        f.qa_subject.focus();
        return false;
      }

      if (content) {
        alert("내용에 금지단어('" + content + "')가 포함되어있습니다");
        if (typeof(ed_qa_content) != "undefined")
          ed_qa_content.returnFalse();
        else
          f.qa_content.focus();
        return false;
      }

      <?php if ($is_hp) { ?>
        var hp = f.qa_hp.value.replace(/[0-9\-]/g, "");
        if (hp.length > 0) {
          alert("휴대폰번호는 숫자, - 으로만 입력해 주십시오.");
          return false;
        }
      <?php } ?>

      $.ajax({
        type: "POST",
        url: g5_bbs_url + "/ajax.write.token.php",
        data: {
          'token_case': 'qa_write'
        },
        cache: false,
        async: false,
        dataType: "json",
        success: function(data) {
          if (typeof data.token !== "undefined") {
            token = data.token;

            if (typeof f.token === "undefined")
              $(f).prepend('<input type="hidden" name="token" value="">');

            $(f).find("input[name=token]").val(token);
          }
        }
      });

      document.getElementById("btn_submit").disabled = "disabled";

      return true;
    }
  </script>
</section>
<!-- } 게시물 작성/수정 끝 -->