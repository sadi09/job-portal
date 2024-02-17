<div class="modal fade" id="delete-modal" style="display: none;" aria-hidden="true">
    <form action="" id="deleteForm" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="delete-form">
                        <div class="input-group mb-3">
                            <h3>Are You Sure?</h3>
                            <input class="d-none" name="deleteID" id="deleteID">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" onclick="ClearDeleteID()" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>

