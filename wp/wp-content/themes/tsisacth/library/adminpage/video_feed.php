<?php
header('Content-type: application/json');
$s = isset($_REQUEST['s'])?$wpdb->esc_like($_REQUEST['s']):false;
$order_id = isset($_REQUEST['order_id'])?$_REQUEST['order_id']:false;
$orderby = isset($_GET['orderby'])?$_GET['orderby']:'ID';
$order = isset($_GET['order'])?$_GET['order']:'DESC';
$paged = isset($_REQUEST['paged'])?$_REQUEST['paged']:1;
$limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:10;
$vdofeeds = NULL;
$vdofeeds = (object)$vdofeeds;
$begin = 0;
if($paged>1){
	$begin = ($paged-1)*$limit;
}
if($order_id){
	$orderby = 'order_id';
}
$wheretxt = '';
if($s){
	$s = '%' . $s . '%';
	$wheretxt = $wpdb->prepare("where vdourl like %s OR vdo_title like %s ",$s,$s);
}
if($order_id){
	if($wheretxt == ''){
		$wheretxt = 'where ';
	}else{
		$wheretxt .= ' AND ';	
	}
	$wheretxt = $wheretxt."order_id>0";
}
$limittxt = "limit {$begin},{$limit}";
if($order_id){
	$limittxt = '';
}
$total = $wpdb->get_var("SELECT count(ID) FROM wp_videos {$wheretxt}");
$sql = "
         SELECT * FROM wp_videos
		 {$wheretxt}
		 ORDER BY {$orderby} {$order}
		 {$limittxt}
		";

$vdofeeds->data = $wpdb->get_results($sql);
$p = new pagination;
$p->items($total);
$p->limit($limit);
$p->nextLabel('');//removing next text
$p->prevLabel('');//removing previous text
$p->nextIcon('&#9658;');//Changing the next icon
$p->prevIcon('&#9668;');//Changing the previous icon
$p->target($_SERVER['REQUEST_URI']);
$p->currentPage($paged);
$p->parameterName("paged");
$vdofeeds->paging = $p->getOutput();
echo json_encode($vdofeeds);