<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Data</h3>
                </div>
                <div class="card-body">
                    <form id="save-form">
                        <input type="hidden" name="data[id]" value="<?php echo $data['id']; ?>" />
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="data[name]" value="<?php echo $data['name']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="data[email]" id="staticEmail" value="<?php echo $data['email']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <button class="btn btn-primary" type="button" id="saveSub">Register</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

<script>
    $(function() {
        $('#save-form').validate({
            rules: {
                "data[name]": "required",
                "data[email]": "required",
                "data[pword]": "required",

            }
        });

        $("#saveSub").click(function() {
            var validater = $('#save-form').validate();
            validater.form();
            if (validater.form() == true) {

                var data = new FormData($('#save-form')[0]);
                $.ajax({
                    url: "<?php echo base_url(); ?>website/editSaveForm",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    error: function(request, response) {
                        console.log(request);
                    },
                    success: function(result) {
                        console.log(result);
                        var obj = jQuery.parseJSON(result);
                        if (obj.status == 1) {
                            // $.notify(obj.message, "success");
                            alertify.success(obj.message);

                            //message_alerts(obj.message,"success");
                            setTimeout(function() {
                                window.location.href = "<?php echo base_url(); ?>website/readData";

                            }, 3000)

                        } else {
                            //$.notify(obj.message, "error");
                            alertify.warning(obj.message);

                        }
                    }
                });
            }
        });

    });
</script>