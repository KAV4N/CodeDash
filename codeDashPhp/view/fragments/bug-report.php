
<div class="modal fade" id="bugReportModal" tabindex="4" aria-labelledby="bugReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-body-tertiary">
                <h5 class="modal-title" id="bugReportModalLabel">Bug Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../public/index.php?section=reported-bug">
                    <div class="mb-3">
                        <label for="bugTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="bugTitle" name="bugTitle" placeholder="Enter bug title" required>
                    </div>
                    <div class="mb-3">
                        <label for="bugDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="bugDescription" name="bugDescription" rows="3" placeholder="Enter bug description" required></textarea>
                    </div>
                    <div class="mb-3">
                    </div>
                    <button id="btn-bug-report" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thank you!</strong> for reporting a bug.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

