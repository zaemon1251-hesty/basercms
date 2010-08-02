<?php
/* SVN FILE: $Id$ */
/**
 * ブログ月別アーカイブ
 *
 * TODO 前バージョンとの互換用に残しているので不要になったら削除する
 * 
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2010, Catchup, Inc.
 *								9-5 nagao 3-chome, fukuoka-shi 
 *								fukuoka, Japan 814-0123
 *
 * @copyright		Copyright 2008 - 2010, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			baser.plugins.blog.views
 * @since			Baser v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
if(isset($blogContent)){
	$id = $blogContent['BlogContent']['id'];
}else{
	$id = $blog_content_id;
}
$data = $this->requestAction('/blog/get_blog_dates/'.$id);
$blogDates = $data['blogDates'];
$blogContent = $data['blogContent'];
?>

<div class="side-navi blog-monthly-archives">
	<h2><?php echo '月別アーカイブ' ?></h2>
	<?php if(!empty($blogDates)): ?>
	<ul>
		<?php foreach($blogDates as $blogDate): ?>
		<li>
			<?php $baser->link($blogDate['year'].'年'.$blogDate['month'].'月'.'('.$blogDate['count'].')',array('admin'=>false,'plugin'=>'','controller'=>$blogContent['BlogContent']['name'],'action'=>'archives','date',$blogDate['year'],$blogDate['month']),array('prefix'=>true)) ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>
