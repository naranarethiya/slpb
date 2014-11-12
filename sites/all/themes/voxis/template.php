<?php 


$base_url=base_path();
/**
 * Preprocess variables for page template.
 */

/**
 * Override or insert variables into the page template.
 */
function bootstrap_business_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}

/**
 * Preprocess variables for block.tpl.php
 */
function bootstrap_business_preprocess_block(&$variables) {
	$variables['classes_array'][]='clearfix';
}

/* 
	implement HOOK_preprocess_page
 */
function voxis_preprocess_page(&$variables){
    //echo "<pre>".print_r(menu_tree_page_data('main-menu', 2),true);die;
    $ul_class="";
    $li_class="";
    $subul_class="";
    $subli_class="";
    $custom_menus = db_query("SELECT  menu_name,mlid,plid,link_title,link_path,alias
        FROM {menu_links}
        left join {url_alias} on menu_links.link_path=url_alias.source
        where menu_name='main-menu' order by weight asc")->fetchAll();
    $menus=generate_menu($custom_menus);
    $variables['page']['custom_menu']=$menus;
    $variables['page']['posts_title']=latest_posts_title();
}
