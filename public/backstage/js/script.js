$(document).ready(function(){
	$('#dropdownMenuButton').on('click',function(){
		$(this).parent().parent().parent().toggleClass('uptop');
	}).focusout(function(){		
		setTimeout("$('#dropdownMenuButton').parent().parent().parent().removeClass('uptop');", 200);
	});
	
	
	//===========================選單第三層 START ===========================/
	//打開第三層選單
	$('.menu_group .menu_btn > ul > li .list_box ul li a').on('click', function(){
		$('.menu_three_block').addClass('show');
		$('#menu_three_btn-block').addClass('show');
		//加入第二層選單active
		$('.menu_group .menu_btn > ul > li .list_box ul li a').removeClass('active');
		$(this).addClass('active');
		//加入內容動畫切換效果
		$('.menu_three_block .menu_three_list_item').removeClass('changeshow');                
		setTimeout("$('.menu_three_block .menu_three_list_item').addClass('changeshow');", .2);
		
	});
	//點選main 取消第三層選單
	$('#menu_three_btn-block,.menu-ctrl-block').on('click', function(){
		$('.menu_three_block').removeClass('show');
		$(this).removeClass('show');
		$('.menu_group .menu_btn > ul > li .list_box ul li a').removeClass('active');
	});
	$('.menu_group .menu_btn > ul > li > label').on('click', function(){
		$('.menu_three_block').removeClass('show');
		$('#menu_three_btn-block').removeClass('show');
		$('.menu_group .menu_btn > ul > li .list_box ul li a').removeClass('active');
	});
	
	//"手機板"及"收合按鈕" 點選按鈕關閉三層選單
	$('header .header-info .mb_menu, .menu-off').on('click',function(){
		$('.menu_group * input[type=checkbox]').prop("checked",false);
		$('.menu_three_block').removeClass('show');
		$('#menu_three_btn-block').removeClass('show');
		$('.menu_group .menu_btn > ul > li .list_box ul li a').removeClass('active');
	});
	
	//===========================選單第三層 END ===========================/
	
	/*下拉式選單元素層級更改 start*/
	
	$('.sel_class').click(function(){
		$(this).parent().css('z-index',5);
	}).focusout(function(){
		$(this).parent().delay(600).css('z-index',2);
	}); //延遲展開 選單元素
	
	/* more-control 下拉式選單元素層級更改 start*/
	$('.more-control .row [class*="col"] .sel_class').click(function(){
		$(this).parent().parent().parent().css('z-index',5);
	}).focusout(function(){
		$(this).parent().parent().parent().delay(600).css('z-index',2);
	}); //延遲展開 選單元素
	
	/*下拉式選單元素層級更改 end*/
	
	
	//===========================下拉式模組 START ===========================/
	/*多選下拉樣式  start*/
	$('.sel_class.multi').focus(function(){
		$(this).toggleClass('open');
		$(this).find(".nav").slideToggle(300);
		
		$(this).find(".dropdown").find(".close-sel").on("click", function(){
			$(this).parent().parent().blur();
		});
	}).focusout(function(){
		$(this).removeClass('open');
		$(this).find(".nav").slideUp(300);
	}); //開啟關閉下拉選單
	
	$(".sel_class.multi .sel_input").each(function(){
		var select_value = $(this).val();
		var select_item = select_value.split(",");
		select_item.sort();
		if(select_value != ''){
			$(this).parent().parent().find(".sel_info span").addClass("d-none");
		}
		
		for(var item in select_item){
			$(this).parent().find(".nav").find(".item[data-value='" + select_item[item] + "']").addClass("active");
		}
	}); //判斷 input內的value的值陣列切割出來，並掃描選項內的value 加入active
	
	$(".sel_class.multi .nav .item").each(function(){
		if($(this).hasClass("active")){
			var val = $(this).data("value");
			var txt = $(this).data("text");
			
			var item = $("<div data-value='" + val + "' class='del'>" + txt + "<i class='fa fa-times'></i></div>");
			
			$(this).parent().parent().find(".sel_info .box").append(item);
		}
	}); //掃描選項內是否有active,加入選單
	
	$(".sel_class.multi .nav .item").click(function(){
		var val = $(this).data("value");
		var txt = $(this).data("text");
		
		$(this).addClass("active");
		
		var now_select = $(this).parent().parent().find(".sel_input").val();
		
		if(now_select != ''){
			now_select += "," + val;
		}else{
			now_select = val;
		}
		
		$(this).parent().parent().find(".sel_input").val(now_select);
		$(this).parent().parent().find(".sel_info span").addClass("d-none");
		
		var item = $("<div data-value='" + val + "' class='del'>" + txt + "<i class='fa fa-times'></i></div>");
		
		$(this).parent().parent().find(".sel_info .box").append(item);		
		
		item.find("i").on("click", function(){
			var val = $(this).parent().data("value");
			
			var select_value = $(this).parent().parent().parent().parent().find(".sel_input").val();
			var select_item = select_value.split(",");
			var new_select = [];
			
			for(var item in select_item){
				if(val != select_item[item]){
					new_select.push(select_item[item]);
				}
			}
			new_select.sort();
			
			$(this).parent().parent().parent().parent().find(".sel_input").val(new_select.join(','));
			
			if(new_select == 0){
				$(this).parent().parent().parent().parent().find(".sel_info span").removeClass("d-none");
			}
			
			$(this).parent().parent().parent().parent().find(".nav").find(".item[data-value='" + val + "']").removeClass("active");
			$(this).parent().remove();			
		});
	}); //點選加入active, 並且隱藏選單內選項,給予box內新增已選取選單項目。
	
	$(".sel_class.multi .box .del i").click(function(){
		var val = $(this).parent().data("value");
		
		var select_value = $(this).parent().parent().parent().parent().find(".sel_input").val();
		var select_item = select_value.split(",");
		var new_select = [];
		
		for(var item in select_item){
			if(val != select_item[item]){
				new_select.push(select_item[item]);
			}
		}
		new_select.sort();
		
		$(this).parent().parent().parent().parent().find(".sel_input").val(new_select.join(','));
		
		if(new_select == 0){
			$(this).parent().parent().parent().parent().find(".sel_info span").removeClass("d-none");
		}
		
		$(this).parent().parent().parent().parent().find(".nav").find(".item[data-value='" + val + "']").removeClass("active");
		$(this).parent().remove();
		console.log('刪除');
	}); //移除已選取項目
	/*多選下拉樣式  end*/
	
	
	/*多選搜尋下拉樣式  START*/
	$(".sel_class.multi_search_box .sel_input").each(function(){
		var select_value = $(this).val();
		var select_item = select_value.split(",");
		select_item.sort();
		if(select_value != ''){
			$(this).parent().parent().find(".sel_info span").addClass("d-none");
		}
		
		for(var item in select_item){
			$(this).parent().find(".nav").find(".item[data-value='" + select_item[item] + "']").addClass("active");
		}
	}); //判斷 input內的value的值陣列切割出來，並掃描選項內的value 加入active
	
	$(".sel_class.multi_search_box .nav .select-data .item").each(function(){
		if($(this).hasClass("active")){
			var val = $(this).data("value");
			var txt = $(this).data("text");
			
			var item = $("<div data-value='" + val + "' class='del'>" + txt + "<i class='fa fa-times'></i></div>");
			
			$(this).parent().parent().parent().find(".sel_info .box").append(item);
		}
		
		//提示完全沒有顯示無資料
		var activeItem = $(this).parent().parent().parent().parent().find(".nav").find('.active').length;
		var itemLength = $(this).parent().parent().parent().parent().find(".nav").find('.item').length;
		
		if(activeItem == itemLength){
			$(this).parent().parent().parent().parent().find(".nav").find('.select-nodata').removeClass('d-none');
		}else{
			$(this).parent().parent().parent().parent().find(".nav").find('.select-nodata').addClass('d-none');
		}
	}); //掃描選項內是否有active,加入選單
	
	$(".sel_class.multi_search_box .nav .select-data .item").click(function(){
		var val = $(this).data("value");
		var txt = $(this).data("text");
		
		$(this).addClass("active");
		
		var now_select = $(this).parent().parent().parent().find(".sel_input").val();
		
		if(now_select != ''){
			now_select += "," + val;
		}else{
			now_select = val;
		}		
		
		//
		var items = $(this).parent().parent().parent().parent().find(".nav").find('.item');
		var search_num = 0;
		var itemsLength = items.length;
		var search_click = 0;
		
		items.each(function(index, val){
			if(!($(val).is(".nosearch")) && !($(val).is(".active"))){
				search_num++;
			}
			if($(val).is(".active")){
				search_click++;
			}
		});
		
		if(search_num == 0){
			var key = $(this).parent().parent().find('.search-box').find('input').val();
			$(this).parent().parent().find('.select-nomeets').removeClass('d-none');
			$(this).parent().parent().find('.select-nomeets p span').text(key);
		}else{
			$(this).parent().parent().find('.select-nomeets').addClass('d-none');
		}
		
		if(search_click == itemsLength){
			$(this).parent().parent().find('.select-nomeets').addClass('d-none');
			$(this).parent().parent().find('.select-nodata').removeClass('d-none');
		}
		//
		$(this).parent().parent().parent().find(".sel_input").val(now_select);
		$(this).parent().parent().parent().find(".sel_info span").addClass("d-none");
		
		var item = $("<div data-value='" + val + "' class='del'>" + txt + "<i class='fa fa-times'></i></div>");
		
		$(this).parent().parent().parent().find(".sel_info .box").append(item);		
		
		item.find("i").on("click", function(){
			
			//====
			var val = $(this).parent().data("value");
			
			var select_value = $(this).parent().parent().parent().parent().find(".sel_input").val();
			var select_item = select_value.split(",");
			var new_select = [];
			
			for(var item in select_item){
				if(val != select_item[item]){
					new_select.push(select_item[item]);
				}
			}
			new_select.sort();
			
			//
			var items = $(this).parent().parent().parent().parent().find(".nav").find('.item');
			var search_num = 0;
			var itemsLength = items.length;
			var search_click = 0;
			
			items.each(function(index, val){
				if(!($(val).is(".nosearch")) && !($(val).is(".active"))){
					console.log(search_num);
					search_num++;
				}
				if($(val).is(".active")){
					search_click++;
				}
			});
			
			if(search_num == 0){			
				$(this).parent().parent().parent().parent().find(".nav").find('.select-nomeets').addClass('d-none');						
			}
			if(search_click == itemsLength){
				
			}else{
				$(this).parent().parent().find('select-nomeets').removeClass('d-none');
			}
			//
			
			$(this).parent().parent().parent().parent().find(".sel_input").val(new_select.join(','));
			
			if(new_select == 0){
				$(this).parent().parent().parent().parent().find(".sel_info span").removeClass("d-none");
			}
			
			$(this).parent().parent().parent().parent().find(".nav").find(".select-nodata").addClass("d-none");
			
			$(this).parent().parent().parent().parent().find(".nav").find(".item[data-value='" + val + "']").removeClass("active");
			$(this).parent().remove();

			$(".sel_class.multi_search_box .nav .search-box input").keyup();
			//====
		});
		
		
	}); //點選加入active, 並且隱藏選單內選項,給予box內新增已選取選單項目。
	
	$(".sel_class.multi_search_box .box .del i").click(function(){
		
		var val = $(this).parent().data("value");
		
		var select_value = $(this).parent().parent().parent().parent().find(".sel_input").val();
		var select_item = select_value.split(",");
		var new_select = [];
		
		for(var item in select_item){
			if(val != select_item[item]){
				new_select.push(select_item[item]);
			}
		}
		new_select.sort();
		
		//
		var items = $(this).parent().parent().parent().parent().find(".nav").find('.item');
		var search_num = 0;
		
		items.each(function(index, val){
			if(!($(val).is(".nosearch")) && !($(val).is(".active"))){				
				search_num++;
			}			
		});		
		
		if(search_num == 0){			
			$(this).parent().parent().parent().parent().find(".nav").find('.select-nomeets').addClass('d-none');						
		}
		
		//
		
		$(this).parent().parent().parent().parent().find(".sel_input").val(new_select.join(','));
		
		if(new_select == 0){
			$(this).parent().parent().parent().parent().find(".sel_info span").removeClass("d-none");
		}
		
		$(this).parent().parent().parent().parent().find(".nav").find(".select-nodata").addClass("d-none");
		
		$(this).parent().parent().parent().parent().find(".nav").find(".item[data-value='" + val + "']").removeClass("active");		
		$(this).parent().remove();

		$(".sel_class.multi_search_box .nav .search-box input").keyup();
	}); //移除已選取項目
	
	$(".sel_class.multi_search_box .nav .search-box input").keyup(function(){
		var key = $(this).val();
		var items = $(this).parent().parent().parent().parent().find(".nav").find('.item');
		var search_num = 0;
		var itemsLength = items.length;
		var search_click = 0;
		
		items.each(function(index, val){
			if($(val).text().indexOf(key) == -1){
				$(val).addClass('nosearch');
			}else{				
				$(val).removeClass('nosearch');
			}
			
			if(!($(val).is(".nosearch")) && !($(val).is(".active"))){
				search_num++;
			}
			
			if($(val).is(".active")){
				search_click++;
			}
		});
		
		if(search_num == 0){
			var key = $(this).parent().parent().find('.search-box').find('input').val();
			$(this).parent().parent().find('.select-nomeets').removeClass('d-none');
			$(this).parent().parent().find('.select-nomeets p span').text(key);
		}else{
			$(this).parent().parent().find('.select-nomeets').addClass('d-none');
		}
		
		if(search_click == itemsLength){
			$(this).parent().parent().find('.select-nomeets').addClass('d-none');
			$(this).parent().parent().find('.select-nodata').removeClass('d-none');
		}
		
	});
	/*搜尋多選下拉樣式  end*/
	
	
	
	/*單選下拉樣式*/
	$(".sel_class.signle .sel_input").each(function(){
		var select_value = $(this).val();
		
		if(select_value != ''){
			$(this).parent().parent().find(".sel_info span").addClass("d-none");
		}
		
		$(this).parent().find(".nav").find(".item[data-value='" + select_value + "']").addClass("active");
	}); //判斷 input內的value的值陣列切割出來，並掃描選項內的value 加入active
	$(".sel_class.signle .nav .item").each(function(){
		if($(this).hasClass("active")){
			var val = $(this).data("value");
			var txt = $(this).data("text");
			
			$(this).parent().parent().find(".sel_info .box").append(txt);
		}
	}); //掃描選項內是否有active,加入選單
	
	$(".sel_class.signle .nav .item").click(function(){
		var val = $(this).data("value");
		var txt = $(this).data("text");
		
		$(this).parent().find(".item").removeClass("active");
		$(this).addClass("active");
		
		$(this).parent().parent().find(".sel_info .box").html("");
		$(this).parent().parent().find(".sel_info .box").append(txt);
	});
	
	$('.sel_class.signle').click(function(){
		$(this).toggleClass('open');
		$(this).find(".nav").slideToggle(300);
		
		$(this).find(".nav").find(".item").click(function(){
			var val = $(this).data("value");
			
			$(this).parent().parent().find(".sel_input").val(val);
			$(this).parent().parent().find(".sel_info span").addClass("d-none");
		});
	}).focusout(function(){
		$(this).removeClass('open');
		$(this).find(".nav").slideUp(300);
	});
	/*單選下拉樣式  END*/
	
	
	
	//===========================下拉式模組 END ===========================/
	
	/*權限修改  START*/
	$(".permission_group .sel_class.signle .nav .item").each(function(){
		if($(this).hasClass("active")){
			var val = $(this).data("value");
			var txt = $(this).data("text");
			var icondata =$(this).data("icon");
			var icon = $("<i></i>");
			
			$(this).parent().parent().find(".sel_info .box").html("");
			$(this).parent().parent().find(".sel_info .box").append(icon);
			$(this).parent().parent().find(".sel_info .box i").addClass(icondata).addClass('mr-2');
			$(this).parent().parent().find(".sel_info .box").append(txt);
		}
	}); //掃描選項內是否有active,加入選單
	
	$(".permission_group .sel_class.signle .nav .item").click(function(){
		var val = $(this).data("value");
		var txt = $(this).data("text");
		var icondata =$(this).data("icon");
		var icon = $("<i></i>");
		
		$(this).parent().find(".item").removeClass("active");
		$(this).addClass("active");
		
		$(this).parent().parent().find(".sel_info .box").html("");
		$(this).parent().parent().find(".sel_info .box").append(icon);
		$(this).parent().parent().find(".sel_info .box i").addClass(icondata).addClass('mr-2');
		$(this).parent().parent().find(".sel_info .box").append(txt);
	});
	/*權限修改  END*/
	
	/*單選下拉式換頁 start*/
	$('.other_theme_group.header_select .dropdown').click(function(){
		$(this).toggleClass("open");
		$(this).next('.nav').slideToggle(300).css('display','flex');
	}).focusout(function(){
		$(this).removeClass('open');
		$(this).next(".nav").slideUp(300);
	});
	/*單選下拉式換頁 end*/
	
	/*問卷多組tab單選下拉式換頁_手機板 start*/
	$('.sel_group .dropdown').on('click',function(){
		$(this).toggleClass('open');
		$(this).next('.sel_info').slideToggle(300);
		
		$(this).next('.sel_info').find('a').on('click',function(){
			$(this).parents().prev('.dropdown').find('p').html($(this).html());
		});
	}).focusout(function(){
		$(this).removeClass('open');
		$(this).next('.sel_info').slideUp(300);
	});
	/*問卷多組tab單選下拉式換頁_手機板 end*/
	
	/*修改狀態的儲存彈跳視窗，提高區塊的z軸*/
	$("#save_btn").click(function(){
		$(".main_header").css("z-index","4");
	});
	
	$('input[name="datepicker"]').focus(function(){
		$(".main_header").css("z-index","2");
	});
	
	/*通知顯示開關*/
	$(".notice_btn").click(function(){
		$(this).toggleClass("active");
		$(".notice_box").toggleClass("open");
		$(".review_box").removeClass("open");
		$(".review_box").removeClass("open");
	}).focusout(function(){
		$(this).removeClass("active");
		setTimeout('$(".notice_box").removeClass("open");',100);
	});
	
	/*審核顯示開關*/
	$(".review_btn").click(function(){
		$(this).toggleClass("active");
		$(".review_box").toggleClass("open");
		$(".notice_box").removeClass("open");
		$(".notice_box").removeClass("open");
	}).focusout(function(){
		$(this).removeClass("active");
		setTimeout('$(".review_box").removeClass("open");',100);
	});
	
	
	/*手機板關閉右側選單關閉審核及通知box*/
	$("label[for='menu-user-data']").click(function(){
		$(".review_box").removeClass("open");
		$(".notice_box").removeClass("open");
	});
	
	/*儲存後展開其他功能*/
	$(".other-function").click(function(){
		$(this).toggleClass("active");		
		$(this).next('.other-function-box').toggleClass("open");
	}).focusout(function(){
		$(this).removeClass("active");
		$(this).next('.other-function-box').removeClass("open");		
	});
});

$('.accordion > .btn').on('click',function(){
	$(this).addClass('active');
	$(this).next('.nav').addClass('open');
	$(this).next('.nav').css('pointer-events','auto');
	// $(this).parent().parent().parent().addClass('z-index-3');
}).focusout(function(){
	$(this).addClass('test');
	$(this).removeClass('active');
	$(this).next('.nav').removeClass('open');
	//$(this).next('.nav').css('pointer-events','none');
	setTimeout("$('.accordion > .btn.test').removeClass('test').next('.nav').css('pointer-events','none');", 200);
	// $(this).parent().parent().parent().removeClass('z-index-3').delay(500);
});

$('input[name="select_a"]').on('click',function () {
	var can_display = false;
	$( ".sel_open" ).each(function() {
		can_display = (can_display || $( this ).prop('checked'));
	});
	
	if (can_display) {
		$('#sel_a_open').css('display', 'block');
	} else {
		$('#sel_a_open').css('display', 'none');
	}
});


/*圖片預覽指定顯示*/

$(".img_preview .btn_img_viewe ,.album_preview .btn_img_viewe").on("click", function(){
	$(this).parent().parent().find("img").click();
});