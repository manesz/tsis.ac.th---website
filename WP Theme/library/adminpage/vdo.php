<?php include_once('script.php');?>
<style type="text/css">
#tsis-vdo_edit,#well-addvdo,#vdotumb-list,#vdotumb-paging,#vdohitumb-list,#vdohitumb-paging,#savevdohitumb-list{display:none}h3{margin:0}.vdolist-li,.vdohilist-li,.sortable-placeholder{width:250px;float:left;display:block;margin-left:5px;overflow:hidden;height:180px;position:relative}.clear{clear:both}#vdotumb-paging span,#vdotumb-paging a{padding:5px 10px;display:inline-block}.blackdrop-bt{width:250px; height:180px; position:absolute; top:0; left:0; display:none !important; background:rgba(0,0,0,.7);display:block;padding:50px 0 0;text-align:center}.vdolist-li:hover .blackdrop-bt,.vdohilist-li:hover .blackdrop-bt{display:block !important}.blackdrop-bt button{margin-left:5px}li.sortable-placeholder{width:246px;height:176px;outline:2px dashed #333; border:none}
</style>
<div class="container-fluid">
<div class="row">
	<div class="col-md-12">
    <h2>Vdo Manage</h2>
    <div class="panel panel-default">
  <div class="panel-body">
  <h3>Vdo หน้าแรก</h3>
  <div class="panel panel-default">
  <div class="panel-body" id="tsis-hilightvdolist">
  <div id="savevdohitumb-list" class="well"><button type="button" class="btn btn-primary" id="savevdo-order"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button></div><div id="vdohitumb-loading"><i class="icon-spin6 animate-spin"></i> Loading...</div>
  	<div id="vdohitumb-list"></div><div class="clear"></div>
    
  </div>
  </div>
    <button type="button" class="btn btn-primary" id="add-video-bt" data-toggle="modal" data-target="#addVdoModal"><i class="glyphicon glyphicon-plus"></i> Add Video</button>
    <hr />
    <div class="panel panel-default">
  <div class="panel-body" id="tsis-vdolist">
  	<div id="vdotumb-loading"><i class="icon-spin6 animate-spin"></i> Loading...</div>
  	<div id="vdotumb-list"></div><div class="clear"></div>
    <div id="vdotumb-paging"></div>
  </div>
  </div>
  </div>
</div>
    </div>
</div>
	
</div>
<div class="clear"></div>
<!-- vdo Add and Edit -->
<div class="modal fade" id="addVdoModal" tabindex="-1" role="dialog" aria-labelledby="addVdoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addVdoModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-default" id="tsis-vdo_add">
          <div class="panel-body">
          <form action="#" id="form-geturl" method="post">
          	<div class="input-group">
              <input name="geturldata" type="text" class="form-control" id="geturldata" aria-label="..." />
              <div class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-facetime-video"></i> LoadData</button>
              </div>
            </div>
          </form>
          </div>
        </div>
        <div class="panel panel-default" id="tsis-vdo_edit">
          <div class="panel-body">
          	<div id="vdo_editloading-stage"><i class="icon-spin6 animate-spin"></i> Loading...</div>
            <form action="<?php echo get_option('siteurl').'/';?>?feedaction=vdoadd" method="post" id="vdoaddstage-form">
            	<div class="container" style="width:100%">
                	<div class="row">
                    	<div class="col-md-3"><img src="<?php echo get_stylesheet_directory_uri() . '/library/images/apple-touch-icon.png';?>" title="" id="vdo-thumburl" width="100%" /></div>
                      <div class="col-md-9">
                        <div class="form-group">
    <label for="vdoTitleAdd">Video Title</label>
    <input name="vdoTitleAdd" type="text" class="form-control" id="vdoTitleAdd" placeholder="Video Title">
  </div>
  <div class="form-group">
    <label for="vdoDuration">Duration</label>
    <input name="vdoDuration" type="text" class="form-control" id="vdoDuration" placeholder="Video Duration">
  </div>
  <div class="form-group">
    <label for="vdoDescAdd">Description</label>
    <textarea class="form-control" id="vdoDescAdd" rows="3" placeholder="Video Description"></textarea>
  </div>
                      </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" disabled="disabled" id="savevdo-bt">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var mysiteurl = '<?php echo get_option('siteurl').'/';?>';
