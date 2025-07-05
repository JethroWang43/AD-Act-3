<?php
function renderMeetingComponent($mongoStatusMessage, $pgsqlStatusMessage, $meetings)
{
?>
    <div class="status-box"><?= htmlspecialchars($mongoStatusMessage) ?></div>
    <div class="status-box"><?= htmlspecialchars($pgsqlStatusMessage) ?></div>

    <form method="POST" action="">
        <input type="text" name="title" placeholder="Meeting Title" required>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <button type="submit">Add Meeting</button>
    </form>

    <div class="meeting-list">
        <h2>Upcoming Meetings</h2>
        <?php if (!empty($meetings)): ?>
            <?php foreach ($meetings as $meeting): ?>
                <div class="meeting">
                    <div class="meeting-title"><?= htmlspecialchars($meeting['title']) ?></div>
                    <div class="meeting-time"><?= htmlspecialchars($meeting['date']) ?> at <?= htmlspecialchars($meeting['time']) ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No meetings scheduled.</p>
        <?php endif; ?>
    </div>
<?php
}
?>
