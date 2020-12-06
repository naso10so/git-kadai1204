<?php 

// テーマに機能を追加
function sakura_theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', 'sakura_theme_setup' );

function sakura_theme_init() {
    register_post_type('items',[ //itemsという投稿タイプを追加(英語)
        "labels" => [
            "name" => "商品"//管理画面に表示される名前
        ],
        "public" => true,//公開を許可
        "has_archive" => true,//アーカイブの作成を許可
        "hierarchical" => true,//継承を持たせる
        "menu_position" => 25,//メニューバーに表示される場所。
        "menu_icon" => "dashicons-cart",//dashicon
        "show_in_rest" =>true,//新エディタ対応
    ]);
}
add_action( 'init', 'sakura_theme_init' );
 
// styleとscriptを追加
function sakura_theme_scripts() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() ); 
    wp_enqueue_style( 'pc-style', get_template_directory_uri().'/css/style_pc.css' , array(), false, 'screen and (min-width:769px)' );    
    wp_enqueue_style( 'sp-style', get_template_directory_uri().'/css/style_sp.css' , array(), false, 'screen and (max-width:768px)' );    
	wp_enqueue_script( 'common', get_template_directory_uri() . '/js/common.js');
}
add_action( 'wp_enqueue_scripts', 'sakura_theme_scripts' );

//ウィジェット（サイドバー）
// https://noumenon-th.net/programming/2016/06/22/wordpress10/
function sample_widgets(){
  
    register_sidebar(array(
      'name' => 'サイドバー',
      'id' => 'sidebar',
      'class' => 'sidebar-class',
    ));
    
  }
  add_action('widgets_init', 'sample_widgets');
   
