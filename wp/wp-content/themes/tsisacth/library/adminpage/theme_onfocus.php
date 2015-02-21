<?php
$highlight_show = get_option('onfocus_show');
$mycategory = get_category_by_slug('onfocus');
$catid = $mycategory->term_id;
if (!$mycategory) {
  $catid = wp_create_category('onfocus', 0);
}
include_once('script.php');?>
<style type="text/css">
    #tsitcontent-stage{display:none}.listinsert{width:190px;float:left;display:block;overflow:hidden;margin-left:5px;cursor:pointer;padding:5px}.listinsert:hover{background:#EEEEEE}.listinsert img{width:100%}.clear{clear:both}.img-thumbfull img{width:100%}#singlecontent-loading{display:none}h2{margin-bottom:10px}#add-video-bt{margin-bottom:10px}
	#tsis-vdo_edit,#well-addvdo,#vdotumb-list,#vdotumb-paging,#vdohitumb-list,#vdohitumb-paging,#savevdohitumb-list{display:none}h3{margin:0}.vdolist-li,.vdohilist-li,.sortable-placeholder{width:250px;float:left;display:block;margin-left:5px;overflow:hidden;height:180px;position:relative}.clear{clear:both}#vdotumb-paging span,#vdotumb-paging a{padding:5px 10px;display:inline-block}.blackdrop-bt{width:250px; height:180px; position:absolute; top:0; left:0; display:none !important; background:rgba(0,0,0,.7);display:block;padding:50px 0 0;text-align:center}.vdolist-li:hover .blackdrop-bt,.vdohilist-li:hover .blackdrop-bt{display:block !important}.blackdrop-bt button{margin-left:5px}li.sortable-placeholder{width:246px;height:176px;outline:2px dashed #333; border:none}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h2>Onfocus order</h2>
      <div class="panel panel-default">
        <div class="panel-body">
        <button type="button" class="btn btn-primary" id="add-video-bt" data-toggle="modal" data-target="#addTopModal"><i class="glyphicon glyphicon-plus"></i> Select Post</button>
        <hr/>
        <div class="panel panel-default">
        <div class="panel-body">
        <div id="savevdohitumb-list"><button type="button" class="btn btn-primary" id="sortsave-bt"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button></div>
        	<div id="singlecontent-loading"><i class="icon-spin6 animate-spin"></i> Loading...</div>
            <div id="singlecontent-stage"></div>
        </div>
        </div>
       	</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addTopModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Onfocus</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                            <div id="tsitcontent-loading"><i class="icon-spin6 animate-spin"></i> Loading...</div>
                            <div id="tsitcontent-stage">
                            </div><div class="clear"></div>
                            <div id="tsitcontent-paging">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
var mysiteurl = '<?php echo get_option('siteurl').'/';?>';
var catid = '<?php echo $catid;?>';
var catslug = 'onfocus',contentkey = 'onfocus_show';
</script>
<script type="text/javascript">
var postidselect=0;
var contentHilight = {
	countvdo:0,
		init:function(){
			jQuery('#singlecontent-loading').css('display','block');
			jQuery('#singlecontent-stage,#savevdohitumb-list').css('display','none');
			hookTopconent.getContentByUrl(mysiteurl+'?feedaction=getcatpost&catslug='+catslug+'&cat_show='+contentkey,contentHilight.initList);
		},
		initList:function(data){
			var listdata = data;		
			var listtext = 'ไม่มีข้อมูล';		
			if(listdata.data.length>0){
			contentHilight.countvdo=listdata.data.length;
			listtext = '<ul id="vdohilist-load">';
			jQuery.each(listdata.data,function(index,dat){
				listtext += contentHilight.templateList(dat);
			});
			listtext +='</ul>'; 
			}
			jQuery('#singlecontent-loading').css('display','none');
			jQuery('#singlecontent-stage').html(listtext).slideDown('fast');
			contentHilight.addEventListhi();	
		},
		addEventListhi:function(){
			jQuery( "#vdohilist-load" ).sortable({
			placeholder: "sortable-placeholder",
			stop:function( event, ui ) {
				var ci = contentHilight.countvdo;
				jQuery.each(jQuery('li.vdohilist-li'),function(index,dat){
					jQuery(this).attr('rel',ci);
					ci--;
				});
				jQuery('#savevdohitumb-list').slideDown('fast');
			}
			});		
			jQuery('.delhivdoitem').on('click',function(){
				var mypost_id = jQuery(this).parent().parent().find('input').val();
				if(confirm('ต้องการลบ post นี้หรือไม่')){
				hookTopconent.getContentByUrl(mysiteurl+'?feedaction=removeposttocat&post_id='+mypost_id+'&contentkey='+contentkey+'&catid='+catid,hookTopconent.updateTopmenu);	
				}
				return false;	
			});
		},
		templateList:function(data){
			var mytxt = '<li class="vdohilist-li" rel="'+data.ID+'"><div class="blackdrop-bt"><button type="button" class="btn btn-default delhivdoitem" title="Delete item"><i class="glyphicon glyphicon-trash"></i></button></div>';
			mytxt += '<input type="hidden" value="'+data.ID+'" class="inputid" />';
			mytxt += data.image;
			mytxt += '<strong>'+data.post_title+'</strong>';
			mytxt += '</li>';
			return mytxt;
		},
		setupPost:function(data){
			jQuery('#postselect-img').html(data.data.image);
			jQuery('#postselect-content h2').html(data.data.title);
			jQuery('#postselect-content #postselect-contentdesc').html(data.data.post_content);
			jQuery('#singlecontent-stage').slideDown('fast',function(){
				jQuery('#singlecontent-loading').css('display','none');
			});
			return false;
		}
	};
