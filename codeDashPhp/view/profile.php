<main class="mb-auto container-xxl bd-gutter my-5" id="main-container">
    <section class="d-flex flex-column rounded-3 gap-1">
        <a href="../src/logout.php" class="btn btn-outline-info">Log Out</a>
        <div class="p-3 shadow-lg rounded-3 bg-body-tertiary text-light align-items-center justify-content-center">
            <div class="d-flex justify-content-center align-items-center flex-column flex-md-row">
                <p class="m-0 race-finished text-success d-none" id="race-finished"><strong>Finished!</strong></p>
                <div class="d-flex ms-md-auto gap-2 flex-column flex-md-row w-50 justify-content-center align-items-center">

                </div>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 d-flex align-items-center justify-content-between text-center">
                        <h5 class="my-2"><strong id="username"><?php echo $this->attributes["username"]; ?></strong></h5>
                    </div>

                    <div class="col-md-1 align-self-center">

                    </div>
                    <div class="col-md-9 m-0 p-0">
                        <hr class="mb-3">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="progress" style="height: 25px;">
                                    <div id="exp-progress" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-label="Animated striped example" aria-valuemin="0" aria-valuemax="100" style='width: <?php echo $this->attributes["expPercentage"]; ?>%;'> <?php echo $this->attributes["expPercentage"]; ?>%</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center custom-bg-darkblue rounded p-2">
                                <div class="text-light"><strong>Level <span id="level-counter"><?php echo $this->attributes["level"]; ?></span></strong></div>
                                <span class="text-success"><strong id="rank"><?php echo $this->attributes["rank"]; ?></strong></span>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-xl-row rounded-3 gap-1">
            <div class="col-xl-2 ide-sidebar d-flex flex-column align-items-start p-0 gap-1">
                <div class="d-flex justify-content-center flex-column w-100">
                    <a href="../public/index.php?section=update-profile" class="btn btn-outline-info">Update Profile</a>
                </div>
                <div class="d-flex flex-grow-1 flex-column w-100 p-3 custom-bg-dark rounded-3" style="overflow: auto;">
                    <h5 class="mb-0">About Me</h5>
                    <hr>
                    <p id="about-me" style="word-wrap: break-word;"><?php echo $this->attributes["aboutme"]; ?></p>
                </div>
            </div>



            <div class="col-xl-10 ide-editor d-flex flex-column gap-1">
                <div class="d-flex justify-content-center flex-column w-100">
                    <a href="../public/index.php?section=create-race" class="btn btn-outline-info">Create Race</a>
                </div>
                <div class="shadow-lg bg-body-tertiary rounded-3 p-3" style="flex-grow: 2;" id="userStats">
                    <div class="row row-cols-1 row-cols-md-3">
                        <div class="col">
                            <div class="custom-bg-darkblue rounded-3 w-100 text-center">
                                <p id="total-words-typed" class="mx-3 my-1"><strong class="text-light">Typed:</strong> </p>
                                <hr class="m-0 border-black">
                                <span id="total-words-typed-value" class="display-6 text-primary"><?php echo $this->attributes["typed"]; ?></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-bg-darkblue rounded-3 w-100 text-center">
                                <p id="errors-result" class="mx-3 my-1"><strong class="text-light">Errors:</strong> </p>
                                <hr class="m-0 border-black">
                                <span id="errors-value" class="display-6 text-danger"><?php echo $this->attributes["errors"]; ?></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-bg-darkblue rounded-3 w-100 text-center">
                                <p id="accuracy-result" class="mx-3 my-1"><strong class="text-light">Accuracy:</strong> </p>
                                <hr class="m-0 border-black">
                                <span id="accuracy-value" class="display-6 text-success"><?php echo $this->attributes["accuracy"]; ?>%</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-flex flex-column flex-md-row flex-xl-row gap-1">


                    <div class="col shadow-lg bg-body-tertiary rounded-3 p-3 justify-content-center align-items-center" style="flex-grow: 10;">
                        <h5 class="mb-0">Last 10 <span class="text-primary">games</span></h5>
                        <hr>
                        <div class="scrollable-table rounded-3 overflow-auto custom-bg-darkblue" style="height: 250px;">
                            <table id="playerTable" class="m-0 table table-hover table-striped display font-weight-bold w-100 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Language</th>
                                        <th scope="col">Difficulty</th>
                                        <th scope="col">WPM</th>
                                        <th scope="col">Time Left</th>
                                        <th scope="col">Accuracy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->attributes["raceStats"] as $stat): ?>
                                        <tr class="table-border-top">
                                            <td><?php echo $stat->language; ?></td>
                                            <td><?php echo $stat->difficulty; ?></td>
                                            <td><?php echo $stat->wpm; ?></td>
                                            <td><?php echo $stat->timeLeft; ?></td>
                                            <td><?php echo $stat->accuracy; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>
