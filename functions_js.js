function number(evt){
    var char = String.fromCharCode(evt.which);

    if(!(/[0-9]/.test(char))){
        evt.preventDefault();
    }

}


$(document).ready(function(){

    /* DELETE STUDENT INFO */
    $('.btn_del').on('click', function (){
       
        $('#ask_delete').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function (){
            return $(this).text();

        }).get();

        console.log(data);

        $('#del_id').val(data[0]);

    })

    /* END OF DELETE STUDENT INFO */

    $('.btn_pending').on('click', function (){
       
        $('#pending').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function (){
            return $(this).text();

        }).get();

        console.log(data);

        $('#pending_id').val(data[0]);

    })














    /* VIEW STUDENT INFO */
    $('.view_info').click(function(){
        var view_id = $(this).data('id');

        $.ajax({
            url:'functions/view_student.php',
            type: 'post',
            data: {view_id: view_id},
            success: function(response){
                $('.stud_info').html(response);
                $('#viewModal').modal('show');
            }
        })

    })
    /* END OF VIEW STUDENT INFO */



    /* COURSE VIEW */

    $('#course').click(function(){
        var cour = $(this).val();

        $.ajax({
            url:'course_view.php',
            type: 'post',
            data: {cour: cour},
            success: function(response){
                $('#courseline').html(response);
            }
        })
    })

    $('table').DataTable();

    /* END OF COURSE VIEW */









})


function validate(file){
    var ext = file.substr(file.lastIndexOf('.')+ 1);
    var allow =["jpg","jpeg","png","gif","bmp"];

    if(allow.lastIndexOf(ext)==-1){
        $('#message').html('<div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">Upload Image Only</div>');
        $("#crop_img").val("");
    }
    else{

    }
}


function validate2(file){
    var ext1 = file.substr(file.lastIndexOf('.')+ 1);
    var allow1 =["svg"];


    if(allow1.lastIndexOf(ext1)==-1){
        $('#message2').html('<div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">Upload SVG format Only</div>');
        $("#course_logo").val("");
    }
    else{

    }
}







$(document).ready(function(){
  
    var $modal = $('#box_modal');
    var crop_image = document.getElementById('sample_image');

    $('#crop_img').change(function(event){


        var files = event.target.files;
        var done = function(url){
        crop_image.src = url;
        $('#box_modal').modal('show');
       };


       if(files && files.length >0){

        reader = new FileReader();
        reader.onload = function(event){
            done(reader.result);
        };
        reader.readAsDataURL(files[0]);

       }
    })

    $modal.on('shown.bs.modal', function(){
        cropper = new Cropper(crop_image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    })





    $('#cropbtn').click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });

        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);

            reader.onloadend = function(){
                var base64data = reader.result;



                $.ajax({
                    url: 'crop.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {image:base64data},
                    success:function(data){
                        $modal.modal('hide');
                        $('#filename').val(data);
                    }
                });

            };
        });

    });

})


/* $.ajax({
    url: filedir,
    method: 'POST',
    data: {crop_image:base64data},
    success:function(data){
        $modal.modal('hide');
    }
}); */


function findAge(){
    var day = document.getElementById("dobCal").value;
    var DOB = new Date(day);
    var today = new Date();
    var age = today.getTime()- DOB.getTime();
    age = Math.floor(age / (1000 * 60 * 60 * 24 * 365));
    document.getElementById("age").value = age;

}


















/* $(document).ready(function(){

    $('#sendbtn').click(function(event){
        event.preventDefault();
        var formData = $('#add_student').serialize();
        console.log(formData);

       
        $.ajax({
            url:'functions/f_add_students.php',
            method: 'POST',
            data: formData + 'sendbtn',
            success: function(res){
                $('#alert1').html(res);
            }
        })
       

    })


}) */
















/* $(document).ready(function(){
    $('#add_student input').jqBootstrapValidation({
        preventSubmit: true,
        submitSuccess: function($form, event){
            event.preventDefault();
            $this = $('#sendbtn');
            $this.prop('disabled', true);
            var form_data = $("#add_student").serialize();

            $.ajax({
                url:"functions/f_add_students.php",
                method: "POST",
                data:form_data,
                success:function(){

                alert('hello');
                    
                }
            })



        },
    })
})
 */






/* $(document).ready(function(){
    $('#add_student').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:'functions/f_add_students.php',
            data: $(this).serialize(),
            method: 'POST',
            success: function (resp){
                $('#err').html(resp);
            }
        })

    })
})
 */