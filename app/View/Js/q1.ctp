<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>
	<tr>
	<td style="width: 30px;"><button class="remove-cell"><i class="fa fa-times" aria-hidden="true"></i></button></td>
	<td class="desc" style="width: 400px;"><textarea name="data[0][description]" class="m-wrap  description required" rows="2" ></textarea></td>
	<td class="quantity" style="width: 80px;"><input name="data[0][quantity]" class=""></td>
	<td class="unit_price" style="width: 80px;"><input name="data[0][unit_price]"  class=""></td>
	
</tr>

</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>





<?php $this->start('script_own');?>
<style type="text/css">
	.remove-cell{
		border: 0;
    background: transparent;
	}

	.table textarea{
		width:  97% !important;
		resize: none;
		height: 5rem;
	}

	.table input{
		width:  97% !important;
	}
</style>
<script src="https://use.fontawesome.com/69d74df6ce.js"></script>
<script>
$(document).ready(function(){

	$(document).on('click', '#add_item_button', function(){


		$(".table tbody").append('<tr><td><button class="remove-cell"><i class="fa fa-times" aria-hidden="true"></i></button></td><td class="desc"></td class="desc"><td class="quantity"></td><td class="unit_price"></td></tr>');
		

		});

	$(document).on('click', '.table tbody td', function() {
    var text = $(this).text();
    $(this).text('');

    var indexOf = $(this).parent().index();

    if($(this).hasClass('desc')){

    	$('<textarea name="data['+indexOf+'][description]" class="m-wrap  description required" rows="2" />').appendTo($(this)).val(text).select().blur(function() {
        var newText = $(this).val();
        $(this).parent().text(newText).find('textarea').remove();
      });
    }
    else{
    	var classname = $(this).attr('class');

    	$('<input name="data['+indexOf+']['+classname+']" class="" />').appendTo($(this)).val(text).select().blur(function() {
        var newText = $(this).val();
        $(this).parent().text(newText).find('input').remove();
      });
    }
  });

  $(document).on('click', '.table tbody .remove-cell', function(){
  	$(this).parent().parent().remove();
  });
	
});
</script>
<?php $this->end();?>

