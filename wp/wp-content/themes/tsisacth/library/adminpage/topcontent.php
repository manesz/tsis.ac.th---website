<?php
include_once('script.php');
$top_content_op = get_option('top_content');
if ($top_content_op == false) {
    add_option('top_content', '1', '', 'yes');
}
$top_content_op = $top_content_op?$top_content_op:1;
?>
<style type="text/css">
    #tsitcontent-stage{display:none}.listinsert{width:190px;float:left;display:block;overflow:hidden;margin-left:5px;cursor:pointer;padding:5px}.listinsert:hover{background:#EEEEEE}.listinsert img{width:100%}.clear{clear:both}.img-thumbfull img{width:100%}#singlecontent-loading{display:none}h2{margin-bottom:10px}#add-video-bt{margin-bottom:10px}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php echo "<h2>" . __('Top Content', 'menu-test') . "</h2>"; ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <button type="button" class="btn btn-primary" id="add-video-bt" data-toggle="modal" data-target="#addTopModal"><i class="glyphicon glyphicon-plus"></i> Select Post</button>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="singlecontent-loading"><i class="icon-spin6 animate-spin"></i> Loading...</div>
                            <div id="singlecontent-stage">
                                <div class="row">
                                    <?php
                                    global $post,$posts;
                                    $post = get_post($top_content_op);
                                    $imagethumb = get_the_post_thumbnail( $post->ID );
                                    $imagethumb = $imagethumb?str_replace('','',$imagethumb):get_first_inserted_image();
                                    ?>
                                    <div class="col-lg-6 img-thumbfull" id="postselect-img"><?php echo $imagethumb;?></div>
                                    <div class="col-lg-6" id="postselect-content"><h2 style="margin-bottom: 40px;"><?php echo $post->post_title;?></h2><div id="postselect-contentdesc"><?php echo $post->post_content;?></div></div>
                                </div>
                                
                            </div><div class="clear"></div>
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
                    <h4 class="modal-title" id="myModalLabel">Change Top content</h4>
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
</script>
    <script type="text/javascript">
        var postidselect = '<?php echo $top_content_op;?>';
        var contentTop = {
            init:function(){
                jQuery('#singlecontent-loading').css('display','block');
                jQuery('#singlecontent-stage').css('display','none');
                hookTopconent.getContentByUrl(mysiteurl+'?feedaction=getcontentbyid&post_id='+postidselect,contentTop.setupPost);
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
            },
            getContentByUrl: function (url, callback) {                
                jQuery.ajax({url: url+'&s=', dataType: "json", success: callback});
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
                  hookTopconent.getContentByUrl(mysiteurl+'?feedaction=settopcontent&post_id='+mypostid,hookTopconent.updateTopmenu);
                  return false;
              }); 
            },
            updateTopmenu:function(data){
                if(data.error==='none'){
                    jQuery('#addTopModal').modal('hide');
                    contentTop.init();
                }else{
                    alert('Try Again');
                }
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
            addEventPage: function () {
                jQuery('#addTopModal').on('show.bs.modal', function (e) {
                    jQuery('#tsitcontent-loading').css('display', 'block');
                    jQuery('#tsitcontent-stage,#tsitcontent-paging').css('display', 'none');                    
                    hookTopconent.getContentByUrl(mysiteurl+'?feedaction=getallpost',hookTopconent.getDatToModal);
                });
            },
            onready: function () {
                hookTopconent.init();
            }
        };
        jQuery(document).ready(hookTopconent.onready);
    </script>