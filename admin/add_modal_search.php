<!-- Add Product -->
<div class="modal fade" id="addschedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Search Item</h4>
                </center>
            </div>
            <div class="modal-body modal-lgg">
              
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
            
            

                <form role="form" method="POST" action="addsearch.php" enctype="multipart/form-data">

                        <br /><br />
                        <label>Search Product:</label>
                        <input type="text" name="search" id="country" class="form-control input-lg" autocomplete="off" placeholder="Type Product Name" />
                        <br/>
                        <label>Quantity:</label>
                        <input class="form-control" type="number" style="width:100px;" value="1" name="quantity" min="0">
                    </div>
                    <br /><br />
                    <div class="container" style="width:600px;">
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id ="send" ><i class="fa fa-add"></i> Add</button>
					</form>
                </div>
                <script>
                    $(document).ready(function() {

                        $('#country').typeahead({
                            source: function(query, result) {
                                $.ajax({
                                    url: "search2.php",
                                    method: "POST",
                                    data: {
                                        query: query
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                        result($.map(data, function(item) {
                                            return item;
                                        }));
                                    }
                                })
                            }
                        });

                    });
                </script>
            </div>
        </div>

    </div>





    <!-- /.modal -->