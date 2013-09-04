<?php 
/*
Template Name: 关于
*/
	// 得到所有标签列表（57为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）
	$args=array(
		'include' => '2'
	); 
	$tags = get_tags($args);
	$essay=[];
	// 循环所有标签 
	foreach ($tags as $tag) { 
		// 得到标签ID 
		$tagid = $tag->term_id; 
		// 得到标签下所有文章 
		query_posts("showposts=-1&tag_id=$tagid"); 
		while(have_posts()):the_post();
		$ti['title']=get_the_title();
		$ti['id']=get_the_ID();
		$essay[]=$ti;
		endwhile;
	}
	print_r($essay);
	echo json_encode($essay);
?>
