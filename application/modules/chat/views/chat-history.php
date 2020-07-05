<?php foreach($chat_root as $cr) : ?>
  <div class="media align-items-center chat_root_hist" onclick="getchatbyhistory('<?=$cr->chat_root_id?>')">
    <img class="rounded-circle shadow-sm mx-2" width="50" height="50" src="<?=base_url('assets/img/profile/').$cr->image ?>">
    <div class="media-body border-bottom pl-2 py-2">
      <h6 class="mt-0"><?=$cr->fullname; ?></h6>
      <small class="text-secondary"><?=$cr->position_name ?></small>
      <?php
        $count_chat = $this->db->get_where('chat',['chat_root_id' => $cr->chat_root_id])->num_rows();
        echo '<small class="d-block text-secondary float-right pr-2"><b>'.$count_chat.'</b> Tanggapan</small>'
      ?>
    </div>
  </div>
<?php endforeach; ?>

<script type="text/javascript">
  function getchatbyhistory(chat_root_id) {
    window.location.href = '<?=base_url()?>chat/get_chat_by_history/'+chat_root_id;
  }
</script>

<pre>
  <?php //print_r($chat_root) ?>
</pre>