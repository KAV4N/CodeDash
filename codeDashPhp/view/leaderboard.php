<main class="mb-auto container-xxl bd-gutter py-5">
    <section class="rounded-3 mb-1 custom-bg-dark p-5">
        <div class="mb-5">
            <h1 class="text-primary fw-bold">Leaderboard</h1>
            <p class="text-small text-white-50">Find your competition</p>
        </div>
        <div class="border border-info shadow-lg scrollable-table rounded-3 mb-3 custom-bg-dark text-center overflow-auto">
            <table class="table table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="bg-body-tertiary">#</th>
                        <th scope="col" class="bg-body-tertiary">Player</th>
                        <th scope="col" class="bg-body-tertiary">Rank</th>
                    </tr>
                </thead>
                <tbody id="leaderboardBody">
                    <?php if (!empty($this->attributes["leaderboardData"])): ?>
                        <?php foreach ($this->attributes["leaderboardData"] as $index => $player): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($player->playerName) ?></td>
                                <td><?= htmlspecialchars($player->rank) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No data available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

<!--         <nav aria-label="Page navigation">
            <ul class="gap-1 text-white pagination justify-content-center" id="pagination">
                <li class="page-item">
                    <a class="page-link text-primary border border-info table-btns-link" href="#" aria-label="First">
                        <span aria-label="First" aria-hidden="true">««</span>
                    </a>
                </li>
                <li class="page-item text-white">
                    <a class="page-link text-primary border border-info table-btns-link" href="#" aria-label="Previous">
                        <span aria-label="Previous" aria-hidden="true">«</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link text-primary border border-info table-btns-link" href="#" aria-label="Next">
                        <span aria-label="Next" aria-hidden="true">»</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link text-primary border border-info table-btns-link" href="#" aria-label="Last">
                        <span aria-label="Last" aria-hidden="true">»»</span>
                    </a>
                </li>
            </ul>
        </nav> -->

    </section>
</main>
