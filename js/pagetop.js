( function( $ ) {

// ページトップ
$(function(){

	var floatHigh = $( '.common_cta, .common_cta_sp' ).height();//下固定バナーの高さを取得

	//bodyにposition: relative;を設定
	$( 'body' ).css( { 'position' : 'relative' } );

	$( window ).scroll( function() {
		scrHeight  = $( document ).height(),//ドキュメントの高さを取得
		scrPos     = $( window ).height() + $( window ).scrollTop(),//現在のトップからの位置
		footHeight = $( '#footer, .site-footer' ).outerHeight( true );//フッターの高さを取得

		//300pxスクロールしたら
		if ( $( this ).scrollTop() > 300 ) {
			//pagetopのtransitionを初期化する
			$( '.pagetop' ).css( { 'transition' : 'inherit' } );
		} else {
			//pagetopのtransitionを元に戻す
			$( '.pagetop' ).css( { 'transition' : 'all ease-in-out .3s' } );
		}

		//pagetopがfooterに達したときの動作
		if ( scrHeight - scrPos <= footHeight - floatHigh ) {
			//footerの上20pxの位置でpagetopを止める
			$( '.pagetop' ).css( {
				'position' : 'absolute',
				'bottom' : footHeight + 20//ここの数字はfooterからの余白分です
			} );
		}

		//pagetopがfooterに達していないときの動作
		else {
			$( '.pagetop' ).css({
				'position' : 'fixed',
				'bottom' : 20//bottomから20pxの位置にpagetopを置く
			} );
		}

		return false;
	});
});


} )( jQuery );


