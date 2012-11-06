<form method="post" action="">
    Add worker for the house: <?php echo $this->house->name; ?>
    <input type="hidden" name="form[house_id]" value="<?php echo $this->house->id; ?>">
    <br/>
    <select name="form[monkey_id]">
        <?php foreach($this->workers as $worker): ?>
        <option value="<?php echo $worker->id; ?>"><?php echo $worker->name,' (' . $worker->type . ')'; ?></option>
        <?php endforeach; ?>
    </select>
    <br/>
    <input type="submit" value="Add">
</form>