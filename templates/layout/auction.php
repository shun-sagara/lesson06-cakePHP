<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?= $this->name  . '/' . $this->request->getParam('action'); ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('auction.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <nav class="top-bar titlebar" data-topbar role="navigation">
    <h1><?=$this->Html->link(__('Auction!['. $authuser['username'] .']'),['action'=>'index']) ?></h1>
  </nav>
  <?= $this->Flash->render() ?>
  <div class="container clearfix">
    <div class="actions index medium-9 columns content">
      <?= $this->fetch('content') ?>
    </div>
    <nav class="large-2 medium-3 columns sidebar" id="actions-sidebar">
      <ul class="side-nav">
        <li class="heading"><?=__('Actions') ?></li>
        <li><?= $this->Html->link(__('あなたの落札情報'),['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('あなたの出品情報'),['action' => 'home2']) ?></li>
        <li><?= $this->Html->link(__('商品を出品する'),['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('商品リストをみる'),['action' => 'index']) ?></li>
      </ul>
    </nav>
  </div>
  <footer>
  </footer>
</body>
</html>
