  <link href="dist/css/bootstrap-imageupload.css" rel="stylesheet">
 
   <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
  

<script>
tinymce.init({
  selector: '#editor',
  plugins: 'image code',
  theme: 'modern',
  height: '450',

   plugins: ['advlist autolink lists link image charmap print preview anchor',
             'searchreplace visualblocks code fullscreen',
              'insertdatetime media table contextmenu paste'],

  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

  toolbar2: 'print preview media | forecolor backcolor emoticons | code',

  image_title: true, 
  // enable automatic uploads of images represented by blob or data URIs
  automatic_uploads: true,
  // add custom filepicker only to Image dialog
  file_picker_types: 'image',
  file_picker_callback: function(cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function() {
      var file = this.files[0];
      var reader = new FileReader();
      
      reader.onload = function () {
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        // call the callback and populate the Title field with the file name
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };
    
    input.click();
  }
});
</script>
        <!-- /top navigation -->

       
              <div class="right_col" role="main">
                <div class="">

                  <div class="page-title">
                    <div class="title_left">
                      <h3>Add Post</h3>
                    </div>

                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="clearfix"></div>
      


        <div class="container">

    <?php

    //if form has been submitted process it
    if(isset($_POST['submit'])){

        $postTitle=$_POST['postTitle'];
        $postCategory=$_POST['postCategory'];
        $postCont =$_POST['postCont'];
        $date = date('Y-m-d H:i:s');

        $blog_image=$_FILES['image-file']['name'];
        $blog_image_tmp=$_FILES['image-file']['tmp_name'];

        move_uploaded_file($blog_image_tmp,"blog_images/$blog_image");
  


        //very basic validation
        if($postTitle ==''){
            $error[] = 'Please enter the title.';
        }

        if($postCont ==''){
            $error[] = 'Please enter the content.';
        }

        if(!isset($error)){



        $query  = "INSERT INTO blog_posts (postTitle,postCategory,postImage,postCont,postDate,postBy) VALUES ('$postTitle','$postCategory', '$blog_image', '$postCont', '$date', '$name')";
        $sql= mysqli_query($con,$query); 
                

                 echo "<script>alert('A Post has been successful added!')</script>";
            } 

        }

   

    //check for any errors
    if(isset($error)){
        foreach($error as $error){
            echo '<p class="error">'.$error.'</p>';
        }
    }
    ?>

            <!-- bootstrap-imageupload. -->

                    <h3 style="text-align:center;">POST TOPIC</h3>
  <div class="imageupload">         
                  
      <form action='' method='post' id='uploadForm' enctype='multipart/form-data'>

    <div class="form-group">
            <label for="title">Title:</label>
             <input type='text' class='form-control' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'>
    </div> 


    <div class="form-group">
            <label for="title">Title:</label>
            
              <select class='form-control' name='postCategory' value='<?php if(isset($error)){ echo $_POST['postCategory'];}?>'>

                                    <option>select Category</option>
                                      <?php 

                                    $get_category="SELECT * from post_categories";
                                    $run_category=mysqli_query($con, $get_category);
                                    while ($row_category= mysqli_fetch_array($run_category)) {

                                    $id=$row_category['id'];
                                    $category=$row_category['category'];

                                    
                                    echo "<option value='$category'>$category</option>";
                                    
                                  }

                                       ?>


                                  </select>
    </div> 



    <div class="form-group">
          <label for="content">Upload Image</label>
          <div class="file-tab">
          <label class="btn btn-default btn-file">
              <span>Browse</span></br>           
              <input type="file" name="image-file">
           </label>
          <button type="button" class="btn btn-default">Remove</button>  
          </div>
      </div>        
                    
                
        
    <div class="form-group">
        
     <label for="content">Content:</label>
     <textarea id='editor' name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea>

    </div> 

     <table>
        <tr><td></td>
        <td>
        <button type="submit" name="submit" class="btn btn-primary btn-block" style="padding:10px">SUBMIT</button></p>
        </td>
        </tr>
    </table>

   </form>
   </div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="dist/js/bootstrap-imageupload.js"></script>

        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();
        </script>


     