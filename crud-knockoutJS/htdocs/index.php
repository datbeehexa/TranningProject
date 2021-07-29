<!doctype html>

<head>

    <title>Category</title>
    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="knockout-3.4.0.js" type="text/javascript"></script>
</head>

<body>
    <h1>Category</h1>
    <table id="cate_table" class="table table-striped">
        <thead bgcolor="#6cd8dc">
            <tr class="table-primary">
                <th width="40%">Category</th>
                <th width="40%">Description</th>
                <th scope="col" width="5%">Edit</th>
                <th scope="col" width="5%">Delete</th>
            </tr>
        <tbody data-bind="foreach:catesList">
            <tr>
                <td data-bind="text: category_name"></td>
                <td data-bind="text: description"></td>
                <td><a type="button" data-bind="click:$root.edit" class="btn btn-primary btn-sm update"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</a>
                </td>
                <td> <button type="button" data-bind="click:$root.remove" name="delete" id="cate_id" class="btn btn-danger btn-sm delete">Delete</button></td>
            </tr>
        </tbody>

        </thead>
    </table>
    </br>
    <div align="right">
        <a href="add" data-bind="click:addFields" type="button" id="add_button" class="btn btn-success btn-lg">Add</a>
        <!-- <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-lg">Add</button> -->
    </div>
    <!-- <form data-bind="visible:showfields">Category:
        <input data-bind="value:formCategory" />Description:
        <input data-bind="value:formDescription" />
        <a href="#" data-bind="click:addCateData,text:actionTitle"></a>
    </form> -->
    </div>

</body>

</html>


<div id="cateModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="cate_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <label>Enter Category</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" data-bind="value:category_name" />
                    <br />
                    <label>Enter Description</label>
                    <input type="text" name="description" id="description" class="form-control" data-bind="value:description" />
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cate_id" id="cate_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-primary" data-bind="click: create" value="Add" />
                    <button id="formbtn" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="cateEditModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="cate_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <label>Enter Category</label>
                    <input type="text" name="category_name" id="category_name" class="form-control" data-bind="value:category_name" />
                    <br />
                    <label>Enter Description</label>
                    <input type="text" name="description" id="description" class="form-control" data-bind="value:description" />
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cate_id" id="cate_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-primary" data-bind="click: update" value="Add" />
                    <button id="formbtn" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
    function CategoryViewModel() {

        //Make the self as 'this' reference
        var self = this;
        //Declare observable which will be bind with UI 
        self.id = ko.observable("");
        self.category_name = ko.observable("");
        self.description = ko.observable("");

        var Category = {
            id: self.id,
            category_name: self.category_name,
            description: self.description,
        };

        self.Category = ko.observable();
        self.catesList = ko.observableArray(); // Contains the list of products

        // Initialize the view-model
        $.ajax({
            url: 'categories',
            cache: false,
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            data: {},
            success: function(data) {
                self.catesList(data); //Put the response in ObservableArray
            }
        });

        self.addFields = function() {
            $("#cateModal").modal('show')

        };
        //Add New Item
        self.create = function() {
            if (Category.category_name() != "" && Category.description() != "") {
                $.ajax({
                    url: 'categories',
                    cache: false,
                    type: 'POST',
                    contentType: 'application/json; charset=utf-8',
                    data: ko.toJSON(Category),
                    success: function(data) {
                        // alert('added');
                        self.catesList.push(data);
                        self.category_name("");
                        self.description("");
                        $("#cateModal").modal('hide')

                    }
                }).fail(
                    function(xhr, textStatus, err) {
                        alert(err);
                    });

            } else {
                alert('Please Enter All the Values !!');
            }

        }
        // Delete product details
        self.remove = function(Category) {
            if (confirm('Are you sure to Delete category ??')) {
                var id = Category.id;
                $.ajax({
                    url: 'categories/' + id,
                    cache: false,
                    type: 'DELETE',
                    contentType: 'application/json; charset=utf-8',
                    data: {},
                    success: function(data) {
                        self.catesList.remove(Category);

                    }
                }).fail(
                    function(xhr, textStatus, err) {
                        alert(err);
                    });
            }
        }

        // Edit product details
        self.edit = function(Category) {
            $("#cateEditModal").modal('show');
            self.category_name(Category.category_name);
            self.description(Category.description);
            self.Category(Category);
            console.log(Category);
        }

        // Update product details
        self.update = function() {
            var Category = self.Category();
            var id = Category.id;
            console.log(id);
            $.ajax({
                    url: 'categories/' + id,
                    cache: false,
                    type: 'PUT',
                    contentType: 'application/json; charset=utf-8',
                    data: ko.toJSON(Category),
                    success: function(data) {
                        self.catesList.removeAll();
                        self.catesList(data); //Put the response in ObservableArray
                        self.Category(null);
                        alert("Record Updated Successfully");

                    }
                })
                .fail(
                    function(xhr, textStatus, err) {
                        alert(err);
                    });
        }

        // Cancel product details
        self.cancel = function() {
            self.Category(null);

        }
    }
    var viewModel = new CategoryViewModel();
    ko.applyBindings(viewModel);
</script>