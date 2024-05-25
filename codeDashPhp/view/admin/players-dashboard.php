<main class="mb-auto container-xxl bd-gutter py-5">
    <section class="rounded-3 mb-1 custom-bg-dark p-5">
        <div class="mb-5">
            <h1 class="text-primary fw-bold">Player Information</h1>
            <p class="text-small text-white-50">View and manage player details</p>
        </div>
        <div class="border border-info shadow-lg scrollable-table rounded-3 mb-3 custom-bg-dark text-center overflow-auto">
            <table class="table table-hover table-striped m-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="bg-body-tertiary">ID</th>
                        <th scope="col" class="bg-body-tertiary">Email</th>
                        <th scope="col" class="bg-body-tertiary">Username</th>
                        <th scope="col" class="bg-body-tertiary">isBanned</th>
                        <th scope="col" class="bg-body-tertiary">isAdmin</th>
                        <th scope="col" class="bg-body-tertiary">Actions</th>
                    </tr>
                </thead>
                <tbody id="playerInfoBody">
                    <?php if (!empty($this->attributes["playerInfoData"])): ?>
                        <?php foreach ($this->attributes["playerInfoData"] as $index => $player): ?>
                            <?php if ($player->id != $_SESSION["user_id"]): ?>
                                <tr>
                                    <td><?= htmlspecialchars($player->id) ?></td>
                                    <td><?= htmlspecialchars($player->email) ?></td>
                                    <td><?= htmlspecialchars($player->username) ?></td>
                                    <td><?= $player->isBanned ? 'Yes' : 'No' ?></td>
                                    <td><?= $player->isAdmin ? 'Yes' : 'No' ?></td>
                                    <td>
                                        <form method="post" action="" class="d-inline">
                                            <input type="hidden" name="player_id" value="<?= htmlspecialchars($player->id) ?>">
                                            <input type="hidden" name="action" value="ban">
                                            <button type="submit" class="btn btn-danger ban-btn">Ban</button>
                                        </form>
                                        <form method="post" action="" class="d-inline">
                                            <input type="hidden" name="player_id" value="<?= htmlspecialchars($player->id) ?>">
                                            <input type="hidden" name="action" value="unban">
                                            <button type="submit" class="btn btn-success unban-btn">Unban</button>
                                        </form>
                                        <form method="post" action="" class="d-inline">
                                            <input type="hidden" name="player_id" value="<?= htmlspecialchars($player->id) ?>">
                                            <input type="hidden" name="action" value="delete">
                                            <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No data available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
