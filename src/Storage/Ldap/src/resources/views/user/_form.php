<form action="<?= $action ?>" name="user_form" method="post">
    <input type="hidden" name="uid" value="<?=$user['cn'][0]?>"/>
    <input type="hidden" name="onlychange" value=""/>

    <div>Schemas: <select name="schema" onchange="this.form.onlychange.value='yes';this.form.submit()">
        <?php foreach($schemas as $name => $data): ?>
            <option value="<?=$name?>" <?= $name===$post['schema']?'selected':''?>><?=$name?></option>
        <?php endforeach; ?>
    </select></div>

    <?php if ($schemas[$post['schema']]['must']): ?>
        <?php foreach($schemas[$post['schema']]['must'] as $value): ?>
            <div>
                <label style="color:red;display:inline-block;width:150px" for="<?= $value ?>"><?= $value ?></label>
                <input type="text" name="<?= $value ?>" value=""/>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($schemas[$post['schema']]['may']): ?>
        <?php foreach($schemas[$post['schema']]['may'] as $value): ?>
            <div>
                <label style="display:inline-block;width:150px" for="<?= $value ?>"><?= $value ?></label>
                <input type="text" name="<?= $value ?>" value=""/>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <button type="submit"><?= 'create'==$_ctrl_action ? 'Create' : 'Update' ?> user</button>
</form>

