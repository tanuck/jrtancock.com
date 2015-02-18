<table class="table">
<thead>
    <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('slug') ?></th>
        <th><?= $this->Paginator->sort('title') ?></th>
        <th><?= $this->Paginator->sort('author') ?></th>
        <th><?= $this->Paginator->sort('created') ?></th>
        <th><?= $this->Paginator->sort('modified') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<tbody>
<?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $this->Number->format($post->id) ?></td>
        <td><?= h($post->slug) ?></td>
        <td><?= h($post->title) ?></td>
        <td><?= $this->Number->format($post->author) ?></td>
        <td><?= h($post->created) ?></td>
        <td><?= h($post->modified) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
        </td>
    </tr>

<?php endforeach; ?>
</tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
