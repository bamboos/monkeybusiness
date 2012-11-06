<table>
    <tr>
        <th>Name</th>
        <th>Type</th>
    </tr>
    <?php foreach($this->list as $item): ?>
        <tr>
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->type; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br/>
<a href="/index/addWorker/<?php echo $this->houseId; ?>">Add worker</a>
