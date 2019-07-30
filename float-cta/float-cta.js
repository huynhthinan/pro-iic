/*------ 下固定バナー ------*/

(function($) {

//下固定バナーの処理を全部入れた関数
function fixedResize() {

	var footHeight = $('#footer, .site-footer').outerHeight(true),//フッターの高さを取得
	fadeFlag  = false;//フェイドインを一回だけ行うためのフラグ

	if( window.innerWidth > 767 ) {
		floatID = '.bfb-common-cta';
	} else {
		floatID = '.bfb-common-cta-sp';
	}

	floatHigh = $(floatID).height();//下固定バナーの高さを取得

	//footer下のpaddingは下固定バナーの高さと一緒
	$('#footer, .site-footer').css({
		'padding-bottom' : floatHigh
	});

	$(window).load(function() {
		floatHigh = $(floatID).height();//下固定バナーの高さを取得

		//footer下のpaddingは下固定バナーの高さと一緒
		$('#footer, .site-footer').css({
			'padding-bottom' : floatHigh
		});
	});

	$(window).scroll(function() {
		var scrHeight  = $(document).height(),//ドキュメントの高さを取得
		scrPos     = $(window).height() + $(window).scrollTop(),//現在のトップからの位置
		footHeight = $('#footer, .site-footer').outerHeight(true);//フッターの高さを取得

		//10ピクセルスクロールしたらバナーをフェイドインで表示
		if(!closeFlag && !fadeFlag) {
			if($(this).scrollTop() > 10 ) {
				fadeFlag = true;//フェイドインしたというフラグを立てる
				$(floatID).fadeIn();
				}
			}

			//300pxスクロールしたら
			if($(this).scrollTop() > 300) {
				//pagetopのtransitionを初期化する
				$('#pagetop, .pagetop').css({'transition' : 'inherit'});
			} else {
				//pagetopのtransitionを元に戻す
				$('#pagetop, .pagetop').css({'transition' : 'all ease-in-out .3s'});
			}

			//pagetopがfooterに達したときの動作
			if(scrHeight - scrPos <= footHeight - floatHigh) {
				//footerの上20pxの位置でpagetopを止める
				$('#pagetop, .pagetop').css({
					'position' : 'absolute',
				'bottom' : footHeight + 20//ここの数字はfooterからの余白分です
				});
			}

			//pagetopがfooterに達していないときの動作
			else {
			//下固定バナーが表示されているとき
			if(!closeFlag) {
				$('#pagetop, .pagetop').css({
					'bottom' : floatHigh + 20,//下固定バナーの高さ + 20px
					'position' : 'fixed'
				});
			}
			//下固定バナーが非表示のとき
			else {
				$('#pagetop, .pagetop').css({
					'position' : 'fixed',
					'bottom' : 20//bottomから20pxの位置にpagetopを置く
				});
			}
		}
	});

	//閉じるボタンを押したときの動作
	$('.bfb-close-cta').click(function() {

		//closeボタンを押したフラグを立てる
		closeFlag = true;

		//flaotHighの高さを0にする
		floatHigh = 0;

		//バナーを非表示にする
		$(floatID).fadeOut();

		//footer下のpaddingを0にする
		$('#footer, .site-footer').css( {
			'padding-bottom' : 0
		});

		return false;
	});
}


$(function() {
	closeFlag = false;//closeボタンを押したかどうかのフラグ
	width = $(window).innerWidth();//ウインドウ幅取得

	//bodyにposition: relative;を設定
	$('body').css({'position' : 'relative' });

	//開いた幅で下固定バナーを発火
	fixedResize();

	//ウインドウ幅を変更したら、再度下固定バナーを発火
	$(window).resize(function(){
		resizeWidth = $(window).innerWidth();

		if( width == resizeWidth ) {
			return;
		}

		if(!closeFlag) {
			if( resizeWidth > 767 ) {
				$('.bfb-common-cta-sp').hide();
				$('.bfb-common-cta').fadeIn();
				fixedResize();
			} else {
				$('.bfb-common-cta').hide();
				$('.bfb-common-cta-sp').fadeIn();
				fixedResize();
			}
		} else {
			$('.bfb-common-cta').hide();
			$('.bfb-common-cta-sp').hide();
		}
	});
});

})(jQuery);