<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Workers</th>
    </tr>
    <?php foreach($this->list as $item): ?>
        <tr>
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->price; ?></td>
            <td><?php echo $item->status; ?></td>
            <td><a href="/index/workers/<?php echo $item->id; ?>">workers</a></td>
        </tr>
    <?php endforeach; ?>
</table>