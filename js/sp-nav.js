( function( $ ) {

$(function(){

	var scrollTop;//変数定義

	//sp-navのクラス名変更
	if( $( '.site-branding span' ).hasClass('sp-nav-btn') ) {
		$( '.site-branding span' ).removeClass('sp-nav-btn');
		$( '.site-branding span' ).addClass('xeory-sp-nav-btn');
	}

	$( '.xeory-sp-nav-btn' ).on( 'click', function(){
		scrollTop = $(window).scrollTop();//クリックしたときのポジションを記録
		$( '.xeory-spnav-wrap' ).addClass( 'active' );
		$('body').addClass('noscroll').css('top', -scrollTop);//スクロールを固定
	});

	//navエリア外をクリックしたら、sp-nav-btnについている.activeを削除する
	$( '.xeory-spnav-wrap' ).on( 'click', function(){
		$( '.xeory-spnav-wrap' ).removeClass( 'active' );
		$('body').removeClass('noscroll').css({ 'top' : 0 });//現在のスクロール位置から、0に戻す
		window.scrollTo( scrollTop );//クリックしたときに記録した場所までスクロールする
	});

	//navエリア内はクリックから除外する
	$( '.sp-nav-inner' ).on( 'click', function(e) {
		e.stopPropagation();
	});

	//×ボタンをクリックしたら、sp-nav-btnについている.activeを削除する
	$( '.xeory-spnav-btn-close' ).on( 'click', function(){
		$( '.xeory-spnav-wrap' ).removeClass( 'active' );
		$('body').removeClass('noscroll').css({ 'top' : 0 });//現在のスクロール位置から、0に戻す
		window.scrollTo( 0, scrollTop );//クリックしたときに記録した場所までスクロールする
	});
});

} )( jQuery );