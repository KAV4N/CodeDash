<main class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <form id="code-form" method="post" action="../public/index.php?section=create-race">
                <input type="hidden" name="action" value="create">
                <div class="mb-3">
                    <label for="code-editor" class="form-label">Write Your Code:</label>
                    <textarea class="form-control" id="code-editor" name="code-editor" rows="10" placeholder="Start typing your code..." required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="language-select" class="form-label">Select Programming Language:</label>
                        <select class="form-select" id="language-select" name="language-select">
                            <?php foreach ($this->attributes['language'] as $lang) { ?>
                                <option value="<?php echo $lang; ?>"><?php echo $lang; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="difficulty-select" class="form-label">Select Difficulty:</label>
                        <select class="form-select" id="difficulty-select" name="difficulty-select">
                            <?php foreach ($this->attributes['difficulty'] as $diff) { ?>
                                <option value="<?php echo $diff; ?>"><?php echo $diff; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="code-description" class="form-label">Code Explanation:</label>
                    <textarea class="form-control" id="code-description" name="code-description" rows="3" placeholder="Write a description of your code..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Race</button>
            </form>
        </div>
    </div>
</main>

