<h1>Behind the Buzzword Actors List</h1>
<table>
    <th>
        <tr>Name</tr>
        <tr>Salary</tr>
    </th>
    <?php foreach($actors as $actor): ?>
    <tr>
        <td><?= $actor['name'] ?></td>
        <td><?= $actor['salary'] ?></td>
        <td><a href="https://twitter.com/<?= ltrim($actor['twitter_handle'], '@') ?>" target="_blank"><?= $actor['twitter_handle'] ?></a></td>
    </tr>
    <?php endforeach; ?>
</table>