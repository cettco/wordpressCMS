<?php 
	// 得到所有标签列表（57为标签id，想获取某个标签只需添加进去用逗号隔开，如'include' => '13，57'）
	$args=array(
		'include' => '2'
	); 
	$tags = get_tags($args);
	// 循环所有标签 
	foreach ($tags as $tag) { 
		// 得到标签ID 
		$tagid = $tag->term_id; 
		// 得到标签下所有文章 
		query_posts("showposts=-1&tag_id=$tagid"); 
?> 

<!-- 输出标签标题及链接 --> 
<h2>标签: <a href="<?php echo get_tag_link($tagid);?>" title="<?php echo $tag->name?>"><?php echo $tag->name; ?></a></h2>

<!-- 输出所有文章的标题及链接 --> 
<ul>
	<?php while (have_posts()) : the_post(); ?>
	<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></li>
	<?php endwhile; ?>
</ul>
<?php } ?>