</script>
<script type="text/javascript">
var loaderTotal=0,itemLoaded=0;
var hightvdo = {
	countvdo:1,
	init:function(){
		itemLoaded = 0;
		jQuery('#savevdo-order').html('<i class="glyphicon glyphicon-floppy-disk"></i> Save').removeAttr('disabled');
		jQuery('#vdohitumb-list,#savevdohitumb-list').css('display','none');
		hightvdo.getvdobyurl(mysiteurl+'?feedaction=video_feed&order_id=1');
		hightvdo.addEventHightVdo();
	},
	updateVdoOrder:function(vdoid,order_id,callback){
		jQuery.ajax({
			url:mysiteurl+'?feedaction=vdoadd',
			type:"POST",
			dataType:"json",
			data:{
				ran:Math.random(),
				vdoid:vdoid,
				vdo_order_id:order_id
			},
			success:callback
		});
	},
	completeOrder:function(data){
		itemLoaded++;
		jQuery('#savevdo-order').html('<i class="icon-spin6 animate-spin"></i> Saving ('+itemLoaded+'/'+loaderTotal+')');
		if(loaderTotal===itemLoaded){
			hightvdo.init();
		}
	},
	addEventHightVdo:function(){
		jQuery('#savevdo-order').unbind('click');
		jQuery('#savevdo-order').on('click',function(){
			jQuery(this).attr('disabled','disabled').html('<i class="icon-spin6 animate-spin"></i> Saving...');
			jQuery("#vdohilist-load").sortable({disabled:true});
			loaderTotal = jQuery("li.vdohilist-li").length;
			itemLoaded = 0;
			jQuery.each(jQuery("li.vdohilist-li"),function(index, element) {
               hightvdo.updateVdoOrder(jQuery(this).find('input.inputid').val(),jQuery(this).attr('rel'),hightvdo.completeOrder);
            });
			return false;
		});
	},
	getvdobyurl:function(url){
		jQuery('#vdohitumb-loading').css('display','block');		
		jQuery.ajax({url:url, dataType:"json",data:{ran:Math.random()},success:hightvdo.initList});
		return false;
	},
	initList:function(data){
		var listdata = data;		
		var listtext = 'ไม่มีข้อมูล';		
		if(listdata.data.length>0){
			hightvdo.countvdo=listdata.data.length;
		listtext = '<ul id="vdohilist-load">';
		jQuery.each(listdata.data,function(index,dat){
			listtext += hightvdo.templateList(dat);
		});
		listtext +='</ul>'; 
		}
		jQuery('#vdohitumb-loading').css('display','none');
		jQuery('#vdohitumb-list').html(listtext).slideDown('fast');
		hightvdo.addEventListVdo();	
	},
	templateList:function(data){
		var mytxt = '<li class="vdohilist-li" rel="'+data.order_id+'"><div class="blackdrop-bt"><button type="button" class="btn btn-default delhivdoitem" title="Delete item"><i class="glyphicon glyphicon-trash"></i></button></div>';
		var vdoid = parseVideoURL(data.vdourl);
		mytxt += '<input type="hidden" value="'+data.ID+'" class="inputid" />';
		mytxt += '<img src="//img.youtube.com/vi/'+vdoid.id+'/mqdefault.jpg" width="100%" />';
		mytxt += '<strong>'+data.vdo_title+'</strong>';
		mytxt += '</li>';
		return mytxt;
	},
	addEventListVdo:function(){
		jQuery( "#vdohilist-load" ).sortable({
		placeholder: "sortable-placeholder",
		stop:function( event, ui ) {
			var ci = hightvdo.countvdo;
			jQuery.each(jQuery('li.vdohilist-li'),function(index,dat){
				jQuery(this).attr('rel',ci);
				ci--;
			});
			jQuery('#savevdohitumb-list').slideDown('fast');
		}
		});
		jQuery( ".delhivdoitem" ).on('click',function(){
			var myparent = jQuery(this).parent().parent();
			myparent.remove();
			var vdoid = myparent.find('input').val();
			hightvdo.updateVdoOrder(vdoid,0,function(data){
				var ci = jQuery("li.vdohilist-li").length;
				jQuery.each(jQuery('li.vdohilist-li'),function(index,dat){
					jQuery(this).attr('rel',ci);
					ci--;
				});
				jQuery("#vdohilist-load").sortable({disabled:true});
				loaderTotal = jQuery("li.vdohilist-li").length;
				itemLoaded = 0;
				jQuery.each(jQuery("li.vdohilist-li"),function(index, element) {
				   hightvdo.updateVdoOrder(jQuery(this).find('input.inputid').val(),jQuery(this).attr('rel'),hightvdo.completeOrder);
				});
			});
			return false;	
		});
	}
};
var mydata;
var mainvdo = {
	init:function(){
		mainvdo.getvdobyurl(mysiteurl+'?feedaction=video_feed');
	},
	refreshvdo:function(){
		mainvdo.getvdobyurl(mysiteurl+'?feedaction=video_feed');
	},
	getvdobyurl:function(url){
		jQuery('#vdotumb-loading').css('display','block');		
		jQuery.ajax({url:url, dataType:"json",data:{ran:Math.random()},success:mainvdo.initList});
		return false;
	},
	delvdobyid:function(vdoid){
		jQuery.ajax({url:mysiteurl+'?feedaction=video_del', dataType:"json",data:{vdoid:vdoid,ran:Math.random()},success:mainvdo.delcallback});
		return false;
	},
	delcallback:function(data){
		if(data.error=='none'){
			mainvdo.refreshvdo();
			hightvdo.init();
		}else{
			alert('Try Again');
		}
	},
	initList:function(data){
		var listdata = data;		
		var listtext = 'ไม่มีข้อมูล';
		if(listdata.data.length>0){
		listtext = '<ul id="vdolist-load">';
		jQuery.each(listdata.data,function(index,dat){
			listtext += mainvdo.templateList(dat);
		});
		listtext +='</ul>'; 
		}
		jQuery('#vdotumb-loading').css('display','none');
		jQuery('#vdotumb-list').html(listtext).slideDown('fast');
		jQuery('#vdotumb-paging').html(listdata.paging).slideDown('fast',function(){
			mainvdo.addEventListVdo();	
		});
	},
	templateList:function(data){
		var mytxt = '<li class="vdolist-li"><div class="blackdrop-bt"><button type="button" class="btn btn-default addtohome" title="add to home"><i class="glyphicon glyphicon-home"></i></button><button type="button" class="btn btn-default delvdoitem" title="Delete item"><i class="glyphicon glyphicon-trash"></i></button></div>';
		var vdoid = parseVideoURL(data.vdourl);
		mytxt += '<input type="hidden" value="'+data.ID+'" class="inputid" />';
		mytxt += '<img src="//img.youtube.com/vi/'+vdoid.id+'/mqdefault.jpg" width="100%" />';
		mytxt += '<strong>'+data.vdo_title+'</strong>';
		mytxt += '</li>';
		return mytxt;
	},
	addToHomebyid:function(vdoid){
		jQuery.ajax({
			url:mysiteurl+'?feedaction=vdoadd',
			type:"POST",
			dataType:"json",
			data:{
				ran:Math.random(),
				vdoid:vdoid,
				vdo_order_id:hightvdo.countvdo+1
			},
			success:mainvdo.completeAddhome
		});
	},
	completeAddhome:function(data){
		if(typeof data.error!=='undefined'){
			alert('error');
		}else{
			hightvdo.init();
		}
	},
	addEventListVdo:function(){
		jQuery('#vdotumb-paging a').on('click',function(){
			var myurl = jQuery(this).attr('href');
			jQuery('#vdotumb-list').slideUp('fast');
			jQuery(this).parent().slideUp('fast',function(){
				mainvdo.getvdobyurl(myurl);
			});			
			return false;	
		});
		jQuery('.delvdoitem').on('click',function(){
			var myid = jQuery(this).parent().parent().find('input.inputid').val();
			if(confirm('คุณต้องการลบ วีดีโอนี้หรือไม่ '+myid)){
				mainvdo.delvdobyid(myid);
			}
			return false;	
		});
		jQuery('.addtohome').on('click',function(){
			var myid = jQuery(this).parent().parent().find('input.inputid').val();
			mainvdo.addToHomebyid(myid);
			return false;
		});
	}
};
var addVdo = {
	lastUrl:'',
	titleModal:'Add Video',
	vdostatus:true,
	vdo_id:'',
	init:function(){
		addVdo.addEventVideo();
	},
	addEventVideo:function(){
		mainvdo.init();
		hightvdo.init();
		jQuery('#addVdoModal').on('show.bs.modal', function (event) {
			var modal = jQuery(this);
			if(addVdo.vdostatus){
			modal.find('.modal-title').text(addVdo.titleModal);
			}
		});
		jQuery('#savevdo-bt').on('click',function(){
			jQuery(this).html('<i class="icon-spin6 animate-spin"></i> Saving...').attr('disabled','disabled');
			jQuery.ajax({
				url:jQuery('form#vdoaddstage-form').attr('action'),
				type:'POST',
				dataType:"json",
				data:{
					vdourl:'https://www.youtube.com/watch?v='+addVdo.vdo_id,
					vdo_desc:jQuery('#vdoDescAdd').val(),
					vdo_title:jQuery('#vdoTitleAdd').val(),
					vdo_duration:jQuery('#vdoDuration').val(),
					ran:Math.random()
				},
				success:function(data){
					mydata = data;
					var susstxt = '<div class="alert alert-success" role="alert" id="well-addvdo"><strong>Save Complete</strong></div>';
					var errortxt = '<div class="alert alert-danger" role="alert" id="well-addvdo"><strong>Error try again !</strong></div>';
					if(typeof mydata.error!=='undefined'){
						alert('error');
					}else{
						jQuery('#addVdoModal div.modal-body').append(susstxt);
						jQuery('#addVdoModal div.modal-body #well-addvdo').fadeIn('fast',function(){
							setTimeout(function(){
								jQuery('#addVdoModal div.modal-body #well-addvdo').remove();
								jQuery('#addVdoModal').modal('hide');
								mainvdo.refreshvdo();
							},300);
						});
					}
				}
			});
			return false;	
		});
		jQuery('#addVdoModal').on('hide.bs.modal', function (event) {
			addVdo.clearVdoYT();
		});
		jQuery('#form-geturl').on('submit',function(){
			var myurl = jQuery('#geturldata').val();
			if(myurl!==''){
			var vdoid = parseVideoURL(myurl);
			addVdo.vdo_id = vdoid.id;
			jQuery('#vdoaddstage-form').css('display','none');
			jQuery('#vdo_editloading-stage').fadeIn('fast',function(){
				jQuery('#tsis-vdo_edit').fadeIn('fast',function(){
				jQuery('#savevdo-bt').attr('disabled','disabled');	
				});
			});		
			addVdo.getVdoYTData(vdoid.id);
			}else{
				alert("No valid media id detected");
			}
			return false;	
		});
	},
	clearVdoYT:function(){
		addVdo.lastUrl='';
		addVdo.titleModal = 'Add Video';
		addVdo.vdostatus = false;
		addVdo.vdo_id = '';
		jQuery('#vdoaddstage-form,#tsis-vdo_edit,#vdo_editloading-stage').css('display','none');
		jQuery('#geturldata').val('');
		jQuery('#savevdo-bt').text('Save changes').attr('disabled','disabled');
	},
	getVdoYTData:function(video_id){
		jQuery.getJSON('http://gdata.youtube.com/feeds/api/videos/'+video_id+'?v=2&alt=jsonc',parseresults);	
	}
};
var vdomange = {
	init:function(){
		vdomange.addEventVdo();
	},
	addEventVdo:function(){
		addVdo.init();
	},
	onready:function(){
		vdomange.init();
	}
};
function parseVideoURL(url) {

    function getParm(url, base) {
            var re = new RegExp("(\\?|&)" + base + "\\=([^&]*)(&|$)");
            var matches = url.match(re);
            if (matches) {
                return(matches[2]);
            } else {
                return("");
            }
        }

        var retVal = {};
        var matches;
        var success = false;

        if ( url.match('http(s)?://(www.)?youtube|youtu\.be') ) {
          if (url.match('embed')) { retVal.id = url.split(/embed\//)[1].split('"')[0]; }
            else { retVal.id = url.split(/v\/|v=|youtu\.be\//)[1].split(/[?&]/)[0]; }
            retVal.provider = "youtube";
            var videoUrl = 'https://www.youtube.com/embed/' + retVal.id + '?rel=0';
            success = true;
        } else if (matches = url.match(/vimeo.com\/(\d+)/)) {
            retVal.provider = "vimeo";
            retVal.id = matches[1];
            var videoUrl = 'http://player.vimeo.com/video/' + retVal.id;
            success = true;
        }

      if (success) {
        return retVal;
      }
      else { alert("No valid media id detected"); return false;}
}
function parseresults(data) {
	addVdo.lastUrl = 'https://www.youtube.com/watch?v='+data.data.id;
	var title = data.data.title;
	var description = data.data.description;
	var duration = data.data.duration;
	var thumbnail = data.data.thumbnail.hqDefault;
	jQuery('#vdoTitleAdd').val(title);
	jQuery('#vdoDuration').val(duration);
	jQuery('#vdoDescAdd').val(description);
	jQuery('#vdo-thumburl').attr('src',thumbnail);	
	jQuery('#vdo_editloading-stage').fadeOut('fast',function(){
		jQuery('#vdoaddstage-form').slideDown('fast',function(){
			jQuery('#savevdo-bt').removeAttr('disabled');	
		});
	});	
}
jQuery(document).ready(vdomange.onready);
</script>