var hookTopconent = {
	init: function () {
		hookTopconent.addEventPage();
		contentHilight.init();
	},
	addEventPage: function () {
		jQuery('#addTopModal').on('show.bs.modal', function (e) {
			jQuery('#tsitcontent-loading').css('display', 'block');
			jQuery('#tsitcontent-stage,#tsitcontent-paging').css('display', 'none');                    
			hookTopconent.getContentByUrl(mysiteurl+'?feedaction=getallpost',hookTopconent.getDatToModal);
		});
		jQuery('button#sortsave-bt').on('click',function(){
		  var myArr = [];
		jQuery.each(jQuery('input.inputid'),function(index, element) {
            myArr.push(jQuery(this).val());
        });
		yJsonString = JSON.stringify(myArr);
		hookTopconent.getContentByUrlData(mysiteurl+'?feedaction=setoptionbykey&contentkey='+contentkey,{dataset:yJsonString},hookTopconent.saveContentkey);
		return false;	
	});
	},
	saveContentkey:function(){
		contentHilight.init();
	},
	templatePostList: function (data) {
		var mytext = '<li class="listinsert" rel="' + data.ID + '">';
		mytext += data.image;
		mytext += '<strong>';
		mytext += data.post_title;
		mytext += '</strong>';
		mytext += '</li>';
		return mytext;
	},
	getDatToModal: function (data) {
		var mytxtdat = '<ul id="postdatlist">';
		jQuery.each(data.data, function (index, dat) {
			mytxtdat += hookTopconent.templatePostList(dat);
		});
		mytxtdat += '</ul>';
		jQuery('#tsitcontent-loading').css('display','none');
		jQuery('#tsitcontent-stage').html(mytxtdat).slideDown('fast');
		var mypaging = data.pagination;
		mypaging = mypaging.replace(/http:\/\/tsis.ac.th\/i\//g,mysiteurl);
		mypaging = mypaging.replace(/s\#038\;s\/\?/g,'s=&');
		jQuery('#tsitcontent-paging').html(mypaging).slideDown('fast');
		hookTopconent.addPagingEvent();
	},
	addPagingEvent:function(){
	  jQuery('#tsitcontent-paging a').on('click',function(){
		  var myurl = jQuery(this).attr('href');
		  jQuery('#tsitcontent-stage').slideUp('fast',function(){
			jQuery('#tsitcontent-paging').css('display','none');
		});
		jQuery('#tsitcontent-loading').css('display','block');
		  hookTopconent.getContentByUrl(myurl,hookTopconent.getDatToModal);
		  return false;
	  });  
	  jQuery('li.listinsert').on('click',function(){
		var mypostid = jQuery(this).attr('rel');
		postidselect = mypostid;
		jQuery('#tsitcontent-stage').slideUp('fast',function(){
			jQuery('#tsitcontent-paging').css('display','none');
		});
		jQuery('#tsitcontent-loading').css('display','block');
		  hookTopconent.getContentByUrl(mysiteurl+'?feedaction=setposttocat&post_id='+mypostid+'&catid='+catid+'&contentkey='+contentkey,hookTopconent.updateTopmenu);
		  return false;
	  }); 
	},
	getContentByUrl: function (url, callback) {                
		jQuery.ajax({url: url+'&s=', dataType: "json", success: callback});
	},
	getContentByUrlData: function (url,data, callback) {                
		jQuery.ajax({url: url+'&s=',type:'POST',dataType: "json",data:data, success: callback});
	},
	updateTopmenu:function(data){
		if(data.error==='none'){
			jQuery('#addTopModal').modal('hide');
			contentHilight.init();
		}else{
			alert('Try Again');
		}
	},
	onready: function () {
		hookTopconent.init();
	}
}
jQuery(document).ready(hookTopconent.onready);
</script>