
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php /*$options_new = array(
 		'Type1' => __('<span class="showDialog" data-id="dialog_1" style="color:blue">Type1</span><div id="dialog_1" class="hide dialog" title="Type 1">
 				<span style="display:inline-block"><ul><li>Description .......</li>
 				<li>Description 2</li></ul></span>
 				</div>'),
		'Type2' => __('<span class="showDialog" data-id="dialog_2" style="color:blue">Type2</span><div id="dialog_2" class="hide dialog" title="Type 2">
 				<span style="display:inline-block"><ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul></span>
 				</div>')
		);*/

$options_new = array(
 		'Type1' => __('<a title="<ul><li>Description .......</li>
 				<li>Description 2</li></ul><button onclick=window.location=\''.$this->Html->url(array("controller" => "Format","action" =>"q1_result"),true).'\'>Save</button>" style="color:blue">Type1</a>'),
		'Type2' => __('<a title="<ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul><button onclick=window.location=\''.$this->Html->url(array("controller" => "Format","action" =>"q1_result"),true).'\'>Save</button>" style="color:blue">Type2</a>')
		);
?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>


<?php echo $this->Form->end();?>
</div>

<style>
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

.ui-tooltip{
	opacity: 1!important;
}

.ui-widget.ui-widget-content{
	width:  200px;
}

.ui-widget.ui-widget-content:before {
	content: "";
  position: absolute;
  bottom: -6px;
  left: 50%;
  transform: translateX(-50%);
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 6px 6px 0 6px;
  border-color: #3b4355 transparent transparent transparent;
  display: inline-block;
  bottom: auto;
  left: -10px;
  top: 50%;
  transform: translateY(-50%);
  border-width: 9px 9px 9px 0;
  border-color: transparent #c5c5c5 transparent transparent;
}
</style>

<?php $this->start('script_own')?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
<script>

$(document).ready(function(){

	$(document).tooltip({
		content: function () {
			$(this).parent().find('input[type=radio]').prop('checked', true);
            return $(this).prop('title');
        },
        position: {
		    my: "center bottom+50",
		    at: "right+140"
		},
        show: null, 
        close: function (event, ui) {
            ui.tooltip.hover(

            function () {
                $(this).stop(true).show();
            },

            function () {
                $(this).fadeOut("400", function () {
                    $(this).remove();
                })
            });
        }
	});
	/*$(".dialog").dialog({
		autoOpen: false,
		width: '500px',
		modal: true,
		dialogClass: 'ui-dialog-blue'
	});

	
	$(".showDialog").click(function(){ var id = $(this).data('id'); $("#"+id).dialog('open'); });*/

})


</script>
<?php $this->end()?>