// counter for image ID`s generation
var counter = 0;

// Dropzone class:
$("#itens-grid").dropzone({ url: "/file/post" });

function addPreview(input, id) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $("#preview-"+ id).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

// calls Jquery

$("#category").on('change', function() {
	var i = $('#category').find(":selected").val()
	var currentCat = subcat[i]
	
	$("#subcategory").empty()

	$.each(currentCat, function( index, value ) {
		$("#subcategory").append("<option value='" + value[0] + "'>" + value[1] + "</option>")
	});
});


$("#add-image").on('click', function() {
	var id = "img-" + (counter += 1)
	$("#itens-grid").append('<div class="image-wrapper col-4"><input class="image-input" type="file" id="' + id + '" name="anexo[]" value="" accept=".jpg, .jpeg, .png"><img id="preview-' + id + '" class="image-preview img-fluid pt-2" src=""></div>')
	
	$("#"+id).click()

	$("#"+id).on('change', function(){
		addPreview(this, id);
	})
	
});




