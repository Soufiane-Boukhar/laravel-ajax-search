<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <br />
    <div class="container">
        <h3 align="center">Liste users</h3><br />
        <div class="row">
            <div class="col-md-9">
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="serach" id="serach" class="form-control" />
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="38%">Title</th>
                        <th width="57%">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @include('pagination_child')
                </tbody>
            </table>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function fetch_data(page, search) {
                $.ajax({
                    url: "?page=" + page + "&search=" + search,
                    success: function (data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                });
            }

           $('body').on('click', '.pagination a', function(param){
            param.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var search = $('#serach').val();
            fetch_data(page, search);
           });

            $('body').on('keyup', '#serach', function () {
                var search = $('#serach').val();
                var page = $('#hidden_page').val();
                fetch_data(page, search);
            });

            fetch_data(1, '');
        });
    </script>

</body>

</html>
