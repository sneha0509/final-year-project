<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../Style/Ebook_Modal.css">
</head>
<body>
  <!-- Ebook Upload Modal -->
  <div class="modal fade" id="EUF">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content form-wrapper">
        <div class="close-box" data-dismiss="modal">
          <i class="fa fa-times fa-2x"></i>
        </div>
        <div class="container-fluid mt-5">
          <form action="ebook_upload.php" method="post" id="EbookUploadForm" enctype="multipart/form-data">
            <div class="form-group text-center pb-2">
              <h4>Ebook Upload Form</h4>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="name">Book Title</label>
                <input type="text" id="name" class="form-control" placeholder="Book Title" name="book_title" required>
              </div>
            </div>

            <div class="form-group" style="position:relative;">
              <label for="text">Book Description</label>
              <input type="text" id="description" class="form-control mb-1" placeholder="Description" name="description">
              <!-- <a href="#" data-toggle="modal" data-target="#login" style="display:none; position: absolute; right: 0; font-size: 12px;">That's you? Login</a> -->
            </div>

            <div class="form-row mb-1">
              <div class="form-group col">
                <label for="text">Author Name</label>
                <input type="text" id="Author" class="form-control" placeholder="Author Name" name="author" required>
              </div>

              <div class="form-group col">
                <label for="text">Publication Year</label>
                <!-- <input type="text" id="datepicker" class="form-control" maxlength="4" minlength="4" pattern="[0-9]{4}" placeholder="Year Of Publication" name="publication" required> -->
                <input type="text" id="datepicker" class="form-control" maxlength="4" minlength="4" pattern="[1-9][0-9]{3}" placeholder="YYYY" name="publication" required title="Year must not start with 0.">
              </div>
            </div>

            <div class="form-group" style="position:relative;">
              <label for='file_upload' style="display:block">Upload Book</label>
              <button type="button" class="btn btn-dark form-control" onclick="document.getElementById('file_upload').click()" id="file_btn">Select Book(in PDF Format)</button>
              <input type="file" name="file" id="file_upload" accept="application/pdf" style="display:none;" required>
            </div>

            <div class="form-group">
              <button class="btn btn-info form-control" type="submit" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- <script>
document.querySelector("#file_upload").addEventListener("change", function(e){
	var file = e.target.files[0];
	if(file.type != "application/pdf"){
		console.error(file.name, "is not a pdf file.");
		return;
  }
 }
 </script> -->
</body>
</html>