<h2>「<?=$biditem->name ?>」の情報</h2>

<script>
function dateCounter() {

    var timer = setInterval(function() {
    //現在の日時取得
    var nowDate = new Date();
    //カウントダウンしたい日を設定
    var endDate = new Date("<?= h($biditem->endtime) ?>");
    //日数を計算
    var daysBetween = Math.floor((endDate - nowDate)/(1000*60*60*24));
    var ms = (endDate - nowDate);
    if (ms >= 0) {
        //時間を取得
        var h = Math.floor(ms / 3600000);
        var _h = h % 24;
        //分を取得
        var m = Math.floor((ms - h * 3600000) / 60000);
        //秒を取得
        var s = Math.round((ms - h * 3600000 - m * 60000) / 1000);

        //HTML上に出力
        document.getElementById("countOutput").innerHTML = "オークション終了まであと" +daysBetween + "日と" +_h + "時間" + m + "分" +s + "秒";

        /*if ((h == 0) && (m == 0) && (s == 0)) {
        clearInterval(timer);
        document.getElementById("countOutput").innerHTML = "オークションは終了しました";
        }*/
    }else{
        document.getElementById("countOutput").innerHTML = "入札は終了しました";
    }
    }, 1000);
}
dateCounter();
</script>
<table class="vertical-table">
  <tr>
    <th class="small" scope="row">出品者</th>
    <td><?= $biditem->has('user') ? $biditem->user->username : '' ?></td>
  </tr>
  <tr>
    <th scope="row">商品名</th>
    <td><?= h($biditem->name) ?></td>
  </tr>
  <tr>
    <th scope="row">商品ID</th>
    <td><?= $this->Number->format($biditem->id) ?></td>
  </tr>
  <tr>
    <th scope="row">商品画像</th>
    <td><?= $this->Html->image($biditem->image, array('height' => 100, 'width' => 100)) ?></td>
  </tr>
  <tr>
    <th scope="row">商品詳細</th>
    <td><?= h($biditem->item_detail) ?></td>
  </tr>
  <tr>
    <th scope="row">終了時間</th>
    <td><?= h($biditem->endtime) ?></td>
  </tr>
  <tr>
    <th scope="row">投稿時間</th>
    <td><?= h($biditem->created) ?></td>
  </tr>
  <tr>
    <th scope="row"><?= __('終了した？') ?></th>
    <td><?= $biditem->finished ? __('YES'):__('NO'); ?></td>
  </tr>
  <tr>
    <th scope="row">終了までの時間</th>
    <td id="countOutput"></td>
  </tr>
</table>
<div class="related">
  <h4><?= __('落札情報') ?></h4>
  <?php if (!empty($biditem->bidinfo)): ?>
  <table cellpadding="0" cellspacing="0">
    <tr>
      <th scope="col">落札者</th>
      <th scope="col">落札金額</th>
      <th scope="col">落札日時</th>
    </tr>
    <tr>
      <td><?= h($biditem->bidinfo->user->username) ?></td>
      <td><?= h($biditem->bidinfo->price) ?>円</td>
      <td><?= h($biditem->endtime) ?></td>
    </tr>
  </table>
  <?php else: ?>
  <p><?='落札情報はありません' ?></p>
  <?php endif; ?>
</div>
<div class="related">
  <h4><?=__('入札情報') ?></h4>
  <?php if (!$biditem->finished): ?>
  <h6><a href="<?=$this->Url->build(['action'=>'bid',$biditem->id]) ?>">入札する</a></h6>
  <?php if (!empty($bidrequests)): ?>
  <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
      <th scope="col">入札者</th>
      <th scope="col">金額</th>
      <th scope="col">入札日時</th>
    </tr>
    </thead>
    <tbody>
      <?php foreach ($bidrequests as $bidrequest): ?>
      <tr>
        <td><?= h($bidrequest->user->username) ?></td>
        <td><?= h($bidrequest->price) ?>円</td>
        <td><?=$biditem->created ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
  <?php else: ?>
  <p><?='入札はまだありません。'?></p>
  <?php endif; ?>
  <?php else: ?>
  <p><?='入札は、終了しました。'?></p>
  <?php endif; ?>
</div>
