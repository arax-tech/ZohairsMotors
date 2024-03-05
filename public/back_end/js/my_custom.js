$(document).ready(function(){

    /*Require Form*/
    $("#form").validate({
        rules:{
                required:true
        },
        highlight:function(element){
            $(element).addClass("c1");
        },
        unhighlight:function(element){
            $(element).removeClass("c1");
        }
    });



    /*Check Admin Password*/
    $("#current_password").on('change', function(){
        var current_password = $("#current_password").val();
        //alert(current_password);
        $.ajax({
            type: 'get',
            url: 'check/',
            data: {current_password:current_password},
            success:function(resp){
                $("#change").html(resp);

            },
            error:function(resp){
                alert("Error This");
            }
        });
    });


    


    /*Add & Remove Fields Dynamically Using JQuery*/
    var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group" style="margin-top:10px; width:100%;"><input type="text" class="form-control" name="color[]" placeholder="Color" style="width: 15.4%; margin-right: 4px;" ><input type="text" class="form-control" name="size[]" placeholder="Size" style="width: 15.4%; margin-right: 4px;"><input type="number" class="form-control" name="prize[]" placeholder="Prize" style="width: 15.4%; margin-right: 4px;" ><input type="number" class="form-control" name="stock[]"  required="required" placeholder="Stock" style="width: 15.4%; margin-right: 4px;" ><input type="file" class="form-control" name="image[]" style="width: 22%; margin-right: 4px;"><a href="javascript:void(0);" class="remove_button"><span class="btn btn-danger" style="height: 40px; background-color:#e77338 !important; line-height: 27px; font-size: 18px;" >Remove Fields</span></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });



    

});
