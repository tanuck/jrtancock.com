<header>
    <h2><?= $this->fetch('title') ?></h2>
</header>

<?= $this->Flash->render() ?>

<div class="row">
    <?= $this->fetch('content') ?>
</div>
