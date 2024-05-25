<head>
    <link href="../view/static/css/countdown.css" rel="stylesheet">
</head>
<main class="mb-auto container-xxl bd-gutter my-5" layout:fragment="content" id="main-container">
    <section class="d-flex flex-column rounded-3 gap-1">
        <div class="p-3 shadow-lg rounded-3 bg-body-tertiary text-light align-items-center justify-content-center">

            <div class="d-flex justify-content-center align-items-center flex-column flex-md-row">
                <p class="m-0 race-finished text-success d-none" id="race-finished"><strong>Finished!</strong></p>
                <div class="d-flex ms-md-auto gap-2 flex-column flex-md-row w-50 justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center text-center custom-bg-darkblue rounded-3 p-2 w-100">
                        <span><?php echo $this->attributes["programmingLanguage"]; ?></span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center text-center custom-bg-darkblue rounded-3 p-2 w-100">
                        <span class="text-danger"><?php echo $this->attributes["difficulty"]; ?></span>
                    </div>
                </div>

            </div>

            <div class="mt-3" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <div class="progress border border-primary" role="progressbar" aria-label="Animated striped example" aria-valuemin="0" aria-valuemax="100" style="width: 100%;  background-color:rgba(34, 37, 41,1);">
                    <div id="race-progress" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 0%;">0%</div>
                </div>

            </div>
        </div>

        <div class="d-flex flex-column flex-xl-row rounded-3 gap-1">
            <div class="col-xl-2 ide-sidebar d-flex flex-column align-items-start custom-bg-dark rounded-3">
                <div class="d-flex justify-content-center flex-column w-100 p-2">
                    <h2 id="countdown-value" class="text-primary display-4 mb-0 text-center"><?php echo $this->attributes['time']?></h2>
                    <hr>
                    <p class="mb-0 text-center"> <span id="wpm-value" class="display-4 text-primary">0</span></p>
                    <p class="text-center m-0"><strong class="text-light">WPM</strong></p>
                    <hr class="solid" id="race-finished-hr">
                    <a class="btn btn-outline-info" href="../public/index.php?section=race">Try Again!</a>
                </div>
            </div>
            <div class="col-xl-10 ide-editor d-flex flex-column gap-1">
                <div class="shadow-lg bg-body-tertiary rounded-3 p-3">
                    <div id="code-container" class="code-container mb-4 p-3 custom-bg-dark rounded-3 shadow-lg" style="max-height:250px;overflow-y:auto;">
                        <div class="line-numbers-container" id="line-numbers-container">
                            <?php foreach ($this->attributes['lineNumbers'] as $line): ?>
                                <div class="text-primary line-number border-end border-primary"><?php echo $line; ?></div>
                            <?php endforeach; ?>
                        </div>

                        <div id="code-snippet" class="code-snippet-container" style="margin-bottom: 0;">
                            <?php foreach ($this->attributes['codeData'] as $entry): ?>
                                <?php if ($entry->character == 'space'): ?>
                                    <span class="char-code" id="<?php echo $entry->id; ?>">&nbsp;</span>
                                <?php elseif ($entry->character == '⏎'): ?>
                                    <span class="char-code" id="<?php echo $entry->id; ?>"><?php echo $entry->character; ?></span>
                                    <br>
                                <?php else: ?>
                                    <span class="char-code" id="<?php echo $entry->id; ?>"><?php echo $entry->character; ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <input type="text" id="user-input" class="shadow-lg form-control custom-bg-dark text-light rounded-3" style="margin-bottom:1rem; background-color:rgba(34, 37, 41,1); border-width:0px;" placeholder="Type here..." autofocus>
                </div>
                <div class="d-flex flex-column flex-md-row flex-xl-row gap-1">
                    <div class="col shadow-lg bg-body-tertiary rounded-3  p-3" style="flex-grow: 2;">
                        <div style="height: 300px;" class="d-flex flex-column  justify-content-between">
                            <div class="custom-bg-darkblue rounded-3 w-100 text-center">
                                <p id="total-words-typed" class="mx-3 my-1"><strong class="text-light">Typed:</strong> </p>
                                <hr class="m-0 border-black">
                                <span id="total-words-typed-value" class="display-6 text-primary">0</span>
                            </div>
                            <div class="custom-bg-darkblue rounded-3 w-100 text-center">
                                <p id="errors-result" class="mx-3 my-1"><strong class="text-light">Errors:</strong> </p>
                                <hr class="m-0 border-black">
                                <span id="errors-value" class="display-6 text-danger">0</span>
                            </div>
                            <div class="custom-bg-darkblue rounded-3 w-100 text-center">
                                <p id="accuracy-result" class="mx-3 my-1"><strong class="text-light">Accuracy:</strong> </p>
                                <hr class="m-0 border-black">
                                <span id="accuracy-value" class="display-6 text-success">0%</span>
                            </div>
                        </div>
                    </div>

                    <div class="col shadow-lg bg-body-tertiary rounded-3 p-3 justify-content-center align-items-center" style="flex-grow: 10;">
                        <h4 class="mb-3 text-start">Last 50 <span class="text-primary">Games</span></h4>
                        <div class="scrollable-table rounded-3 overflow-auto custom-bg-darkblue" style="height: 250px;">
                            <table id="playerTable" class="m-0 table table-hover table-striped display font-weight-bold w-100 text-center">
                                <thead class="table-dark" >
                                    <tr>
                                        <th scope="col">Player</th>
                                        <th scope="col">WPM</th>
                                        <th scope="col">Time Left</th>
                                        <th scope="col">Accuracy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->attributes['raceStats'] as $index => $stats): ?>
                                        <tr class="table-border-top">
                                            <td><?php echo $stats->player; ?></td>
                                            <td><?php echo $stats->wpm; ?></td>
                                            <td><?php echo $stats->timeLeft; ?></td>
                                            <td><?php echo $stats->accuracy; ?></td>
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


    <section class="rounded-3 mt-1 bg-body-tertiary py-2">
		<div class="accordion accordion-flush" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
					<button class="accordion-button collapsed bg-body-tertiary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Code Explanation
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<?php echo $this->attributes['description'] ?>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
					<button class="accordion-button collapsed bg-body-tertiary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						Race Data
					</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<p>Creator: <?php echo $this->attributes['creatorName'] ?></p>
						<p>Created At: <?php echo $this->attributes['createdAt'] ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	

    <div id="countdown-container">
        <div class="countdown-item" id="countdown">

        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php
echo "
    <script>
        var maxId = " . json_encode($this->attributes['maxId']) . ";
        var countdownDuration = " . json_encode($this->attributes['time']) . ";
        var codeId = ". json_encode($this->attributes['codeId']) .";
        var difficulty = ". json_encode($this->attributes['difficulty']) .";
    </script>";
?>
<script src="../view/static/js/race.js"></script>
