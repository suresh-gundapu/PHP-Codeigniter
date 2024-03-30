<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo base_url(); ?>/website" class="text-right"> <button class="btn btn-primary">Add Data</button></a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data as $k => $v) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $v['name']; ?></td>
                                    <td><?php echo $v['email']; ?></td>
                                    <td> <a href="<?php echo base_url(); ?>/website/edit_form/<?php echo $v['id']; ?>"><button class="btn btn-primary">Edit</button></a>
                                        <button class="btn btn-danger dlt" data-id="<?php echo $v['id']; ?>" onclick="confirm('Are u sure delete?')">Delete</button>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

<script type="text/javascript">
    $('.dlt').on('click', function(event) {

        $.ajax({
            url: "<?php echo base_url(); ?>website/deleteForm",
            type: "POST",
            data: {
                'id': $(this).data("id")
            },

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
        })
    })
</script>